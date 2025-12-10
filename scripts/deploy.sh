#!/usr/bin/env bash
# Deployment script for Grander Core + content sync helpers
# Usage: WP_ENV=staging ./scripts/deploy.sh [--dry-run]

set -euo pipefail

DRY_RUN=false
if [[ "${1:-}" == "--dry-run" ]]; then
  DRY_RUN=true
fi

: "${WP_ENV:=staging}"
: "${WP_BASE_URL:?WP_BASE_URL is required (e.g., https://staging.example.com)}"
: "${WP_SSH_USER:?WP_SSH_USER is required (SSH user for the target host)}"
: "${WP_SSH_HOST:?WP_SSH_HOST is required (SSH host)}"
: "${WP_SSH_PORT:=22}"
: "${WP_PATH:=/var/www/html}"

SSH_TARGET="${WP_SSH_USER}@${WP_SSH_HOST}"
RSYNC_FLAGS="-az --delete --exclude .git --exclude node_modules"

log() {
  printf "[deploy][%s] %s\n" "${WP_ENV}" "$1"
}

run_ssh() {
  if $DRY_RUN; then
    log "DRY RUN: ssh -p ${WP_SSH_PORT} ${SSH_TARGET} '$*'"
  else
    ssh -p "${WP_SSH_PORT}" "${SSH_TARGET}" "$@"
  fi
}

log "Starting deployment to ${WP_ENV} (${WP_BASE_URL})"

# 1) Sync plugin code
log "Syncing grander-core plugin"
if $DRY_RUN; then
  log "DRY RUN: rsync ${RSYNC_FLAGS} ./ ${SSH_TARGET}:${WP_PATH}/wp-content/plugins/grander-core/"
else
  rsync ${RSYNC_FLAGS} ./ "${SSH_TARGET}:${WP_PATH}/wp-content/plugins/grander-core/"
fi

# 2) Activate plugin and run migrations if needed
run_ssh "cd ${WP_PATH} && wp plugin activate grander-core"

# 3) Elementor templates import (expects JSON exports under elementor-templates/)
run_ssh "cd ${WP_PATH} && if [ -d elementor-templates ]; then wp elementor templates import $(find elementor-templates -maxdepth 1 -type f -name '*.json' 2>/dev/null | tr '\n' ' '); else echo 'elementor-templates directory not found; skipping import'; fi" || true

# 4) Flush caches and rewrite rules
run_ssh "cd ${WP_PATH} && wp rewrite flush --hard"
run_ssh "cd ${WP_PATH} && wp cache flush"

log "Deployment steps complete. Run scripts/seed-grander-content.js to sync content."
