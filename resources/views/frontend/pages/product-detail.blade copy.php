@extends('frontend.layouts.app')
@section('title','Lord Nataraja - Sacred Idols - Cholan Arts')

@section('content')
<section class="inner-banner">
    <span class="mb-3">Detail Page</span>
      <h1>Product Details</h1>
      <p>
        Whether you're a student, parent, art lover, or patron - reach out and
        our team will respond within 24 hours.
      </p>
    </section>
    <!-- BREADCRUMB -->
    <!-- <div class="breadcrumb-bar">
      <div class="breadcrumb-inner">
        <a href="#">Home</a>
        <span class="sep">›</span>
        <a href="#">Sacred Idols</a>
        <span class="sep">›</span>
        <span class="current">Lord Nataraja - Panchaloha Bronze</span>
      </div>
    </div> -->

    <!-- IDOL HERO -->
    <div class="idol-hero">
      <!-- LEFT: IMAGE GALLERY -->
      <div class="img-gallery-col reveal">
        <div class="main-img-wrap">
          <img
            id="mainImg"
            src="{{ asset('assets/images/products-img/Lord-Nataraja.png')}}"
            alt="Lord Nataraja Bronze Idol"
          />
          <div class="img-badge">
            <div class="ib-label">Craft Origin</div>
            <div class="ib-val">Swamimalai, Tamil Nadu</div>
          </div>
        </div>
        <div class="thumb-row">
          <div
            class="thumb active"
            onclick="
              changeImg(this, './/src/images/products-img/Lord-Nataraja.png')
            "
          >
            <img
              src="{{ asset('assets/images/products-img/Lord-Nataraja.png')}}"
              alt="View 1"
            />
          </div>
          <div
            class="thumb"
            onclick="
              changeImg(this, 'https://picsum.photos/seed/nataraja2/600/800')
            "
          >
            <img
              src="https://picsum.photos/seed/nataraja2/200/200"
              alt="View 2"
            />
          </div>
          <div
            class="thumb"
            onclick="
              changeImg(this, 'https://picsum.photos/seed/nataraja3/600/800')
            "
          >
            <img
              src="https://picsum.photos/seed/nataraja3/200/200"
              alt="View 3"
            />
          </div>
          <div
            class="thumb"
            onclick="
              changeImg(this, 'https://picsum.photos/seed/nataraja4/600/800')
            "
          >
            <img
              src="https://picsum.photos/seed/nataraja4/200/200"
              alt="View 4"
            />
          </div>
        </div>
      </div>

      <!-- RIGHT: DETAIL -->
      <div class="detail-col reveal" style="animation-delay: 0.1s">
        <div class="idol-category-tag">
          <span>🔱</span> Lord Shiva · Panchaloha Bronze
        </div>

        <h1 class="idol-name">Lord Nataraja</h1>
        <div class="idol-subtitle">The Cosmic Dancer - King of Dance</div>

        <div class="fancy-divider"><span>✦</span></div>

        <p class="idol-desc">
          Behold the <strong>divine Nataraja</strong> - Shiva as the Lord of the
          cosmic dance, performing his eternal Ananda Tandava within a ring of
          sacred fire. This masterwork is hand-crafted by fifth-generation
          artisans of <strong>Swamimalai</strong>, using the ancient lost-wax
          (<em>cire perdue</em>) process passed down through the Chola dynasty,
          certified under the Geographical Indication (GI) registry of Tamil
          Nadu.
        </p>

        <!-- SPECS -->
        <div class="specs-grid">
          <div class="spec-card">
            <div class="spec-label">Material</div>
            <div class="spec-value">
              <span class="sicon">⚱️</span> Panchaloha Bronze
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-label">Technique</div>
            <div class="spec-value">
              <span class="sicon">🔥</span> Lost-Wax (Cire Perdue)
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-label">Available Sizes</div>
            <div class="spec-value">
              <span class="sicon">📐</span> 6" · 12" · 18" · 24"
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-label">Finish</div>
            <div class="spec-value">
              <span class="sicon">✨</span> Antique / Polished Gold
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-label">GI Certified</div>
            <div class="spec-value">
              <span class="sicon">🏛️</span> Swamimalai Craft
            </div>
          </div>
          <div class="spec-card">
            <div class="spec-label">Delivery</div>
            <div class="spec-value">
              <span class="sicon">📦</span> Pan India · Worldwide
            </div>
          </div>
        </div>

        <!-- FEATURE TAGS -->
        <div class="feature-tags">
          <span class="ftag">🙏 Temple Grade</span>
          <span class="ftag">✋ Handcrafted</span>
          <span class="ftag">🧿 Pooja Ready</span>
          <span class="ftag">🌿 Eco Packaging</span>
          <span class="ftag">📜 Certificate of Authenticity</span>
          <span class="ftag">🔱 Custom Size Available</span>
        </div>

        <!-- CTA BUTTONS -->
        <div class="cta-group">
          <button class="btn-inquire" onclick="openModal()">
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path
                d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"
              />
            </svg>
            Enquire About This Idol
          </button>
          <button class="btn-whatsapp" onclick="openModal()">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"
              />
              <path
                d="M11.98 0C5.37 0 0 5.373 0 11.988c0 2.104.547 4.084 1.503 5.81L.057 23.882l6.305-1.654a11.955 11.955 0 0 0 5.618 1.404c6.609 0 11.98-5.372 11.98-11.987C23.96 5.373 18.588 0 11.98 0zm0 21.829a9.841 9.841 0 0 1-5.031-1.38l-.361-.214-3.741.981.997-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.265c0-5.448 4.433-9.882 9.881-9.882 5.448 0 9.882 4.434 9.882 9.882 0 5.449-4.434 9.9-9.882 9.9z"
              />
            </svg>
            WhatsApp Us
          </button>
          <button
            class="btn-wishlist"
            id="wishlistBtn"
            onclick="toggleWishlist()"
            title="Save to Wishlist"
          >
            🤍
          </button>
        </div>

        <!-- ASSURANCE ROW -->
        <div class="assurance-row">
          <div class="assurance-item">
            <span class="a-icon">🛡️</span>
            <div><strong>Authentic Craft</strong>GI Certified Swamimalai</div>
          </div>
          <div class="assurance-item">
            <span class="a-icon">📦</span>
            <div><strong>Safe Delivery</strong>Insured & Secure Packing</div>
          </div>
          <div class="assurance-item">
            <span class="a-icon">✏️</span>
            <div><strong>Custom Orders</strong>Size & Finish Options</div>
          </div>
        </div>
      </div>
    </div>

    <!-- DETAIL TABS -->
    <div class="detail-tabs-section">
      <div class="dtab-bar">
        <button class="dtab-btn active" onclick="switchDTab('about', this)">
          About This Idol
        </button>
        <button class="dtab-btn" onclick="switchDTab('symbolism', this)">
          Iconographic Symbolism
        </button>
        <button class="dtab-btn" onclick="switchDTab('custom', this)">
          Customisation
        </button>
        <button class="dtab-btn" onclick="switchDTab('care', this)">
          Care & Placement
        </button>
      </div>

      <!-- ABOUT -->
      <div class="dtab-panel active" id="tab-about">
        <div class="about-grid reveal">
          <div class="about-text">
            <h3>A Masterwork Born from Fire</h3>
            <p>
              The Nataraja is not merely a sculpture - it is a theological
              treatise rendered in metal. Conceived during the Chola dynasty
              (9th-13th century CE), this iconic form of Lord Shiva performing
              the Ananda Tandava remains the highest achievement of Indian
              classical bronze-casting.
            </p>
            <p>
              Each idol commissioned through Cholan Arts is handcrafted by
              <strong>hereditary artisans</strong> in Swamimalai, Tamil Nadu -
              the cradle of Panchaloha (five-metal alloy: gold, silver, copper,
              zinc, and iron) bronze casting. The process spans
              <strong>4 to 12 weeks</strong> depending on size and complexity.
            </p>
            <p>
              Our artisans follow the canonical proportions laid out in the
              <em>Agama Shastra</em> and <em>Manasollasa</em>, ensuring that
              every idol carries not just artistic but spiritual sanctity. Each
              piece is accompanied by a hand-signed
              <strong>Certificate of Authenticity</strong>.
            </p>
          </div>
          <div class="about-img">
            <img
              src="{{ asset('assets/images/products-img/Lord-Nataraja-2.png')}}"
              alt="Swamimalai artisan at work"
            />
          </div>
        </div>
      </div>

      <!-- SYMBOLISM -->
      <div class="dtab-panel" id="tab-symbolism">
        <div class="symbol-list reveal">
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🔥</div>
            <div>
              <h4>The Ring of Fire - Prabhamandala</h4>
              <p>
                The flaming aureole that surrounds Nataraja represents the
                cyclical universe - the cosmic fire of creation and dissolution.
                It symbolises the endless cycle of samsara (birth, death,
                rebirth) and the eternal nature of time itself.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🥁</div>
            <div>
              <h4>The Damaru - Drum of Creation</h4>
              <p>
                The hourglass-shaped drum held in the upper right hand is the
                source of primordial sound - the vibration from which the
                universe was born. The Damaru's rhythm is the heartbeat of
                creation, the first note of existence.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🌊</div>
            <div>
              <h4>The Raised Flame - Agni</h4>
              <p>
                The flame held in the upper left hand represents the destructive
                aspect of Shiva - yet it is a compassionate destruction that
                clears the way for new creation. Fire purifies; fire transforms;
                fire liberates.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🦶</div>
            <div>
              <h4>The Trampled Dwarf - Apasmara</h4>
              <p>
                The figure beneath Nataraja's dancing foot is Apasmara, the
                demon of ignorance and forgetfulness. Shiva's eternal dance
                crushes human ego, spiritual blindness, and the illusion of a
                separate self - offering liberation.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🌙</div>
            <div>
              <h4>The Raised Foot - Abhaya Mudra</h4>
              <p>
                The gesture of the lower right hand offers fearlessness and
                divine protection to all devotees. The raised left foot,
                pointing heavenward, indicates the liberation of the soul -
                moksha - the ultimate promise of the dance.
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- CUSTOMISATION -->
      <div class="dtab-panel" id="tab-custom">
        <p class="custom-intro reveal">
          Every Cholan Arts idol can be personalised to your precise
          requirements. Whether for your home puja room, temple, or as a sacred
          gift - we work closely with master artisans to fulfil your vision with
          devotion and precision.
        </p>
        <div class="custom-grid reveal">
          <div class="custom-card">
            <span class="cc-icon">📐</span>
            <h4>Size Selection</h4>
            <p>
              Available in 6", 9", 12", 18", 24" and up to life-size for temple
              installations on special commission.
            </p>
          </div>
          <div class="custom-card">
            <span class="cc-icon">✨</span>
            <h4>Finish & Patina</h4>
            <p>
              Choose from antique dark bronze, polished bright gold,
              silver-plated, or dual-tone gold-and-dark finishes.
            </p>
          </div>
          <div class="custom-card">
            <span class="cc-icon">⚱️</span>
            <h4>Material Options</h4>
            <p>
              Panchaloha (traditional five-metal), pure copper, brass, or silver
              alloy - each carrying distinct vibrational properties.
            </p>
          </div>
          <div class="custom-card">
            <span class="cc-icon">🛕</span>
            <h4>Temple Commissions</h4>
            <p>
              Full temple idol sets, processional idols (utsava murthis), and
              altar pieces crafted to Agamic specifications.
            </p>
          </div>
          <div class="custom-card">
            <span class="cc-icon">🎁</span>
            <h4>Gift Packaging</h4>
            <p>
              Bespoke wooden gift boxes with velvet lining, Sanskrit blessing
              scrolls, and personalised dedication plates.
            </p>
          </div>
          <div class="custom-card">
            <span class="cc-icon">✍️</span>
            <h4>Inscriptions</h4>
            <p>
              Custom Sanskrit slokas, names, or dates can be engraved on the
              base platform of your idol.
            </p>
          </div>
        </div>
        <div style="text-align: center">
          <button
            class="btn-inquire"
            style="display: inline-flex; max-width: 320px"
            onclick="openModal()"
          >
            Discuss Custom Requirements →
          </button>
        </div>
      </div>

      <!-- CARE -->
      <div class="dtab-panel" id="tab-care">
        <div class="symbol-list reveal">
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🏛️</div>
            <div>
              <h4>Ideal Placement</h4>
              <p>
                Place the idol on a clean, elevated platform facing East or
                North-East. The puja room should be well-ventilated. Avoid
                placing idols on the floor or in bathrooms. The base should be
                stable to prevent accidental damage.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🧴</div>
            <div>
              <h4>Cleaning & Polishing</h4>
              <p>
                Wipe with a soft, dry cotton cloth regularly. For deeper
                cleaning, use a mild tamarind paste or lemon juice diluted with
                water - a traditional method used in South Indian temples. Avoid
                harsh chemical cleaners. Polish annually with coconut oil for a
                natural sheen.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">🌿</div>
            <div>
              <h4>Abhishekam (Sacred Bath)</h4>
              <p>
                Panchaloha idols are ideal for abhishekam with panchamrita
                (milk, curd, honey, ghee, and sugar) or pure water with
                sandalwood. Dry thoroughly after each abhishekam to prevent
                long-term oxidation and maintain the luster of the metal.
              </p>
            </div>
          </div>
          <div class="symbol-item">
            <div class="symbol-icon-wrap">📦</div>
            <div>
              <h4>Storage & Transport</h4>
              <p>
                Wrap in pure cotton cloth (never synthetic materials) for
                long-term storage. Store in a cool, dry place away from direct
                sunlight. When transporting, use the original packaging or pad
                with natural materials to prevent surface scratches.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== Our Related Idols ===== -->
    <section class="products-section" aria-labelledby="deity-idols-title">
      <div class="swiper-nav-row">
        <h2 class="section-title" id="deity-idols-title">Our Related Idols</h2>
        <a href="#" class="explore-link" aria-label="Explore all deity idols">
          Explore All
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            viewBox="0 0 24 24"
            fill="none"
            stroke="#385632"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M20 12H4M15 7L20 12L15 17" />
          </svg>
        </a>
      </div>
      <div class="products-swiper swiper" id="deitySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-1.jpg')}}"
                  alt="Relaxing Ganesh handcrafted wooden idol"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Relaxing Ganesh (Plain)</h3>
                <p class="product-card-desc">
                  Bring a sense of calm and joy to your space with this unique
                  Relaxing Ganesh idol, handmade in wood with a natural finish.
                </p>
              </div>
            </article>
          </div>
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-2.jpg')}}"
                  alt="Lord Shiva bronze handcrafted idol"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Lord Shiva (Bronze)</h3>
                <p class="product-card-desc">
                  An exquisite handcrafted bronze idol of Lord Shiva, embodying
                  divine power and grace through centuries-old artisan
                  tradition.
                </p>
              </div>
            </article>
          </div>
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-3.jpg')}}"
                  alt="Nataraja dancing Shiva bronze sculpture"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Nataraja Dancing Shiva</h3>
                <p class="product-card-desc">
                  The cosmic dance of Lord Shiva captured in a masterfully
                  crafted bronze sculpture using the ancient lost-wax technique.
                </p>
              </div>
            </article>
          </div>
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-4.jpg')}}"
                  alt="Goddess Lakshmi handcrafted idol"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Goddess Lakshmi</h3>
                <p class="product-card-desc">
                  Invite prosperity and abundance into your home with this
                  beautiful Lakshmi idol, an epitome of divine feminine grace.
                </p>
              </div>
            </article>
          </div>
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-1.jpg')}}"
                  alt="Lord Krishna playing flute bronze idol"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Krishna with Flute</h3>
                <p class="product-card-desc">
                  A serene depiction of Lord Krishna playing his divine flute,
                  cast in fine bronze with intricate Chola-era detailing.
                </p>
              </div>
            </article>
          </div>
          <div class="swiper-slide">
            <article class="product-card">
              <div class="product-card-img">
                <img
                  src="{{ asset('assets/images/products-img/product-3.jpg')}}"
                  alt="Lord Murugan handcrafted bronze idol"
                  loading="lazy"
                  width="600"
                  height="300"
                />
              </div>
              <div class="product-card-body">
                <h3 class="product-card-title">Lord Murugan (Antique)</h3>
                <p class="product-card-desc">
                  The divine commander of the celestial army, beautifully
                  rendered in aged-bronze finish with exceptional craftsmanship.
                </p>
              </div>
            </article>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- ===== CTA BANNER ===== -->
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

      <!-- ===== SERVICE STRIP ===== -->
      <section class="service-strip" aria-label="Our services">
        <div class="service-grid">
          <div class="service-item">
            <div class="service-icon">
              <!-- HugeIcons: Call stroke-rounded -->
              <img src="{{ asset('assets/svg/headphones.svg')}}" alt="" width="50"/>
            </div>
            <div class="service-title">Reach out to us</div>
            <p class="service-desc">
              Our dedicated support team is here to assist you. Reach out
              anytime for prompt and friendly help.
            </p>
          </div>
          <div class="service-item">
            <div class="service-icon">
              <!-- HugeIcons: Exchange 01 stroke-rounded -->
              <img src="{{ asset('assets/svg/package.svg')}}" alt="" width="50" />
            </div>
            <div class="service-title">Easy Exchanges & Returns</div>
            <p class="service-desc">
              Hassle-free returns and easy exchanges for a worry-free shopping
              experience.
            </p>
          </div>
          <div class="service-item">
            <div class="service-icon">
              <!-- HugeIcons: Gift stroke-rounded -->
              <img src="{{ asset('assets/svg/Sucure.svg')}}" alt="" width="50" />
            </div>
            <div class="service-title">Gifting &amp; Corporate Orders</div>
            <p class="service-desc">
              Make every occasion special with our customized gifting and
              corporate solutions.
            </p>
          </div>
        </div>
      </section>
