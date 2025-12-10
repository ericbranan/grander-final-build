# Deployment and content sync pipeline

## Architecture overview
- Code deploy: `scripts/deploy.sh` syncs the repository to the remote WordPress host over SSH and activates the Grander Core plugin. It imports Elementor template exports located in `elementor-templates/` using WP CLI, flushes rewrites, and clears cache.
- Content and ACF sync: `scripts/seed-grander-content.js` consumes `grander_rest_payload_outline_v1.json` (or a provided payload) and upserts taxonomies, pages, CPT content, FAQ options, blog drafts, and global options through the REST API.
- Validation: `scripts/validate-grander-content.js` compares live REST responses to the payload to ensure the site matches the canonical data.

## Prerequisites
- Node 18+ available locally (for fetch support).
- WP CLI available on the target server and accessible over SSH.
- WordPress application password or bearer token with permissions to manage content and options.
- Place Elementor template exports (JSON) in `elementor-templates/` before running deploy; the script imports every JSON file at max depth one.

## Environment configuration
1. Copy `deployment.env.example` to `deployment.env` and update values for staging or production.
2. Load the values in your shell:
   ```bash
   source deployment.env
   ```

Key variables:
- `WP_BASE_URL` – WordPress base URL.
- `WP_APP_USER` / `WP_APP_PASSWORD` or `WP_AUTH_TOKEN` – authentication for REST calls.
- `WP_SSH_USER`, `WP_SSH_HOST`, `WP_SSH_PORT`, `WP_PATH` – SSH access for WP CLI and file sync.
- `WP_ENV` – environment label used in logs.

## Running the deployment
1. Deploy plugin code and templates:
   ```bash
   WP_ENV=staging ./scripts/deploy.sh
   ```
   - Add `--dry-run` for a no-write simulation of the rsync and SSH commands.
2. Seed content and options:
   ```bash
   WP_ENV=staging node scripts/seed-grander-content.js --payload=grander_rest_payload_outline_v1.json
   ```
   - Add `--dry-run` to log intended REST updates without persisting changes.
3. Validate against the canonical payload:
   ```bash
   WP_ENV=staging node scripts/validate-grander-content.js --payload=grander_rest_payload_outline_v1.json
   ```

## Idempotency and safety notes
- All create/update calls are slug based; reruns update existing objects rather than duplicating them.
- Options are written via the `/wp-json/grander/v1/options` endpoint which accepts the same keys defined in the payload.
- FAQ seeds are written both as CPT entries (if provided) and as `gc_faq_items` option entries keyed by group for compatibility with the existing frontend bindings.
- Dry-run flags are available for both deploy and seed scripts to inspect actions without applying changes.

## Rollback guidance
- Revert to a previous git commit locally, then rerun `scripts/deploy.sh` followed by `scripts/seed-grander-content.js` to restore the prior state on the target environment.
- If Elementor templates were imported incorrectly, re-export the correct JSON files and rerun the deploy script with the corrected files in `elementor-templates/`.

## Post-deploy visual check
- Run `scripts/validate-grander-content.js` to confirm REST data matches the payload for pages, taxonomies, and options.
- Manually spot-check core URLs after deployment (Home, About, Build process, Performance building, Services, Team, Gallery, Blog, Contact, Estimate, Search, and 404) to ensure Elementor bindings reflect the synced data.
