@extends('frontend.layouts.app')
@section('title','Gallery - Cholan Arts')
@section('content')
    <!-- HERO -->
    <section class="inner-banner">
      <span class="mb-3">Our Catalog</span>
      <h1>Moments of <em>Art & Grace</em></h1>
      <p>
        A visual journey through divine performances, sacred art forms,
        workshops, festivals, and cultural celebrations at Cholan Arts.
      </p>
    </section>

    <main>
      <!-- GALLERY -->
      <section class="gallery-section">
        <div class="section-label">Browse by Theme</div>
        <h2 class="section-title">Sacred Art, Captured Eternally</h2>

        <!-- TAB BAR -->
        <div class="tab-bar-outer">
          <div class="tab-bar" id="tabBar">
            <button class="tab-btn active" onclick="switchTab('all', this)">
              <span class="tab-emoji"></span> All Photos
              <span class="tab-count" id="tc-all">{{$totalProducts}}</span>
            </button>

            {{-- Dynamic Categories --}}
            @foreach($categories as $category)
                <button class="tab-btn" onclick="switchTab('{{ $category->name }}', this)">
                    <span class="tab-emoji"></span> {{ $category->name }}
                    <span class="tab-count" id="tc-{{ $category->name }}">{{$category->active_products_count}}</span>
                </button>
            @endforeach
          </div>
        </div>

        <!-- GRID -->
        <div class="masonry-grid" id="mainGrid"></div>

        <!-- PAGINATION -->
        <div class="pagination-wrap">
          <div class="page-info" id="pageInfo"></div>
          <button class="load-more-btn" id="loadMoreBtn" onclick="loadMore()">
            Load More Photos
            <span
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path d="M12 18.502V5.00195" />
                <path
                  d="M18 13.002C18 13.002 13.5811 19.0019 12 19.002C10.4188 19.002 6 13.002 6 13.002"
                />
              </svg>
            </span>
          </button>
          <div class="progress-bar-wrap">
            <div
              class="progress-bar-fill"
              id="progressFill"
              style="width: 0%"
            ></div>
          </div>
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
              <img src="{{ asset('assets/svg/headphones.svg') }}" alt="" width="50" />
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
              <img src="{{ asset('assets/svg/package.svg') }}" alt="" width="50" />
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
              <img src="{{ asset('assets/svg/Sucure.svg') }}" alt="" width="50" />
            </div>
            <div class="service-title">Gifting &amp; Corporate Orders</div>
            <p class="service-desc">
              Make every occasion special with our customized gifting and
              corporate solutions.
            </p>
          </div>
        </div>
      </section>
    </main>