<!-- INQUIRY MODAL -->
    <div class="modal-overlay" id="inquiryModal" onclick="closeModalBg(event)">
      <div class="modal-box">
        <div class="modal-header">
          <h3>Request More Information</h3>
          <p>
            Our artisan consultants will personally respond within 24 hours.
          </p>
          <button class="modal-close" onclick="closeModal()">✕</button>
        </div>
        <div class="modal-idol-strip">
          <img
            src="https://picsum.photos/seed/nataraja/200/200"
            alt="Lord Nataraja"
          />
          <div>
            <div class="mis-name">Lord Nataraja - Panchaloha Bronze</div>
            <div class="mis-sub">
              Swamimalai GI Certified · Custom Sizes Available
            </div>
          </div>
        </div>
        <div id="modalFormWrap">
          <div class="modal-form">
            <div class="mf-row">
              <div class="mf-group">
                <label>Full Name <span>*</span></label>
                <input type="text" id="mfName" placeholder="Your full name" />
              </div>
              <div class="mf-group">
                <label>Phone Number <span>*</span></label>
                <input type="tel" id="mfPhone" placeholder="+91 00000 00000" />
              </div>
            </div>
            <div class="mf-row">
              <div class="mf-group">
                <label>Email Address</label>
                <input type="email" id="mfEmail" placeholder="your@email.com" />
              </div>
              <div class="mf-group">
                <label>Preferred Size</label>
                <select id="mfSize">
                  <option value="" disabled selected>Select size</option>
                  <option>6 inches</option>
                  <option>9 inches</option>
                  <option>12 inches</option>
                  <option>18 inches</option>
                  <option>24 inches</option>
                  <option>Custom / Temple Size</option>
                </select>
              </div>
            </div>
            <div class="mf-row">
              <div class="mf-group">
                <label>Purpose</label>
                <select id="mfPurpose">
                  <option value="" disabled selected>Select purpose</option>
                  <option>Home Puja Room</option>
                  <option>Temple Installation</option>
                  <option>Gift / Gifting</option>
                  <option>Office / Studio</option>
                  <option>Art Collection</option>
                </select>
              </div>
              <div class="mf-group">
                <label>Preferred Finish</label>
                <select id="mfFinish">
                  <option value="" disabled selected>Select finish</option>
                  <option>Antique Dark Bronze</option>
                  <option>Polished Gold</option>
                  <option>Silver-Plated</option>
                  <option>Dual-Tone</option>
                  <option>Not Sure - Advise Me</option>
                </select>
              </div>
            </div>
            <div class="mf-row" style="grid-template-columns: 1fr">
              <div class="mf-group full">
                <label>Message / Special Requirements</label>
                <textarea
                  id="mfMsg"
                  placeholder="Tell us about your requirements, customisation needs, delivery location, or any questions…"
                ></textarea>
              </div>
            </div>
            <button class="btn-submit-modal" onclick="submitInquiry()">
              <svg
                width="16"
                height="16"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <line x1="22" y1="2" x2="11" y2="13" />
                <polygon points="22 2 15 22 11 13 2 9 22 2" />
              </svg>
              Send Enquiry
            </button>
            <p class="modal-note">
              🔒 Your details are private and will only be shared with our
              artisan team.
            </p>
          </div>
        </div>
        <div class="modal-success" id="modalSuccess">
          <div class="success-check">✓</div>
          <h4>Enquiry Sent!</h4>
          <p>
            Thank you for your interest in Lord Nataraja. Our artisan consultant
            will contact you within 24 hours with detailed information and
            photographs.
          </p>
        </div>
      </div>
    </div>
