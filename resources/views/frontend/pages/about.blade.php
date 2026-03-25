@extends('frontend.layouts.about-us')

@section('title','About Us – Cholan Arts')

@section('content')
    <!-- ══ 1. HERO ══════════════════════════════════════════════════ -->
    <section class="about-hero">
      <div class="hero-left">
        <div class="hero-eyebrow">
          <div class="dot"></div>
          Established 1987 · Chennai, Tamil Nadu
        </div>
        <h1 class="hero-h1">Where Tradition<br /><em>Meets Eternity</em></h1>
        <p class="hero-sub">
          Cholan Arts is a sanctuary for classical dance, Carnatic music, and
          the living heritage of Tamil Nadu - nurturing artists who carry
          ancient wisdom into the modern world.
        </p>
        <div class="hero-stats">
          <div class="hstat">
            <div class="hstat-num">35<sup>+</sup></div>
            <div class="hstat-label">Years of Excellence</div>
          </div>
          <div class="hstat">
            <div class="hstat-num">
              2,400<span style="color: var(--orange-light)">+</span>
            </div>
            <div class="hstat-label">Artists Trained</div>
          </div>
          <div class="hstat">
            <div class="hstat-num">180<sup>+</sup></div>
            <div class="hstat-label">Stage Productions</div>
          </div>
        </div>
      </div>
      <div class="hero-right">
        <img src="{{ asset('assets/images/about/banner-bg.jpg') }}"
          alt="Cholan Arts Performance"
        />
        <div class="hero-year-badge">
          <div class="est">Est.</div>
          <div class="year">1987</div>
          <div class="since">38 Years of Heritage</div>
        </div>
      </div>
      <div class="scroll-hint">
        <span>Scroll</span><span class="arrow">↓</span>
      </div>
    </section>

    <!-- ===== MARQUEE ===== -->
    <!-- <div class="marquee-section" aria-hidden="true">
      <div class="marquee-track">
        <span class="marquee-item"
          >Bring Divine Grace into your Home, with our Handcrafted Spiritual
          Idols.</span
        >
        <span class="marquee-item"
          >Bring Divine Grace into your Home, with our Handcrafted Spiritual
          Idols.</span
        >
        <span class="marquee-item"
          >Bring Divine Grace into your Home, with our Handcrafted Spiritual
          Idols.</span
        >
      </div>
    </div> -->

    <!-- ══ 2. MISSION QUOTE ══════════════════════════════════════════ -->
    <section class="mission-band">
      <div class="mission-inner reveal">
        <blockquote>
          "Art is not a skill - it is a lineage. Every student who walks through
          our doors inherits three thousand years of Tamil civilisation, and
          carries it forward into the next generation."
        </blockquote>
        <cite
          >- <strong>Padmashri Meenakshi Sundaram</strong>, Founder & Guru,
          Cholan Arts</cite
        >
      </div>
    </section>

    <!-- ══ 3. OUR STORY ══════════════════════════════════════════════ -->
    <section class="story-section">
      <div class="story-grid">
        <div class="story-img-col reveal-left">
          <div class="story-year-pill">Since 1987</div>
          <div class="story-img-main">
            <img src="{{ asset('assets/images/about/3111.jpg') }}" alt="Cholan Arts Story" />
          </div>
          <div class="story-img-float">
            <img src="{{ asset('assets/images/about/6920.jpg') }}" alt="Early days" />
          </div>
        </div>
        <div class="story-text reveal-right">
          <span class="sec-tag">Our Story</span>
          <h2 class="sec-h2">
            Rooted in Heritage,<br /><em>Blooming Through Art</em>
          </h2>
          <div class="fancy-div"><span>✦</span></div>
          <p class="sec-body">
            Founded in 1987 in the heart of Chennai, Cholan Arts began as a
            modest classroom in T. Nagar - a single guru, eight students, and an
            unshakeable conviction that classical South Indian art was not just
            performance, but <strong>living prayer</strong>.
          </p>
          <p class="sec-body" style="margin-top: 1rem">
            Over three decades, we have grown into a nationally recognised
            academy - but our soul remains unchanged. Every class, every
            recital, every arangetram is guided by the same philosophy that Guru
            Meenakshi Sundaram brought to life in that first session in 1987:
            <em>teach with love, learn with devotion.</em>
          </p>
          <p class="sec-body" style="margin-top: 1rem">
            Today, our alumni perform on stages from Chennai's prestigious Music
            Academy to Lincoln Center in New York, carrying the rhythms of Tamil
            Nadu across five continents.
          </p>
          <a href="#" class="story-link">Read the full story <span>→</span></a>
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
            <h3>Devotion over Performance</h3>
            <p>
              We teach art as spiritual practice first. Technical excellence
              matters - but only when rooted in sincere devotion to the art form
              and its sacred origins.
            </p>
          </div>
          <div class="value-card reveal" style="transition-delay: 0.1s">
            <span class="value-icon">🌱</span>
            <h3>Lineage & Continuity</h3>
            <p>
              Every technique we teach traces an unbroken line back to the
              ancient masters. We are custodians of a living tradition,
              responsible for passing it intact to the next generation.
            </p>
          </div>
          <div class="value-card reveal" style="transition-delay: 0.2s">
            <span class="value-icon">🌍</span>
            <h3>Inclusivity of the Arts</h3>
            <p>
              Classical art belongs to all - regardless of age, background, or
              ability. We nurture students from 4 to 60 with equal care,
              creating a true community of artists.
            </p>
          </div>
          <div class="value-card reveal" style="transition-delay: 0.3s">
            <span class="value-icon">🔬</span>
            <h3>Rigour & Refinement</h3>
            <p>
              Our curriculum is built on the ancient Guru-Shishya tradition. We
              demand discipline, but always with compassion - understanding that
              mastery is a lifelong journey.
            </p>
          </div>
          <div class="value-card reveal" style="transition-delay: 0.4s">
            <span class="value-icon">✨</span>
            <h3>Innovation within Tradition</h3>
            <p>
              We honour the classical canon while embracing contemporary
              contexts. Our students are trained to interpret ancient forms for
              modern audiences without diluting their essence.
            </p>
          </div>
          <div class="value-card reveal" style="transition-delay: 0.5s">
            <span class="value-icon">🤝</span>
            <h3>Community & Belonging</h3>
            <p>
              Cholan Arts is not just a school - it is a family. Our alumni
              network spans 40 countries, all bound by a shared love for South
              Indian classical arts and the spirit of Cholan.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 5. TIMELINE ═══════════════════════════════════════════════ -->
    <section class="timeline-section">
      <div class="timeline-head reveal">
        <span class="sec-tag">Our Journey</span>
        <h2 class="sec-h2">Milestones That <em>Shaped Us</em></h2>
      </div>
      <div class="timeline">
        <div class="tl-item reveal">
          <div class="tl-content">
            <h4>The First Class</h4>
            <p>
              Guru Meenakshi Sundaram opens the doors of Cholan Arts with 8
              students in a small T. Nagar hall. The Bharatanatyam programme
              begins.
            </p>
          </div>
          <div class="tl-dot-col">
            <div class="tl-dot">🌱</div>
            <div class="tl-year">1987</div>
          </div>
          <div class="tl-empty"></div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-empty"></div>
          <div class="tl-dot-col">
            <div class="tl-dot">🎵</div>
            <div class="tl-year">1993</div>
          </div>
          <div class="tl-content">
            <h4>Carnatic Music Added</h4>
            <p>
              The Carnatic Vocal and Veena programmes launch, with Guru
              Raghavendra Pillai joining as the first full-time music faculty
              member.
            </p>
          </div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-content">
            <h4>First Arangetram Showcase</h4>
            <p>
              12 students perform their debut arangetrams at the Music Academy,
              Chennai - a milestone that establishes Cholan Arts as a premier
              dance institution in Tamil Nadu.
            </p>
          </div>
          <div class="tl-dot-col">
            <div class="tl-dot">🌟</div>
            <div class="tl-year">1998</div>
          </div>
          <div class="tl-empty"></div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-empty"></div>
          <div class="tl-dot-col">
            <div class="tl-dot">🏛️</div>
            <div class="tl-year">2005</div>
          </div>
          <div class="tl-content">
            <h4>New Campus Inaugurated</h4>
            <p>
              Cholan Arts moves into its purpose-built campus on Thiruvalluvar
              Salai, T. Nagar - with three practice halls, a recording studio,
              and a 250-seat auditorium.
            </p>
          </div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-content">
            <h4>International Recognition</h4>
            <p>
              Guru Meenakshi Sundaram is awarded the Padma Shri by the
              Government of India for her outstanding contribution to classical
              dance education.
            </p>
          </div>
          <div class="tl-dot-col">
            <div class="tl-dot">🏅</div>
            <div class="tl-year">2011</div>
          </div>
          <div class="tl-empty"></div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-empty"></div>
          <div class="tl-dot-col">
            <div class="tl-dot">🌍</div>
            <div class="tl-year">2017</div>
          </div>
          <div class="tl-content">
            <h4>30th Anniversary & Global Tour</h4>
            <p>
              The Golden Jubilee year sees Cholan Arts alumni perform in 12
              countries, and the institution launches its first international
              scholarship programme for overseas students.
            </p>
          </div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-content">
            <h4>Digital Academy Launched</h4>
            <p>
              Cholan Arts becomes the first South Indian classical arts
              institution to offer certified online learning, reaching students
              across 40 countries.
            </p>
          </div>
          <div class="tl-dot-col">
            <div class="tl-dot">💻</div>
            <div class="tl-year">2020</div>
          </div>
          <div class="tl-empty"></div>
        </div>
        <div class="tl-item reveal">
          <div class="tl-empty"></div>
          <div class="tl-dot-col">
            <div class="tl-dot">🎆</div>
            <div class="tl-year">2024</div>
          </div>
          <div class="tl-content">
            <h4>Cholan Kalai Vizha 2024</h4>
            <p>
              Our most spectacular annual festival to date - three nights, 200
              performers, and 5,000 attendees celebrating the golden thread of
              Tamil classical heritage.
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
          <div class="founder-img-col reveal-left">
            <div class="founder-img-frame">
              <img src="{{ asset('assets/images/founder-img.webp') }}"
                alt="Guru Meenakshi Sundaram"
              />
            </div>
            <div class="founder-quote-bubble">
              <p>
                "Dance is not what you do with your body - it is what you
                surrender to with your soul."
              </p>
              <cite>- Padmashri Meenakshi Sundaram</cite>
            </div>
          </div>
          <div class="founder-text reveal-right">
            <div class="founder-badge">🌟 Founder & Chief Guru</div>
            <h2 class="founder-name">
              The Visionaries <br />Behind Cholan Arts
            </h2>
            <!-- <div class="founder-title">
              Bharatanatyam Guru · Visionary · Cultural Ambassador
            </div> -->
            <div class="fancy-div"><span>✦</span></div>
            <p class="founder-bio">
              At the heart of Cholan Arts stands the same visionary duo who
              transformed travel into meaningful experiences,
              <strong>Mr Pandian Kumaravel</strong> and
              <strong>Mrs Mythily Pandian</strong>, now channeling their passion
              into the preservation and celebration of art.
            </p>
            <p class="founder-bio">
              <strong>Mr Pandian Kumaravel</strong>, Founder and Managing
              Director, brings with him over two decades of leadership,
              entrepreneurship, and cultural engagement. While widely respected
              in the tourism industry for his strategic foresight and ethical
              business values.
            </p>
            <div class="founder-achievements">
              <div class="ach-chip">
                <span class="chip-icon">🏅</span> Padma Shri 2011
              </div>
              <div class="ach-chip">
                <span class="chip-icon">🎭</span> Kalaimamani Award
              </div>
              <div class="ach-chip">
                <span class="chip-icon">🌍</span> Cultural Ambassador
              </div>
              <div class="ach-chip">
                <span class="chip-icon">📚</span> Author - "Natyam & Atman"
              </div>
              <div class="ach-chip">
                <span class="chip-icon">🎓</span> 800+ Students Trained
              </div>
              <div class="ach-chip">
                <span class="chip-icon">🕌</span> 120+ Arangetrams Guided
              </div>
            </div>
            <!-- <div class="founder-socials">
              <a href="#" class="founder-social-btn">📷 Instagram</a>
              <a href="#" class="founder-social-btn">📘 Facebook</a>
              <a href="#" class="founder-social-btn">▶️ YouTube</a>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 7. STATS ═══════════════════════════════════════════════════ -->
    <section class="stats-section">
      <div class="stats-inner">
        <div class="stats-grid">
          <div class="stat-item reveal">
            <div class="stat-num">35<span>+</span></div>
            <div class="stat-label">Years of Excellence</div>
            <div class="stat-sub">Since 1987 in Chennai</div>
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
            <div class="stat-label">Art Disciplines</div>
            <div class="stat-sub">Dance · Music · Sculpture</div>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 8. PHILOSOPHY ═════════════════════════════════════════════ -->
    <section class="philosophy-section">
      <div class="philosophy-grid">
        <div class="philosophy-text reveal-left">
          <span class="sec-tag">How We Teach</span>
          <h2 class="sec-h2">The Guru-Shishya<br /><em>Philosophy</em></h2>
          <p class="sec-body">
            At Cholan Arts, we do not merely deliver content - we transmit
            tradition. Every class is built on the ancient Guru-Shishya
            (teacher-disciple) relationship.
          </p>
          <div class="philosophy-pillars">
            <div class="pillar">
              <div class="pillar-icon">🎓</div>
              <div>
                <h4>Structured Progression</h4>
                <p>
                  From foundational adavus to arangetram-ready advanced training
                  - every step is intentional, sequential, and deeply grounded
                  in classical theory.
                </p>
              </div>
            </div>
            <div class="pillar">
              <div class="pillar-icon">👁️</div>
              <div>
                <h4>Abhinaya First</h4>
                <p>
                  We train expression before technique. A student who
                  understands the emotion of a piece will always surpass one who
                  only knows the steps.
                </p>
              </div>
            </div>
            <div class="pillar">
              <div class="pillar-icon">🎶</div>
              <div>
                <h4>Music-Dance Integration</h4>
                <p>
                  Our dance students study music theory, and our music students
                  study dance aesthetics. Both arts inform each other at the
                  deepest level.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="philosophy-visual reveal-right">
          <div class="philosophy-img-grid">
            <div class="phi-img wide">
              <img src="{{ asset('assets/images/products-img/product-12.jpg') }}"
                alt="Philosophy"
              />
            </div>
            <div class="phi-img tall">
              <img src="{{ asset('assets/images/products-img/product-3.jpg') }}"
                alt="Student practice"
              />
            </div>
            <div class="phi-img tall">
              <img src="{{ asset('assets/images/products-img/product-2.jpg') }}"
                alt="Guru teaching"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 9. AWARDS ══════════════════════════════════════════════════ -->
    <section class="awards-section">
      <div class="awards-inner">
        <div class="awards-head reveal">
          <span class="sec-tag">Recognition</span>
          <h2 class="sec-h2">Honours & <em>Awards</em></h2>
        </div>
        <div class="awards-grid">
          <div class="award-card reveal">
            <span class="award-icon">🏅</span>
            <div class="award-year">2011</div>
            <h4>Padma Shri</h4>
            <p>
              Awarded to Founder Guru Meenakshi Sundaram by the President of
              India for exceptional contribution to classical dance.
            </p>
          </div>
          <div class="award-card reveal" style="transition-delay: 0.1s">
            <span class="award-icon">🏆</span>
            <div class="award-year">2018</div>
            <h4>Best Cultural Institution</h4>
            <p>
              Recognised by the Tamil Nadu Government as the Best Classical Arts
              Academy for contribution to heritage preservation.
            </p>
          </div>
          <div class="award-card reveal" style="transition-delay: 0.2s">
            <span class="award-icon">⭐</span>
            <div class="award-year">2019</div>
            <h4>National Cultural Excellence Award</h4>
            <p>
              Conferred by the Sangeet Natak Akademi, India's national academy
              of performing arts, at the annual national convention.
            </p>
          </div>
          <div class="award-card reveal" style="transition-delay: 0.3s">
            <span class="award-icon">🌍</span>
            <div class="award-year">2022</div>
            <h4>UNESCO Creative City Recognition</h4>
            <p>
              Cholan Arts featured in the UNESCO International Report on Living
              Heritage and Performing Arts Institutions.
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 10. COMMUNITY IMPACT ══════════════════════════════════════ -->
    <section class="impact-section">
      <div class="impact-grid">
        <div class="impact-img reveal-left">
          <img src="{{ asset('assets/images/products-img/balaji.png') }}"
            alt="Community Impact"
          />
        </div>
        <div class="impact-text reveal-right">
          <span class="sec-tag">Beyond the Stage</span>
          <h2 class="sec-h2">Art as <em>Service</em></h2>
          <p class="sec-body">
            Cholan Arts has always believed that the purpose of art extends
            beyond the practitioner. Our community programmes reach thousands of
            lives each year - in schools, hospitals, correctional facilities,
            and rural Tamil Nadu villages where classical art was once entirely
            inaccessible.
          </p>
          <ul class="impact-list">
            <li>
              School partnership with 18 Chennai government schools - weekly
              dance and music classes taught by Cholan Arts faculty
            </li>
            <li>
              Digital archive project - preserving 500+ hours of rare classical
              performances and oral teaching traditions on film
            </li>
            <li>
              Senior citizens' programme - free Carnatic vocal sessions for
              individuals over 60, offered every Sunday
            </li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section
      class="testimonials-section"
      aria-labelledby="testimonials-title mb-0"
    >
      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="testimonials-header">
              <h2 id="testimonials-title" class="text-white">
                Customer Reviews
              </h2>
              <p class="text-white">
                Hear from devotees and collectors who have brought home a piece
                of living heritage.
              </p>
            </div>
            <div class="reviews-swiper swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <article class="review-card">
                    <div class="review-stars" aria-label="5 out of 5 stars">
                      ★★★★★
                    </div>
                    <p class="review-text">
                      The Lord Shiva murti I received is beyond words -
                      majestic, powerful, and deeply spiritual. The detailing is
                      exquisite, and it brings a divine presence.
                    </p>
                    <div class="reviewer">
                      <div class="reviewer-avatar" aria-hidden="true">P</div>
                      <div>
                        <div class="reviewer-name">Priyanka S.</div>
                        <div class="reviewer-loc">Chennai, India</div>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="review-card">
                    <div class="review-stars" aria-label="5 out of 5 stars">
                      ★★★★★
                    </div>
                    <p class="review-text">
                      The Nataraja I ordered arrived beautifully packaged and
                      exceeded all my expectations. The craftsmanship is
                      museum-quality.
                    </p>
                    <div class="reviewer">
                      <div class="reviewer-avatar" aria-hidden="true">R</div>
                      <div>
                        <div class="reviewer-name">Rajan M.</div>
                        <div class="reviewer-loc">Bengaluru, India</div>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="review-card">
                    <div class="review-stars" aria-label="5 out of 5 stars">
                      ★★★★★
                    </div>
                    <p class="review-text">
                      I gifted this Ganesha idol to my parents for their new
                      home. They were moved to tears by the beauty and quality.
                      Cholan Arts truly delivers divine artistry.
                    </p>
                    <div class="reviewer">
                      <div class="reviewer-avatar" aria-hidden="true">A</div>
                      <div>
                        <div class="reviewer-name">Ananya K.</div>
                        <div class="reviewer-loc">Mumbai, India</div>
                      </div>
                    </div>
                  </article>
                </div>
                <div class="swiper-slide">
                  <article class="review-card">
                    <div class="review-stars" aria-label="5 out of 5 stars">
                      ★★★★★
                    </div>
                    <p class="review-text">
                      Ordered the Lakshmi idol for Diwali. Fast shipping,
                      exquisite packaging, and the idol itself is simply
                      breathtaking. Customer service was warm and helpful
                      throughout.
                    </p>
                    <div class="reviewer">
                      <div class="reviewer-avatar" aria-hidden="true">S</div>
                      <div>
                        <div class="reviewer-name">Sunita V.</div>
                        <div class="reviewer-loc">Hyderabad, India</div>
                      </div>
                    </div>
                  </article>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ══ 13. CTA ═════════════════════════════════════════════════════ -->
    <section class="cta-banner" aria-labelledby="cta-title">
      <h2 id="cta-title">Indian Divine Idols</h2>
      <p>
        Cholan Arts is dedicated to preserving and celebrating the ancient
        tradition of handcrafted Hindu deity idols.
      </p>
      <a href="#" class="btn-orange-inv">
        Shop Now
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          viewBox="0 0 24 24"
          fill="none"
          stroke="#000"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path d="M20 12H4M15 7L20 12L15 17" />
        </svg>
      </a>
    </section>
@endsection