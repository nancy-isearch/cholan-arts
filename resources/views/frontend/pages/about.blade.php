@extends('frontend.layouts.about-us')

@section('title','About Us – Cholan Arts')

@section('content')
<!-- BREADCRUMB -->
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">About Us</li>
    </ul>
  </div>
</div>
<!-- ══ 1. HERO ══════════════════════════════════════════════════ -->
<section class="about-hero">
  <div class="hero-left">
    <div class="hero-eyebrow">
      <div class="dot"></div>
      Established 1994 · Trichy, Tamil Nadu
    </div>
    <h1 class="hero-h1">Where Tradition <br /><em>Meets Eternity</em></h1>
    <p class="hero-sub">
      Cholan Arts is a destination for authentic handcrafted bronze and brass artefacts, rooted in the rich artistic heritage of Tamil Nadu. Each piece is created using time-honoured techniques, preserving a legacy that continues across generations.
    </p>
    <div>
      <a
      href="/contact-us"
      class="btn-orange d-inline-block"
      aria-label="Contact Cholan Arts">
      Contact Us
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        viewBox="0 0 24 24"
        fill="none"
        stroke="#000"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round">
        <path d="M20.0001 12H4.00012" />
        <path
          d="M15.0001 17C15.0001 17 20.0001 13.3176 20.0001 12C20.0001 10.6824 15.0001 7 15.0001 7" />
      </svg>
    </a>
    </div>
  </div>
  <div class="hero-right">
    <img src="{{ asset('assets/images/about/banner-bg.webp') }}"
      alt="Cholan Arts Performance" />
    <div class="hero-year-badge">
      <div class="year">1994</div>
      <div class="since">38 Years of Heritage</div>
    </div>
  </div>
</section>
<!-- ══ 3. OUR STORY ══════════════════════════════════════════════ -->
<section class="story-section">
  <div class="story-grid">
    <div class="story-img-col reveal-left">
      <div class="story-year-pill">Since 1994</div>
      <div class="story-img-main">
        <img src="{{ asset('assets/images/about/3111.webp') }}" alt="Cholan Arts Story" />
      </div>
      <div class="story-img-float">
        <img src="{{ asset('assets/images/about/6920.webp') }}" alt="Early days" />
      </div>
    </div>
    <div class="story-text reveal-right">
      <span class="sec-tag">Our Story</span>
      <h2 class="sec-h2">
        Rooted in Heritage,<br /><em>Blooming Through Art</em>
      </h2>
      <div class="fancy-div"><span>✦</span></div>
      <p class="sec-body">
        Cholan Arts Emporium showcases a diverse and carefully curated collection, including bronze and brass sculptures, silver jewellery, precious and semi-precious jewellery, silk paintings, stoles, as well as cotton and handloom textiles. Pandian takes a personal interest in engaging with visitors, sharing insights into the craftsmanship, symbolism, and cultural significance behind each piece, thereby creating a meaningful connection between the art and the buyer.
      </p>
      <p class="sec-body" style="margin-top: 1rem">
        In 2007, with a vision to support and sustain traditional artisans, he established his own foundry at Swamimalai, the heartland of Chola Bronze casting. This initiative not only ensured authenticity in production but also provided skilled artisans with dignified livelihoods. All sculptures are handcrafted using the ancient lost-wax casting technique, where each piece is unique, and no two creations are ever identical, making every artwork truly exclusive.
      </p>
      <p class="sec-body" style="margin-top: 1rem">
        As the business grew, Cholan Arts Emporium expanded its presence with branches in Tiruvannamalai (1998), Kumbakonam (2007), and Madurai (2012). The Tiruvannamalai showroom holds a special place, featuring a distinctive collection of spiritual literature from renowned masters and gurus. Carefully curated from across the country, this collection offers visitors an opportunity for introspection, spiritual enrichment, and a deeper sense of connection.
      </p>
      <p class="sec-body" style="margin-top: 1rem">
        Today, Cholan Arts Emporium stands as a sought-after destination for global travellers seeking authentic Indian handicrafts. Through its commitment to preserving rare art forms, especially the traditional Chola Bronze casting, which is increasingly at risk of decline, the emporium continues to play a vital role in reviving and sustaining this invaluable heritage.
      </p>
      <p class="sec-body" style="margin-top: 1rem">
        Each showroom reflects the spirit of India’s cultural and spiritual richness, offering artefacts that are not only aesthetically striking but also deeply rooted in tradition, enabling visitors to experience the timeless legacy of Indian art and craftsmanship.
      </p>
    </div>
  </div>
</section>