@endsection
@push('scripts')
    <script>
      // ── Image Gallery ────────────────────
      function changeImg(thumb, src) {
        document.getElementById("mainImg").src = src;
        document
          .querySelectorAll(".thumb")
          .forEach((t) => t.classList.remove("active"));
        thumb.classList.add("active");
      }

      // ── Detail Tabs ──────────────────────
      function switchDTab(id, btn) {
        document
          .querySelectorAll(".dtab-panel")
          .forEach((p) => p.classList.remove("active"));
        document
          .querySelectorAll(".dtab-btn")
          .forEach((b) => b.classList.remove("active"));
        document.getElementById("tab-" + id).classList.add("active");
        btn.classList.add("active");
      }

      // ── Wishlist ─────────────────────────
      function toggleWishlist() {
        const btn = document.getElementById("wishlistBtn");
        btn.classList.toggle("liked");
        btn.textContent = btn.classList.contains("liked") ? "❤️" : "🤍";
      }

      // ── Modal ────────────────────────────
      function openModal() {
        document.getElementById("inquiryModal").classList.add("open");
        document.body.style.overflow = "hidden";
      }
      function closeModal() {
        document.getElementById("inquiryModal").classList.remove("open");
        document.body.style.overflow = "";
      }
      function closeModalBg(e) {
        if (e.target.id === "inquiryModal") closeModal();
      }
      function submitInquiry() {
        const name = document.getElementById("mfName").value.trim();
        const phone = document.getElementById("mfPhone").value.trim();
        if (!name || !phone) {
          alert("Please enter your Name and Phone Number.");
          return;
        }
        document.getElementById("modalFormWrap").style.display = "none";
        document.getElementById("modalSuccess").style.display = "block";
      }
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeModal();
      });

      // ── Scroll Reveal ────────────────────
      const revealEls = document.querySelectorAll(".reveal");
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("visible");
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.1 },
      );
      revealEls.forEach((el) => observer.observe(el));
    </script>
    <script>
      // ===== PRODUCTS SWIPER 1 =====
      new Swiper("#deitySwiper", {
        slidesPerView: 1,
        spaceBetween: 24,
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
          pauseOnMouseEnter: true,
        },
        speed: 600,
        pagination: { el: "#deitySwiper .swiper-pagination", clickable: true },
        breakpoints: {
          480: { slidesPerView: 2 },
          768: { slidesPerView: 3 },
          1024: { slidesPerView: 4 },
        },
        a11y: { enabled: true },
      });
    </script>
@endpush