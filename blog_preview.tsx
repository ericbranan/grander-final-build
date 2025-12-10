import React, { useState } from 'react';
import { Search, Calendar, User, ArrowLeft, Clock } from 'lucide-react';

export default function GranderBlogPreview() {
  const [view, setView] = useState('search');

  const posts = [
    {
      id: 1,
      title: 'Choosing the Right Materials for Your Custom Home',
      excerpt: 'Discover how selecting premium materials impacts the longevity, aesthetics, and value of your custom home construction project.',
      date: '2025-10-08',
      author: 'Micah Grander',
      category: 'Building Materials',
      readTime: '6 min read',
      image: 'https://images.unsplash.com/photo-1600585154084-4e5fe7c39198?w=1200&h=750&fit=crop&q=80',
      content: `When embarking on a custom home building journey, the materials you select will define not only the aesthetic appeal of your home but also its structural integrity and long term value. At Grander Construction, we guide our clients through every material decision with expertise gained from decades of luxury home building.

## The Foundation of Quality

Premium materials are an investment in your home's future. While initial costs may be higher, the return on investment through durability, energy efficiency, and timeless appeal far exceeds budget alternatives. We work exclusively with suppliers who meet our rigorous standards for quality and sustainability.

## Exterior Materials That Endure

Natural stone, brick, and high quality siding options provide both beauty and protection. Consider the architectural style of your home when selecting exterior materials. Traditional designs often benefit from brick and stone combinations, while contemporary homes can showcase clean lines with modern composite materials.

Stone veneer offers the appearance of solid stone at a reduced weight and cost. However, full thickness natural stone provides unmatched durability and authentic texture that ages gracefully over decades.

## Interior Selections

Hardwood flooring remains the gold standard for luxury homes. Species like white oak, walnut, and hickory offer distinct grain patterns and durability. Wide plank flooring has become increasingly popular, creating a sense of openness and modern elegance.

Custom millwork and trim work elevate interior spaces from ordinary to extraordinary. Crown molding, wainscoting, and custom built ins should be crafted from quality hardwoods that can be stained or painted to your exact specifications.

## Kitchen and Bath Considerations

Natural stone countertops, whether granite, marble, or quartzite, provide unique beauty that manufactured materials cannot replicate. Each slab is one of a kind, ensuring your kitchen or bathroom has a truly custom appearance.

Tile selections should consider both aesthetics and practicality. Porcelain and ceramic tiles offer endless design possibilities, while natural stone tiles bring organic beauty to any space.

## The Grander Difference

Our relationships with premium material suppliers ensure you receive the best quality at competitive pricing. We handle all aspects of material selection, procurement, and installation, ensuring seamless project execution and superior results.

Contact our team to discuss material options for your custom home project. We will help you make informed decisions that align with your vision, budget, and timeline.`
    },
    {
      id: 2,
      title: 'Pool Houses and Outdoor Living: Extending Your Home',
      excerpt: 'Transform your backyard into a luxury retreat with custom pool houses, cabanas, and outdoor entertainment spaces designed for year round enjoyment.',
      date: '2025-10-05',
      author: 'Micah Grander',
      category: 'Outdoor Living',
      readTime: '5 min read',
      image: 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?w=1200&h=750&fit=crop&q=80',
      content: `The outdoor living movement has transformed how homeowners utilize their properties, creating seamless transitions between indoor comfort and outdoor enjoyment. At Grander Construction, we specialize in designing and building custom pool houses, pavilions, and outdoor entertainment spaces that elevate your property value and lifestyle.

## More Than Just a Pool House

Today's pool houses serve multiple functions beyond changing rooms and storage. They are fully realized living spaces equipped with bathrooms, outdoor showers, kitchenettes, and comfortable lounging areas. Whether hosting summer gatherings or enjoying quiet family time, a well designed pool house becomes the heart of your outdoor entertaining.

## Design Considerations

Architectural cohesion between your main home and pool house creates visual harmony across your property. We carefully match materials, rooflines, and design details to ensure your pool house feels like a natural extension of your home rather than an afterthought.

Vaulted ceilings with tongue and groove detailing add elegance and improve air circulation. This classic design element works beautifully in both traditional and contemporary settings, creating an open, airy atmosphere perfect for warm weather entertaining.

## Essential Features

A half bath or full bath with outdoor shower provides convenience for pool users while keeping wet traffic outside your main home. Plumbing installations during initial construction are far more cost effective than retrofitting later.

Outdoor kitchens transform your pool house into a complete entertainment venue. From simple built in grills to full service kitchens with refrigeration, sinks, and prep areas, these amenities eliminate constant trips to the main house during gatherings.

Covered areas extend usability throughout the year, providing shade during summer and protection from light rain. Ceiling fans and optional heaters can further expand your comfortable outdoor season.

## Material Selection

Brick and stone construction offers timeless beauty and exceptional durability. These materials withstand weather exposure while maintaining their appearance for decades. White brick creates a bright, clean aesthetic that never goes out of style.

Tongue and groove ceilings in stained or painted wood add warmth and sophistication. This traditional carpentry technique showcases quality craftsmanship and creates visual interest overhead.

## The Grander Construction Approach

Our pool house projects begin with understanding how you will use the space. Do you need storage for pool equipment? Will you host large gatherings or prefer intimate family settings? These answers shape every design decision.

We manage the entire process from permitting through final walkthrough, coordinating all trades and ensuring timeline adherence. Our attention to detail and commitment to quality craftsmanship means your pool house will provide enjoyment for years to come.

Recent projects like the Rockberry Pool Pavilion and Links O'Tryon Pool Cabana demonstrate our ability to create stunning outdoor spaces that combine beauty, functionality, and lasting value.

Contact Grander Construction to discuss your outdoor living vision. Let us show you how a custom pool house can transform your backyard into a personal resort.`
    },
    {
      id: 3,
      title: 'The Custom Home Building Process in Upstate South Carolina',
      excerpt: 'A comprehensive guide to understanding each phase of building your dream custom home from initial consultation to final walkthrough.',
      date: '2025-10-01',
      author: 'Micah Grander',
      category: 'Building Process',
      readTime: '8 min read',
      image: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?w=1200&h=750&fit=crop&q=80',
      content: `Building a custom home is one of life's most significant investments and rewarding experiences. Understanding the process helps you make informed decisions and sets realistic expectations for your project timeline and budget. At Grander Construction, we pride ourselves on transparent communication throughout every phase of your project.

## Phase One: Initial Consultation and Planning

Your custom home journey begins with a comprehensive consultation. We discuss your vision, lifestyle needs, budget parameters, and timeline expectations. This conversation forms the foundation for every decision that follows.

Site evaluation comes next. Whether you own land in Greer, Greenville, or surrounding Upstate South Carolina communities, we assess topography, access, utilities, and zoning restrictions. These factors significantly impact design possibilities and construction costs.

## Phase Two: Design Development

Working with architects and designers, your vision takes shape on paper. Initial conceptual drawings evolve through multiple revisions as we refine room layouts, architectural style, and material selections. This iterative process ensures the final design perfectly matches your expectations.

Budget discussions occur throughout design development. We provide transparent cost projections and explore value engineering opportunities when necessary. Our goal is delivering maximum value within your budget parameters.

## Phase Three: Permitting and Approvals

Once designs are finalized, we prepare and submit permit applications to local building authorities. This process varies by jurisdiction but typically takes four to eight weeks. We handle all regulatory requirements, inspections scheduling, and compliance documentation.

## Phase Four: Site Preparation and Foundation

Construction begins with site clearing, grading, and utility installation. Foundation work follows, whether slab, crawl space, or full basement. Proper foundation construction is critical to your home's structural integrity.

Underground plumbing and electrical rough ins are completed before foundation pour. Inspections at this stage verify code compliance before proceeding to framing.

## Phase Five: Framing and Structural Work

Wall framing, roof structure, and exterior sheathing transform your floor plan into three dimensional reality. This phase moves quickly and is often the most visually dramatic stage of construction.

Windows and exterior doors are installed, followed by roofing materials. Your home is now weather tight, allowing interior work to proceed regardless of conditions.

## Phase Six: Systems Installation

Electrical, plumbing, and HVAC systems are installed throughout the structure. Insulation is added to exterior walls and ceilings, improving energy efficiency and comfort. Multiple inspections verify proper installation and code compliance.

## Phase Seven: Interior Finishes

Drywall installation, taping, and finishing creates smooth interior surfaces ready for paint. Flooring, cabinetry, countertops, and trim work follow in carefully sequenced order. This phase requires coordination of multiple trades and careful attention to detail.

## Phase Eight: Final Details and Walkthrough

Appliances, fixtures, and hardware are installed. Paint touch ups, final cleaning, and punch list completion prepare your home for occupancy. We conduct a comprehensive final walkthrough, ensuring every detail meets our quality standards and your expectations.

## Why Choose Grander Construction

Our streamlined process, experienced team, and commitment to quality ensure your custom home project proceeds smoothly from concept to completion. We maintain our own crew rather than relying solely on subcontractors, giving us direct control over quality and scheduling.

We communicate proactively, maintain clean job sites, and deliver exceptional craftsmanship at every stage. Our reputation across Upstate South Carolina is built on completed projects that exceed expectations.

Ready to begin your custom home journey? Contact our team to schedule your initial consultation.`
    },
    {
      id: 4,
      title: 'Detached Garages and Workshop Buildings',
      excerpt: 'Explore the benefits of custom detached garages, workshop spaces, and versatile outbuildings that add functionality and value to your property.',
      date: '2025-09-28',
      author: 'Micah Grander',
      category: 'Garages & Outbuildings',
      readTime: '6 min read',
      image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&h=750&fit=crop&q=80',
      content: `Detached garages and workshop buildings offer homeowners valuable additional space while enhancing property aesthetics and functionality. At Grander Construction, we design and build custom outbuildings that complement your main home's architecture while serving your specific storage, workspace, and hobby needs.

## Benefits of Detached Structures

Separating garage and workshop space from your main home offers several advantages. Noise from power tools, vehicle maintenance, or hobbies remains isolated from living areas. Fumes, dust, and clutter stay contained in dedicated spaces rather than migrating through your home.

Property value increases significantly with well designed outbuildings. Potential buyers appreciate dedicated storage for vehicles, equipment, and outdoor gear. Workshop spaces appeal to hobbyists and professionals alike, making your property stand out in competitive real estate markets.

## Design Flexibility

Detached structures provide design freedom unavailable with attached garages. You can position buildings to maximize lot usage, create visual interest, or improve traffic flow on your property. Multiple bays, oversized doors for boats or RVs, and custom dimensions become feasible without impacting your main home's footprint.

Architectural matching ensures cohesive property aesthetics. We carefully coordinate siding materials, roof styles, trim details, and color palettes. The result looks intentionally planned rather than added as an afterthought.

## HOA Compliance and Aesthetics

Many homeowners associations have strict guidelines for outbuildings. Our experience with HOA requirements ensures your garage meets community standards while maximizing functionality. The Bartolf Detached Garage project exemplifies HOA compliant design with its attractive stone veneer accents, neutral siding, and coordinated black fixtures.

Stone veneer adds upscale appeal and ties detached structures visually to main homes featuring similar materials. This design technique creates architectural unity across your property.

## Functional Considerations

Size planning should account for current and future needs. Standard two car garages measure 20x20 feet minimum, but we recommend 24x24 feet or larger for comfortable maneuvering and storage. Three car configurations typically require 32x24 feet.

Ceiling height matters for overhead storage, lifts, or tall vehicles. Standard eight foot ceilings work for basic car storage, but ten to twelve foot ceilings dramatically increase versatility.

Climate control transforms garages into year round workspaces. Insulation, heating, and cooling systems make these buildings comfortable regardless of season. Finishing interior walls and adding proper lighting creates professional grade workshop environments.

## Pole Buildings and Metal Structures

Pole barn construction offers economical solutions for larger buildings. These engineered structures use posts embedded in ground rather than traditional foundations, reducing costs while maintaining strength. Modern pole buildings can be finished attractively with metal siding, board and batten, or other materials.

Metal buildings provide durability and low maintenance. Our Burns Shop Building demonstrates how pole barn style metal construction creates functional workspace with clean aesthetics and long term reliability.

## The Construction Process

Detached building projects typically proceed faster than home construction, often completing in weeks rather than months. Site preparation, foundation or post installation, framing, and finishing follow similar sequences on compressed timelines.

Permits and inspections remain necessary but generally involve less complexity than residential permits. We handle all regulatory requirements and ensure compliance with local building codes.

## Grander Construction Expertise

Our portfolio includes diverse outbuilding projects from simple carports to elaborate multi use structures. The Coachman Plantation Detached Garage, Woodruff Carport Addition, and various workshop buildings showcase our range and attention to detail.

We work with you to determine optimal building size, features, and finishes that align with your budget and needs. Our construction expertise ensures quality results that enhance your property for years to come.

Contact Grander Construction to discuss your detached garage or workshop building project. Let us help you add valuable, beautiful, and functional space to your property.`
    },
    {
      id: 5,
      title: 'Barndominium Living: Modern Rustic Homes',
      excerpt: 'Discover why barndominiums are becoming the preferred choice for homeowners seeking open concept living, durability, and distinctive style.',
      date: '2025-09-24',
      author: 'Sarah Peterson',
      category: 'Home Styles',
      readTime: '7 min read',
      image: 'https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=1200&h=750&fit=crop&q=80'
    },
    {
      id: 6,
      title: 'Outdoor Kitchen Design and Installation',
      excerpt: 'Create the ultimate outdoor cooking and entertaining space with professionally designed outdoor kitchens that combine function and style.',
      date: '2025-09-20',
      author: 'David Thompson',
      category: 'Outdoor Living',
      readTime: '5 min read',
      image: 'https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?w=1200&h=750&fit=crop&q=80'
    }
  ];

  const [searchQuery, setSearchQuery] = useState('');
  const [selectedPost, setSelectedPost] = useState(posts[0]);

  const filteredPosts = posts.filter(post =>
    post.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
    post.excerpt.toLowerCase().includes(searchQuery.toLowerCase()) ||
    post.category.toLowerCase().includes(searchQuery.toLowerCase())
  );

  const BlogSearchPage = () => (
    <div style={{ 
      minHeight: '100vh', 
      backgroundColor: '#f5f3f0',
      padding: '80px 24px 60px'
    }}>
      <div style={{ 
        maxWidth: '1200px', 
        margin: '0 auto 80px',
        textAlign: 'center'
      }}>
        <h1 style={{ 
          fontSize: '64px', 
          fontWeight: '700', 
          color: '#4c2a19',
          marginBottom: '20px',
          letterSpacing: '-1px',
          lineHeight: '1.1em',
          fontFamily: 'Georgia, serif'
        }}>
          Insights & Ideas
        </h1>
        <p style={{ 
          fontSize: '18px', 
          color: '#231f20',
          marginBottom: '40px',
          fontFamily: 'Arial, sans-serif',
          lineHeight: '1.7em',
          maxWidth: '600px',
          margin: '0 auto 40px'
        }}>
          Expert guidance on custom home building, design trends, and construction best practices
        </p>

        <div style={{ 
          maxWidth: '700px', 
          margin: '0 auto',
          position: 'relative'
        }}>
          <Search 
            size={20} 
            style={{ 
              position: 'absolute', 
              left: '18px', 
              top: '50%', 
              transform: 'translateY(-50%)',
              color: '#b08d66'
            }} 
          />
          <input
            type="text"
            placeholder="Search articles..."
            value={searchQuery}
            onChange={(e) => setSearchQuery(e.target.value)}
            style={{
              width: '100%',
              padding: '16px 18px 16px 50px',
              fontSize: '16px',
              fontFamily: 'Arial, sans-serif',
              border: '1px solid #e8dfd5',
              borderRadius: '0px',
              backgroundColor: '#FFFFFF',
              outline: 'none',
              transition: 'all 0.3s',
              color: '#231f20',
              boxShadow: '0 4px 8px rgba(76,42,25,0.1)'
            }}
            onFocus={(e) => {
              e.target.style.borderColor = '#b08d66';
              e.target.style.borderWidth = '2px';
              e.target.style.boxShadow = '0 0 0 3px rgba(176,141,102,0.1)';
            }}
            onBlur={(e) => {
              e.target.style.borderColor = '#e8dfd5';
              e.target.style.borderWidth = '1px';
              e.target.style.boxShadow = '0 4px 8px rgba(76,42,25,0.1)';
            }}
          />
        </div>
      </div>

      <div style={{ 
        maxWidth: '1200px', 
        margin: '0 auto',
        display: 'grid',
        gridTemplateColumns: 'repeat(auto-fill, minmax(360px, 1fr))',
        gap: '30px'
      }}>
        {filteredPosts.map(post => (
          <article 
            key={post.id}
            onClick={() => {
              setSelectedPost(post);
              setView('single');
            }}
            style={{
              backgroundColor: '#FFFFFF',
              overflow: 'hidden',
              cursor: 'pointer',
              transition: 'all 0.3s ease',
              boxShadow: '0 8px 20px rgba(35,31,32,0.08)',
              borderTop: '3px solid #b08d66'
            }}
            onMouseEnter={(e) => {
              e.currentTarget.style.transform = 'translateY(-4px)';
              e.currentTarget.style.boxShadow = '0 12px 30px rgba(35,31,32,0.12)';
            }}
            onMouseLeave={(e) => {
              e.currentTarget.style.transform = 'translateY(0)';
              e.currentTarget.style.boxShadow = '0 8px 20px rgba(35,31,32,0.08)';
            }}
          >
            <img 
              src={post.image} 
              alt={post.title}
              style={{ 
                width: '100%', 
                height: '280px', 
                objectFit: 'cover',
                display: 'block'
              }}
            />
            <div style={{ padding: '32px 28px' }}>
              <div style={{ 
                display: 'inline-block',
                backgroundColor: '#b08d66',
                color: '#FFFFFF',
                padding: '8px 16px',
                fontSize: '12px',
                fontWeight: '700',
                textTransform: 'uppercase',
                letterSpacing: '1px',
                marginBottom: '16px',
                fontFamily: 'Arial, sans-serif'
              }}>
                {post.category}
              </div>
              
              <h2 style={{ 
                fontSize: '30px', 
                fontWeight: '700', 
                color: '#231f20',
                marginBottom: '14px',
                lineHeight: '1.3em',
                fontFamily: 'Georgia, serif',
                letterSpacing: '0px'
              }}>
                {post.title}
              </h2>
              
              <p style={{ 
                fontSize: '16px', 
                color: '#231f20',
                lineHeight: '1.7em',
                marginBottom: '20px',
                fontFamily: 'Arial, sans-serif'
              }}>
                {post.excerpt}
              </p>

              <div style={{ 
                display: 'flex', 
                alignItems: 'center', 
                gap: '20px',
                fontSize: '14px',
                color: '#231f20',
                paddingTop: '20px',
                borderTop: '1px solid #e8dfd5',
                flexWrap: 'wrap',
                fontFamily: 'Arial, sans-serif'
              }}>
                <div style={{ display: 'flex', alignItems: 'center', gap: '6px' }}>
                  <User size={16} color="#b08d66" />
                  {post.author}
                </div>
                <div style={{ display: 'flex', alignItems: 'center', gap: '6px' }}>
                  <Calendar size={16} color="#b08d66" />
                  {new Date(post.date).toLocaleDateString('en-US', { 
                    month: 'short', 
                    day: 'numeric', 
                    year: 'numeric' 
                  })}
                </div>
                <div style={{ display: 'flex', alignItems: 'center', gap: '6px' }}>
                  <Clock size={16} color="#b08d66" />
                  {post.readTime}
                </div>
              </div>
            </div>
          </article>
        ))}
      </div>

      {filteredPosts.length === 0 && (
        <div style={{ 
          textAlign: 'center', 
          padding: '80px 20px',
          color: '#231f20',
          fontFamily: 'Arial, sans-serif'
        }}>
          <p style={{ fontSize: '18px' }}>No articles found matching your search.</p>
        </div>
      )}
    </div>
  );

  const BlogSinglePost = () => (
    <div style={{ 
      minHeight: '100vh', 
      backgroundColor: '#FFFFFF',
      padding: '60px 24px'
    }}>
      <div style={{ maxWidth: '900px', margin: '0 auto' }}>
        <button
          onClick={() => setView('search')}
          style={{
            display: 'flex',
            alignItems: 'center',
            gap: '8px',
            padding: '12px 20px',
            fontSize: '16px',
            fontWeight: '700',
            color: '#4c2a19',
            backgroundColor: 'transparent',
            border: '1px solid #e8dfd5',
            cursor: 'pointer',
            marginBottom: '40px',
            transition: 'all 0.3s',
            fontFamily: 'Arial, sans-serif',
            textTransform: 'uppercase',
            letterSpacing: '1px'
          }}
          onMouseEnter={(e) => {
            e.currentTarget.style.backgroundColor = '#f5f3f0';
            e.currentTarget.style.borderColor = '#b08d66';
          }}
          onMouseLeave={(e) => {
            e.currentTarget.style.backgroundColor = 'transparent';
            e.currentTarget.style.borderColor = '#e8dfd5';
          }}
        >
          <ArrowLeft size={18} />
          Back to Articles
        </button>

        <div style={{
          display: 'inline-block',
          backgroundColor: '#b08d66',
          color: '#FFFFFF',
          padding: '8px 16px',
          fontSize: '12px',
          fontWeight: '700',
          textTransform: 'uppercase',
          letterSpacing: '1px',
          marginBottom: '24px',
          fontFamily: 'Arial, sans-serif'
        }}>
          {selectedPost.category}
        </div>

        <h1 style={{ 
          fontSize: '64px', 
          fontWeight: '700', 
          color: '#4c2a19',
          lineHeight: '1.1em',
          marginBottom: '28px',
          letterSpacing: '-1px',
          fontFamily: 'Georgia, serif'
        }}>
          {selectedPost.title}
        </h1>

        <div style={{ 
          display: 'flex', 
          alignItems: 'center', 
          gap: '24px',
          paddingBottom: '32px',
          marginBottom: '40px',
          borderBottom: '2px solid #e8dfd5',
          flexWrap: 'wrap',
          fontFamily: 'Arial, sans-serif'
        }}>
          <div style={{ display: 'flex', alignItems: 'center', gap: '8px' }}>
            <User size={18} color="#b08d66" />
            <span style={{ fontSize: '16px', color: '#231f20', fontWeight: '700' }}>
              {selectedPost.author}
            </span>
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: '8px' }}>
            <Calendar size={18} color="#b08d66" />
            <span style={{ fontSize: '16px', color: '#231f20' }}>
              {new Date(selectedPost.date).toLocaleDateString('en-US', { 
                month: 'long', 
                day: 'numeric', 
                year: 'numeric' 
              })}
            </span>
          </div>
          <div style={{ display: 'flex', alignItems: 'center', gap: '8px' }}>
            <Clock size={18} color="#b08d66" />
            <span style={{ fontSize: '16px', color: '#231f20' }}>
              {selectedPost.readTime}
            </span>
          </div>
        </div>

        <img 
          src={selectedPost.image} 
          alt={selectedPost.title}
          style={{ 
            width: '100%', 
            height: 'auto',
            marginBottom: '60px',
            boxShadow: '0 12px 24px rgba(35,31,32,0.15)'
          }}
        />

        <div style={{ 
          fontSize: '18px',
          lineHeight: '1.7em',
          color: '#231f20',
          fontFamily: 'Arial, sans-serif'
        }}>
          {selectedPost.content ? (
            selectedPost.content.split('\n\n').map((paragraph, index) => {
              if (paragraph.startsWith('## ')) {
                return (
                  <h2 key={index} style={{ 
                    fontSize: '48px',
                    fontWeight: '700',
                    color: '#4c2a19',
                    marginTop: '60px',
                    marginBottom: '24px',
                    lineHeight: '1.2em',
                    fontFamily: 'Georgia, serif',
                    letterSpacing: '-0.5px'
                  }}>
                    {paragraph.replace('## ', '')}
                  </h2>
                );
              } else {
                return (
                  <p key={index} style={{ marginBottom: '28px' }}>
                    {paragraph}
                  </p>
                );
              }
            })
          ) : (
            <p>{selectedPost.excerpt}</p>
          )}
        </div>

        <div style={{
          marginTop: '80px',
          padding: '40px',
          backgroundColor: '#f5f3f0',
          display: 'flex',
          alignItems: 'center',
          gap: '28px',
          flexWrap: 'wrap'
        }}>
          <div style={{
            width: '100px',
            height: '100px',
            backgroundColor: '#b08d66',
            display: 'flex',
            alignItems: 'center',
            justifyContent: 'center',
            fontSize: '42px',
            fontWeight: '700',
            color: '#FFFFFF',
            flexShrink: 0,
            fontFamily: 'Georgia, serif'
          }}>
            {selectedPost.author.charAt(0)}
          </div>
          <div style={{ flex: 1 }}>
            <h3 style={{ 
              fontSize: '24px', 
              fontWeight: '700', 
              color: '#231f20',
              marginBottom: '12px',
              fontFamily: 'Arial, sans-serif'
            }}>
              {selectedPost.author}
            </h3>
            <p style={{ 
              fontSize: '16px', 
              color: '#231f20',
              lineHeight: '1.7em',
              fontFamily: 'Arial, sans-serif'
            }}>
              {selectedPost.author === 'Micah Grander' 
                ? 'Founder of Grander Construction with extensive experience in custom home building, outdoor living spaces, and luxury construction across Upstate South Carolina. Micah leads our team with a commitment to exceptional craftsmanship and client satisfaction.'
                : 'Member of the Grander Construction team, dedicated to sharing expertise and insights on custom home building, design, and construction excellence.'}
            </p>
          </div>
        </div>

        <div style={{
          marginTop: '60px',
          textAlign: 'center',
          paddingTop: '60px',
          borderTop: '2px solid #e8dfd5'
        }}>
          <h3 style={{
            fontSize: '36px',
            fontWeight: '700',
            color: '#4c2a19',
            marginBottom: '20px',
            fontFamily: 'Georgia, serif',
            letterSpacing: '0px'
          }}>
            Ready to Start Your Project?
          </h3>
          <p style={{
            fontSize: '18px',
            color: '#231f20',
            marginBottom: '32px',
            fontFamily: 'Arial, sans-serif',
            lineHeight: '1.7em'
          }}>
            Contact Grander Construction today to discuss your custom home vision
          </p>
          <button style={{
            padding: '18px 40px',
            fontSize: '16px',
            fontWeight: '700',
            color: '#FFFFFF',
            backgroundColor: '#4c2a19',
            border: 'none',
            cursor: 'pointer',
            transition: 'all 0.3s ease',
            fontFamily: 'Arial, sans-serif',
            textTransform: 'uppercase',
            letterSpacing: '1px',
            boxShadow: '0 4px 8px rgba(76,42,25,0.2)'
          }}
          onMouseEnter={(e) => {
            e.currentTarget.style.backgroundColor = '#b08d66';
            e.currentTarget.style.transform = 'translateY(-2px)';
            e.currentTarget.style.boxShadow = '0 6px 12px rgba(76,42,25,0.25)';
          }}
          onMouseLeave={(e) => {
            e.currentTarget.style.backgroundColor = '#4c2a19';
            e.currentTarget.style.transform = 'translateY(0)';
            e.currentTarget.style.boxShadow = '0 4px 8px rgba(76,42,25,0.2)';
          }}>
            Schedule Consultation
          </button>
        </div>
      </div>
    </div>
  );

  return (
    <div style={{ fontFamily: 'Arial, sans-serif' }}>
      <div style={{ 
        position: 'fixed', 
        top: '20px', 
        right: '20px', 
        zIndex: 1000,
        display: 'flex',
        gap: '0',
        backgroundColor: '#FFFFFF',
        border: '1px solid #e8dfd5',
        boxShadow: '0 4px 12px rgba(35,31,32,0.15)'
      }}>
        <button
          onClick={() => setView('search')}
          style={{
            padding: '14px 24px',
            fontSize: '14px',
            fontWeight: '700',
            color: view === 'search' ? '#FFFFFF' : '#4c2a19',
            backgroundColor: view === 'search' ? '#4c2a19' : '#FFFFFF',
            border: 'none',
            cursor: 'pointer',
            transition: 'all 0.3s',
            textTransform: 'uppercase',
            letterSpacing: '1px'
          }}
        >
          Search Page
        </button>
        <button
          onClick={() => setView('single')}
          style={{
            padding: '14px 24px',
            fontSize: '14px',
            fontWeight: '700',
            color: view === 'single' ? '#FFFFFF' : '#4c2a19',
            backgroundColor: view === 'single' ? '#4c2a19' : '#FFFFFF',
            border: 'none',
            borderLeft: '1px solid #e8dfd5',
            cursor: 'pointer',
            transition: 'all 0.3s',
            textTransform: 'uppercase',
            letterSpacing: '1px'
          }}
        >
          Single Post
        </button>
      </div>

      {view === 'search' ? <BlogSearchPage /> : <BlogSinglePost />}
    </div>
  );
}