<!-- ══ 4. CORE VALUES ════════════════════════════════════════════ -->
<section class="values-section">
  <div class="values-inner">
    <div class="values-head reveal">
      <span class="sec-tag">What We Stand For</span>
      <h2 class="sec-h2" style="color: white">
        Our Core <em style="color: var(--gold-light)">Values</em>
      </h2>
    </div>
    <div class="values-grid">
      <div class="value-card reveal">
        <span class="value-icon">🙏</span>
        <h3>Authenticity over Imitation</h3>
        <p>
          Every piece at Cholan Arts is handcrafted using traditional methods, ensuring originality and integrity. No two creations are ever identical, reflecting the true nature of artisanal work.
        </p>
      </div>
      <div class="value-card reveal" style="transition-delay: 0.1s">
        <span class="value-icon">🌱</span>
        <h3>Legacy & Continuity</h3>
        <p>
          We are custodians of a centuries-old craft. Through our work and our foundry in Swamimalai, we ensure that traditional techniques like the lost-wax process continue to thrive across generations.
        </p>
      </div>
      <div class="value-card reveal" style="transition-delay: 0.2s">
        <span class="value-icon">🌍</span>
        <h3>Cultural Integrity</h3>
        <p>
          Our artefacts are deeply rooted in India’s spiritual and cultural traditions. Each piece carries meaning, symbolism, and a connection to heritage beyond its visual appeal.
        </p>
      </div>
      <div class="value-card reveal" style="transition-delay: 0.3s">
        <span class="value-icon">🔬</span>
        <h3>Craftsmanship & Precision</h3>
        <p>
          From raw material to final detailing, every stage is handled with care and expertise. Skilled artisans dedicate weeks to perfect each sculpture, down to the finest detail.
        </p>
      </div>
      <div class="value-card reveal" style="transition-delay: 0.4s">
        <span class="value-icon">✨</span>
        <h3>Tradition, Responsibly Evolved</h3>
        <p>
          While we remain true to classical forms, we present them in ways that resonate with modern spaces and global audiences - without compromising authenticity.
        </p>
      </div>
      <div class="value-card reveal" style="transition-delay: 0.5s">
        <span class="value-icon">🤝</span>
        <h3>Artisan-Centric Approach</h3>
        <p>
         We work closely with artisans, ensuring consistent opportunities and preserving their livelihoods, while maintaining the highest standards of traditional craftsmanship.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 5. TIMELINE ═══════════════════════════════════════════════ -->
<section class="timeline-section">
  <div class="timeline-head reveal">
    <span class="sec-tag">Our Journey</span>
    <h2 class="sec-h2">Steps in Lost <em>Wax Technique</em></h2>
    <p>
      Lost wax casting is one of humanity's oldest and most refined sculptural arts, transforming simple wax carvings into timeless metal masterpieces. By encasing a wax figure in clay and burning it away, craftsmen pour molten bronze into the resulting void, revealing breathtaking sculptures of unmatched detail and singular beauty.
    </p>
  </div>
  <div class="timeline">
    <div class="tl-item reveal">
      <div class="tl-content">
        <h4>All begin with a “Midrib” or “Eerkili”</h4>
        <p>
          The midribs of coconut tree leaves are used for the outline of the proposed model of the statue. No devices are used for measurements.
        </p>
      </div>
      <div class="tl-dot-col">
        <div class="tl-dot">01</div>
      </div>
      <div class="tl-empty"></div>
    </div>
    <div class="tl-item reveal">
      <div class="tl-empty"></div>
      <div class="tl-dot-col">
        <div class="tl-dot">02</div>
      </div>
      <div class="tl-content">
        <h4>Beeswax into a Handmade skeleton</h4>
        <p>
          Using the measurements taken, handmade skeleton beeswax models are crafted, marked with major lines and divisions.
        </p>
      </div>
    </div>
    <div class="tl-item reveal">
      <div class="tl-content">
        <h4>Wax model splashed with Delta Clay</h4>
        <p>
          The wax model is covered with the clay, leaving a small hole at the bottom and is left to dry for a few days without any disturbance to the structure.
        </p>
      </div>
      <div class="tl-dot-col">
        <div class="tl-dot">03</div>
      </div>
      <div class="tl-empty"></div>
    </div>
    <div class="tl-item reveal">
      <div class="tl-empty"></div>
      <div class="tl-dot-col">
        <div class="tl-dot">04</div>
      </div>
      <div class="tl-content">
        <h4>Wax Lost – Embryo made</h4>
        <p>
          The clay-covered wax models are baked in fire, and one can witness the wax inside run out in a melted condition, leaving behind only the clay model. This is the moment where the term Lost Wax becomes True, turning the model “Only one of its kind”.
        </p>
      </div>
    </div>
    <div class="tl-item reveal">
      <div class="tl-content">
        <h4>Embryo Evolves into a statue</h4>
        <p>
          An alloy of five metals, Zinc, Copper, Tin, Silver and Gold, is heated to form a metal called “Panchaloka”(combination of Five metals). The alloy is heated to a very high temperature of 1400 degrees Celsius. The heated mixture is poured from the crucible into the embryo carefully. The embryo is allowed to cool for a few days.
        </p>
      </div>
      <div class="tl-dot-col">
        <div class="tl-dot">05</div>
      </div>
      <div class="tl-empty"></div>
    </div>
    <div class="tl-item reveal">
      <div class="tl-empty"></div>
      <div class="tl-dot-col">
        <div class="tl-dot">06</div>
      </div>
      <div class="tl-content">
        <h4>Statue with all its beauty</h4>
        <p>
          The outer clay layer of the embryo is removed very carefully with chisels, and the statue taken out is now ready for further processing by the artisans. The entire team works on the statue, chiselling and filing for weeks, turning it into a beautiful statue with all minute details like fingernails and the statue is further adorned with jewels, hairstyles, and crowns. Bas reliefs are made with similar procedures.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 6. FOUNDER SECTION ════════════════════════════════════════ -->