@endsection
@push('scripts')
<script>
      const SIZES = [
        "portrait",
        "square",
        "tall",
        "portrait",
        "square",
        "wide",
        "tall",
        "square",
      ];

      function mk(seeds, titles, descs, cat) {
        return seeds.map((s, i) => ({
          seed: s,
          cat,
          title: titles[i] || `Photo ${i + 1}`,
          desc: descs[i] || "Cholan Arts",
          size: SIZES[i % SIZES.length],
        }));
      }

      const RAW = {
        ganesha: mk(
          [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
          [
            "Ganesha Vandhanam",
            "Vinayaka Chaturthi",
            "Obstacle Remover",
            "Ganesha Stuti",
            "Modhaka Offering",
            "First Worship",
            "Lambodara Kriti",
            "Ganapati Vandana",
            "Vighneshwara Puja",
            "Ekadanta Stotra",
            "Mushika Vahana",
            "Ganesha Homam",
          ],
          [
            "Bharatanatyam invocation - Annual Festival 2024",
            "Cultural celebration, Cholan Arts Campus",
            "Student recital series - March 2024",
            "Carnatic vocal performance, Music Hall",
            "Annual Puja Celebration 2023",
            "Arangetram opening sequence",
            "Veena solo composition recital",
            "Kuchipudi performance, Chennai",
            "Annual puja - September 2023",
            "Vocal ensemble, Music Academy",
            "Dance drama, Cholan Arts Stage",
            "Sacred fire ceremony, Campus",
          ],
          "ganesha",
        ),
        buddha: mk(
          [12, 22, 32, 42, 52, 62, 72, 82, 92, 102],
          [
            "Serene Contemplation",
            "Path of Dharma",
            "Lotus Awakening",
            "Bodhi Movements",
            "Compassion in Form",
            "The Enlightened Pose",
            "Nirvana Dance",
            "Dhamma Journey",
            "Still Waters",
            "Awakened Steps",
          ],
          [
            "Meditation & movement workshop",
            "Buddhist dance narrative performance",
            "Cultural exchange programme 2024",
            "Classical contemporary fusion workshop",
            "Guest performance - Natyashastra series",
            "Annual cultural symposium, 2023",
            "Interdisciplinary performance, 2024",
            "Cultural exchange, January 2024",
            "Contemplative dance series",
            "Journey of awakening recital",
          ],
          "buddha",
        ),
        workshops: mk(
          [15, 25, 35, 45, 55, 65, 75, 85, 95, 105],
          [
            "Abhinaya Intensive",
            "Rhythm Workshop",
            "Vocal Masterclass",
            "Bharatanatyam Basics",
            "Advanced Footwork",
            "Makeup & Costume",
            "Stage Presence",
            "Carnatic Theory",
            "Improvisation Lab",
            "Body Conditioning",
          ],
          [
            "Advanced expressive techniques - 3 days",
            "Tala & rhythm patterns for beginners",
            "Guru Raghavendra masterclass series",
            "Foundational course for new students",
            "Advanced nritta techniques workshop",
            "Traditional makeup artistry session",
            "Stage confidence & performance workshop",
            "Music theory for classical vocalists",
            "Creative improvisation workshop",
            "Physical training for classical dancers",
          ],
          "workshops",
        ),
      };

      RAW.all = Object.entries(RAW)
        .filter(([k]) => k !== "all")
        .flatMap(([, v]) => v)
        .sort((a, b) => ((a.seed * 7 + 3) % 13) - ((b.seed * 5 + 1) % 11));

      // Update count badges
      // Object.keys(RAW).forEach((k) => {
      //   const el = document.getElementById("tc-" + k);
      //   if (el) el.textContent = RAW[k].length;
      // });

      const PAGE_SIZE = 20;
      let activeCat = "all";
      let shownCount = 0;
      let lbItems = RAW.all;
      let lbIdx = 0;

      const CAT_LABELS = {
        ganesha: "Lord Ganesha",
        shiva: "Lord Shiva",
        buddha: "Buddha",
        krishna: "Lord Krishna",
        events: "Performances",
        workshops: "Workshops",
        festivals: "Festivals",
        all: "All",
      };

      function createCard(item, globalIdx) {
        const div = document.createElement("div");
        div.className = "gallery-item " + item.size;
        div.innerHTML = `
    <img src="https://picsum.photos/seed/${item.seed}/600/800" alt="${item.title}" loading="lazy" />
    <div class="gallery-overlay">
      <div class="overlay-content">
        <span class="oc-tag">${CAT_LABELS[item.cat] || item.cat}</span>
        <h4>${item.title}</h4>
        <p>${item.desc}</p>
      </div>
    </div>
    <div class="overlay-zoom">⊕</div>`;
        div.addEventListener("click", () => openLightbox(globalIdx));
        // Entrance animation
        const delay = (globalIdx % PAGE_SIZE) * 25;
        div.style.cssText = `opacity:0;transform:translateY(16px);`;
        setTimeout(() => {
          div.style.cssText = `opacity:1;transform:translateY(0);transition:opacity 0.38s ease,transform 0.38s ease;`;
        }, delay);
        return div;
      }

      function renderPage(cat, reset) {
        const grid = document.getElementById("mainGrid");
        const items = RAW[cat];
        if (reset) {
          grid.innerHTML = "";
          shownCount = 0;
          lbItems = items;
        }
        const batch = items.slice(shownCount, shownCount + PAGE_SIZE);
        batch.forEach((item, i) =>
          grid.appendChild(createCard(item, shownCount + i)),
        );
        shownCount += batch.length;
        updatePagination(cat);
      }

      function updatePagination(cat) {
        const total = RAW[cat].length;
        const pct = Math.round((shownCount / total) * 100);
        document.getElementById("progressFill").style.width = pct + "%";
        document.getElementById("pageInfo").innerHTML =
          `Showing <span>${shownCount}</span> of <span>${total}</span> photos`;
        const btn = document.getElementById("loadMoreBtn");
        if (shownCount >= total) {
          btn.innerHTML = "All Photos Loaded ✓";
          btn.disabled = true;
        } else {
          btn.innerHTML = `Load More Photos <span>↓</span>`;
          btn.disabled = false;
        }
      }

      function loadMore() {
        renderPage(activeCat, false);
      }

      function switchTab(cat, btn) {
        document
          .querySelectorAll(".tab-btn")
          .forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
        activeCat = cat;
        btn.scrollIntoView({
          behavior: "smooth",
          block: "nearest",
          inline: "center",
        });
        renderPage(cat, true);
        document
          .getElementById("mainGrid")
          .scrollIntoView({ behavior: "smooth", block: "start" });
      }

      function openLightbox(idx) {
        lbIdx = idx;
        showLb();
        document.getElementById("lightbox").classList.add("open");
        document.body.style.overflow = "hidden";
      }
      function showLb() {
        const it = lbItems[lbIdx];
        document.getElementById("lbImg").src =
          `https://picsum.photos/seed/${it.seed}/1000/750`;
        document.getElementById("lbTag").textContent =
          CAT_LABELS[it.cat] || it.cat;
        document.getElementById("lbTitle").textContent = it.title;
        document.getElementById("lbDesc").textContent = it.desc;
      }
      function closeLightboxBg(e) {
        if (e.target.id === "lightbox") closeLightboxBtn();
      }
      function closeLightboxBtn() {
        document.getElementById("lightbox").classList.remove("open");
        document.body.style.overflow = "";
      }
      function lbNav(dir) {
        lbIdx = (lbIdx + dir + lbItems.length) % lbItems.length;
        showLb();
      }
      document.addEventListener("keydown", (e) => {
        if (!document.getElementById("lightbox").classList.contains("open"))
          return;
        if (e.key === "ArrowLeft") lbNav(-1);
        if (e.key === "ArrowRight") lbNav(+1);
        if (e.key === "Escape") closeLightboxBtn();
      });

      [
        {
          seed: 14,
          title: "Kalai Vizha - Opening Night",
          cat: "Bharatanatyam",
          desc: "Music Academy, Chennai · June 2024",
        },
        {
          seed: 24,
          title: "Arangetram Grand Finale",
          cat: "Kuchipudi",
          desc: "Cholan Arts Auditorium · April 2024",
        },
        {
          seed: 34,
          title: "Guru Vandanam Concert",
          cat: "Carnatic Vocal",
          desc: "Teacher's Day · September 2023",
        },
        {
          seed: 44,
          title: "Nataraja Ensemble",
          cat: "Bharatanatyam",
          desc: "Annual Festival Night 2 · June 2024",
        },
        {
          seed: 54,
          title: "Mridangam Tala Night",
          cat: "Percussion",
          desc: "Recital Series · March 2024",
        },
      ].forEach((f) => {
        const c = document.createElement("div");
        c.className = "featured-card";
        c.innerHTML = `<img src="https://picsum.photos/seed/${f.seed}/600/450" alt="${f.title}" loading="lazy"/>
    <div class="featured-card-info"><div class="fc-tag">${f.cat}</div><h4>${f.title}</h4><p>${f.desc}</p></div>`;
        document.getElementById("featuredScroll").appendChild(c);
      });

      renderPage("all", true);
    </script>
@endpush