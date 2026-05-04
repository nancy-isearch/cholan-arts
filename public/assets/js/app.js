function toggleMobileDropdown(e) {
    e.preventDefault(); // Page redirect rok do
    const wrapper = document.querySelector('.mobile-dropdown');
    const menu = document.getElementById('mobileCategoryMenu');
    if (!wrapper || !menu) return;
    const isOpen = wrapper.classList.toggle('open');
    menu.classList.toggle('open', isOpen);
}



// ===== PRODUCTS SWIPER 1 =====
new Swiper("#deitySwiper", {
    slidesPerView: 1.2,
    spaceBetween: 24,
    loop: true,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,

    },
    speed: 600,
    pagination: {
        el: "#deitySwiper .swiper-pagination",
        clickable: true,
        dynamicBullets: true
    },
    breakpoints: {
        480: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        1024: {
            slidesPerView: 4
        },
    },
    a11y: {
        enabled: true
    },
});

// ===== PRODUCTS SWIPER 2 =====
// new Swiper("#moreIdolsSwiper", {
//     slidesPerView: 1,
//     spaceBetween: 24,
//     loop: true,
//     autoplay: {
//         delay: 4500,
//         disableOnInteraction: false,
//         pauseOnMouseEnter: true,
//     },
//     speed: 600,
//     pagination: {
//         el: "#moreIdolsSwiper .swiper-pagination",
//         clickable: true,
//     },
//     breakpoints: {
//         480: {
//             slidesPerView: 2
//         },
//         768: {
//             slidesPerView: 3
//         },
//         1024: {
//             slidesPerView: 4
//         },
//     },
// });

// ===== HAMBURGER — mobile nav open/close =====
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.getElementById('mobile-nav');

if (hamburger && mobileNav) {
    hamburger.addEventListener('click', function() {
        const isOpen = mobileNav.classList.toggle('open');
        hamburger.classList.toggle('open', isOpen);
        hamburger.setAttribute('aria-expanded', isOpen);
        document.body.style.overflow = isOpen ? "hidden" : "";

        // Jab mobile nav band ho to dropdown bhi band karo
        if (!isOpen) closeMobileDropdown();
    });
}

function closeMobileDropdown() {
    const wrapper = document.querySelector('.mobile-dropdown');
    const menu = document.getElementById('mobileCategoryMenu');
    if (wrapper) wrapper.classList.remove('open');
    if (menu) menu.classList.remove('open');
}

// ===== MOBILE NAV LINKS — click par mobile nav band karo =====
document.addEventListener('DOMContentLoaded', function() {
    // Mobile nav ke direct <a> links (Home, About Us, Products, Contact Us)
    document.querySelectorAll('#mobile-nav > a').forEach(function(link) {
        link.addEventListener('click', function() {
            mobileNav.classList.remove('open');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            closeMobileDropdown();
        });
    });

    // Mega menu ke andar category/collection links — click par sab band
    document.querySelectorAll('.mobile-mega-link').forEach(function(link) {
        link.addEventListener('click', function() {
            mobileNav.classList.remove('open');
            hamburger.classList.remove('open');
            hamburger.setAttribute('aria-expanded', 'false');
            closeMobileDropdown();
        });
    });
});

// ===== NAVBAR SCROLL SHADOW =====
const nav = document.querySelector("nav");
window.addEventListener(
    "scroll",
    () => {
        nav.style.boxShadow =
            window.scrollY > 10 ?
            "0 4px 20px rgba(0,0,0,0.12)" :
            "0 2px 16px rgba(0,0,0,0.08)";
    }, {
        passive: true
    },
);



const input = document.getElementById('searchInput');
const suggestions = document.getElementById('suggestions');
let timer;
input.addEventListener('keyup', function() {
    let query = this.value;

    if (query.length < 2) {
        suggestions.style.display = 'none';
        return;
    }
    clearTimeout(timer);

    timer = setTimeout(() => {
        fetch(`/search-suggest?q=${query}`)
        .then(res => res.json())
        .then(data => {
            suggestions.innerHTML = '';

            if (data.length === 0) {
                suggestions.style.display = 'none';
                return;
            }
            data.forEach(item => {
                let category = item.categories[0]; // first category

                let div = document.createElement('div');
                div.classList.add('suggestion-item');
                let imageUrl = item.feature_image ?
                    `uploads/products/${item.id}/${item.feature_image}` :
                    `assets/images/products-img/placeholder-product.jpg`;
                div.innerHTML = `
                    <img src="/${imageUrl}" />
                    <div class="suggestion-text">
                        <span>${item.name}</span>
                    </div>
                `;

                div.onclick = () => {
                    window.location.href = `/product/${item.slug}`;
                };

                suggestions.appendChild(div);
            });

            suggestions.style.display = 'block';
        });
    }, 300);
});

document.addEventListener('click', function(e) {
    const searchBox = document.querySelector('.search-bar');
    const suggestions = document.getElementById('suggestions');
    const input = document.getElementById('searchInput');

    if (!searchBox.contains(e.target)) {
        suggestions.style.display = 'none';
        input.value = '';
    }
});