<section class="founder-section" id="founder">
  <div class="founder-inner">
    <!-- MAIN FOUNDER -->
    <div class="founder-main-grid">
      <div>
        <div class="founder-img-col reveal-left">
          <div class="founder-img-frame">
            <img src="{{ asset('assets/images/about/about-cholan.webp') }}"
              alt="Cholan Arts" />
          </div>
        </div>
      </div>

      <div class="founder-text reveal-right">
        <div class="founder-badge">🌟 Founder</div>
        <h2 class="founder-name">
          The Visionary <br />Behind Cholan Arts
        </h2>
        <div class="fancy-div"><span>✦</span></div>
        <p class="founder-bio">
          Pandian, Founder of Cholan Arts Emporium, Tiruchirappalli, established the enterprise in 1994, driven by a deep passion for India’s rich artistic heritage. His journey in the handicrafts sector began as early as 1985, and in 1994, he ventured independently into the handicrafts business, laying the foundation for what would later become a distinguished name in traditional arts.
        </p>
        <p class="founder-bio">
          With decades of experience, Pandian has consistently worked towards preserving and promoting India’s indigenous art forms. He strongly believes that handicrafts are not merely products, but living expressions of heritage, embodying traditional knowledge, craftsmanship, and cultural identity. His passion lies in Chola Bronze and brass artefacts, inspired by the grandeur of the Chola dynasty and its timeless artistic legacy.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ══ 7. STATS ═══════════════════════════════════════════════════ -->
<section class="stats-section">
  <div class="stats-inner">
    <div class="stats-grid">
      <div class="stat-item reveal">
        <div class="stat-num">32<span>+</span></div>
        <div class="stat-label">Years of Excellence</div>
        <div class="stat-sub">Since 1994 in Trichy</div>
      </div>
      <div class="stat-item reveal" style="transition-delay: 0.1s">
        <div class="stat-num">2,400<span>+</span></div>
        <div class="stat-label">Trained Artists</div>
        <div class="stat-sub">Across 40 countries</div>
      </div>
      <div class="stat-item reveal" style="transition-delay: 0.2s">
        <div class="stat-num">180<span>+</span></div>
        <div class="stat-label">Stage Productions</div>
        <div class="stat-sub">In India & worldwide</div>
      </div>
      <div class="stat-item reveal" style="transition-delay: 0.3s">
        <div class="stat-num">12<span>+</span></div>
        <div class="stat-label">Art Forms</div>
        <div class="stat-sub">Bronze • Brass • Silver • Textiles</div>
      </div>
    </div>
  </div>
</section>
<!-- ══ 10. COMMUNITY IMPACT ══════════════════════════════════════ -->
<section class="impact-section">
  <div class="impact-grid">
    <div class="impact-img reveal-left">
      <img src="{{ asset('assets/images/products-img/balaji.webp') }}"
        alt="Community Impact" />
    </div>
    <div class="impact-text reveal-right">
      <span class="sec-tag">Beyond the Stage</span>
      <h2 class="sec-h2">Cultural <em>authenticity</em></h2>
      <p class="sec-body">
 
        At Cholan Arts, every creation reflects a tradition that has been shaped and refined over generations. Our focus is not just on the finished piece, but on the integrity of the process behind it.
        </p>
        <p class="sec-body">
        By working closely with skilled artisans and maintaining our own foundry in Swamimalai, we ensure that each sculpture is crafted using time-honoured methods, without compromise.
        </p>
        <p class="sec-body"> 
        Our role is to sustain the authenticity of Indian craftsmanship in its true form.
        </p> 
      <ul class="impact-list">
        <li>
          Ensuring traditional techniques are practised without dilution
        </li>
        <li>
          Supporting artisans through long-term, consistent engagement
        </li>
        <li>
          Retaining the individuality of each handcrafted piece
        </li>
        <li>
            Presenting heritage art in a way that remains relevant today
           
        </li>
      </ul>
      <p class="sec-body"> 
        Every piece we create stands as a reflection of this commitment.
      </p>
    </div>
  </div>
</section>

<!-- ===== TESTIMONIALS ===== -->
<section
  class="testimonials-section"
  aria-labelledby="testimonials-title mb-0">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="elfsight-app-e77f002b-5e22-409e-81f8-79014679d1c9" data-elfsight-app-lazy></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ 13. CTA ═════════════════════════════════════════════════════ -->
@include('frontend.components.cta')
@endsection