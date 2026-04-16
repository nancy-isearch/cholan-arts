<!-- ===== FOOTER ===== -->
    <footer role="contentinfo">
      <div class="footer-grid">
        <div>
          <img
            src="{{ asset('assets/svg/brand-logo.png') }}"
            alt="Relaxing Ganesh handcrafted wooden idol"
            loading="lazy"
            width="150"
          />
          <p class="footer-about">
            At Cholan Arts, we are devoted to preserving India's timeless
            heritage through masterfully crafted bronze sculptures. Each piece
            is a tribute to the sacred Lost Wax Tradition - a magnificent art
            form that flourished under the Chola Dynasty, capturing the divine
            essence of Indian spirituality.
          </p>
        </div>
        <div>
          <div class="footer-col-title">Policies</div>
          <div class="footer-links" aria-label="Policy links">
            {{-- <a href="#">Shipping Policy</a>
            <a href="#">Refund &amp; Return Policy</a>
            <a href="/terms-of-use">Terms of Use</a>
            <a href="/privacy-policy">Privacy Policy</a> --}}
             @foreach($pages as $p)
              <a href="{{ route('page.show', $p->slug) }}">
                  {{ ucfirst($p->title) }}
              </a>
            @endforeach
          </div>
        </div>
        <div class="footer-contact">
          <div class="footer-col-title">Customer Care</div>
          <p>
            <a href="tel:+919944964110">+91 9944 964 110</a>
          </p>
          <p>
            <a href="mailto:support@cholanarts.com">support@cholanarts.com</a>
          </p>
          <p>Working hours<br />Mon - Sun: 10 AM - 7 PM</p>
        </div>
        <div>
          <div class="footer-col-title">Social Media</div>
          <div class="social-icons">
            <a
              href="https://www.instagram.com/cholanartsemporium/"
              class="social-btn"
              aria-label="Follow Cholan Arts on Instagram"
            >
              <!-- HugeIcons: Instagram stroke-rounded -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="#141B34"
                stroke-width="1.5"
                stroke-linejoin="round"
              >
                <path
                  d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z"
                />
                <path
                  d="M16.5 12C16.5 14.4853 14.4853 16.5 12 16.5C9.51472 16.5 7.5 14.4853 7.5 12C7.5 9.51472 9.51472 7.5 12 7.5C14.4853 7.5 16.5 9.51472 16.5 12Z"
                />
                <path d="M17.5078 6.5L17.4988 6.5" />
              </svg>
            </a>
            <a
              href="https://www.facebook.com/Cholanartsemporium/"
              class="social-btn"
              aria-label="Follow Cholan Arts on Facebook"
            >
              <!-- HugeIcons: Facebook 01 stroke-rounded -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linejoin="round"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M6.18182 10.3333C5.20406 10.3333 5 10.5252 5 11.4444V13.1111C5 14.0304 5.20406 14.2222 6.18182 14.2222H8.54545V20.8889C8.54545 21.8081 8.74951 22 9.72727 22H12.0909C13.0687 22 13.2727 21.8081 13.2727 20.8889V14.2222H15.9267C16.6683 14.2222 16.8594 14.0867 17.0631 13.4164L17.5696 11.7497C17.9185 10.6014 17.7035 10.3333 16.4332 10.3333H13.2727V7.55556C13.2727 6.94191 13.8018 6.44444 14.4545 6.44444H17.8182C18.7959 6.44444 19 6.25259 19 5.33333V3.11111C19 2.19185 18.7959 2 17.8182 2H14.4545C11.191 2 8.54545 4.48731 8.54545 7.55556V10.3333H6.18182Z"
                />
              </svg>
            </a>
            <a
              href="https://www.youtube.com/"
              class="social-btn"
              aria-label="Follow Cholan Arts on YouTube"
            >
              <!-- HugeIcons: Youtube stroke-rounded -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
              >
                <path
                  d="M12 20.5C13.8097 20.5 15.5451 20.3212 17.1534 19.9934C19.1623 19.5839 20.1668 19.3791 21.0834 18.2006C22 17.0221 22 15.6693 22 12.9635V11.0365C22 8.33073 22 6.97787 21.0834 5.79937C20.1668 4.62088 19.1623 4.41613 17.1534 4.00662C15.5451 3.67877 13.8097 3.5 12 3.5C10.1903 3.5 8.45489 3.67877 6.84656 4.00662C4.83766 4.41613 3.83321 4.62088 2.9166 5.79937C2 6.97787 2 8.33073 2 11.0365V12.9635C2 15.6693 2 17.0221 2.9166 18.2006C3.83321 19.3791 4.83766 19.5839 6.84656 19.9934C8.45489 20.3212 10.1903 20.5 12 20.5Z"
                />
                <path
                  d="M15.9621 12.3129C15.8137 12.9187 15.0241 13.3538 13.4449 14.2241C11.7272 15.1705 10.8684 15.6438 10.1728 15.4615C9.9372 15.3997 9.7202 15.2911 9.53799 15.1438C9 14.7089 9 13.8059 9 12C9 10.1941 9 9.29112 9.53799 8.85618C9.7202 8.70886 9.9372 8.60029 10.1728 8.53854C10.8684 8.35621 11.7272 8.82945 13.4449 9.77593C15.0241 10.6462 15.8137 11.0813 15.9621 11.6871C16.0126 11.8933 16.0126 12.1067 15.9621 12.3129Z"
                />
              </svg>
            </a>
            <a
              href="https://www.whatsapp.com/"
              class="social-btn"
              aria-label="Follow Cholan Arts on WhatsApp"
            >
              <!-- HugeIcons: Whatsapp stroke-rounded -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                width="24"
                height="24"
                color="currentColor"
                fill="none"
                stroke="#141B34"
                stroke-width="1.5"
                stroke-linejoin="round"
              >
                <path
                  d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 13.3789 2.27907 14.6926 2.78382 15.8877C3.06278 16.5481 3.20226 16.8784 3.21953 17.128C3.2368 17.3776 3.16334 17.6521 3.01642 18.2012L2 22L5.79877 20.9836C6.34788 20.8367 6.62244 20.7632 6.87202 20.7805C7.12161 20.7977 7.45185 20.9372 8.11235 21.2162C9.30745 21.7209 10.6211 22 12 22Z"
                />
                <path
                  d="M8.58815 12.3773L9.45909 11.2956C9.82616 10.8397 10.2799 10.4153 10.3155 9.80826C10.3244 9.65494 10.2166 8.96657 10.0008 7.58986C9.91601 7.04881 9.41086 7 8.97332 7C8.40314 7 8.11805 7 7.83495 7.12931C7.47714 7.29275 7.10979 7.75231 7.02917 8.13733C6.96539 8.44196 7.01279 8.65187 7.10759 9.07169C7.51023 10.8548 8.45481 12.6158 9.91948 14.0805C11.3842 15.5452 13.1452 16.4898 14.9283 16.8924C15.3481 16.9872 15.558 17.0346 15.8627 16.9708C16.2477 16.8902 16.7072 16.5229 16.8707 16.165C17 15.8819 17 15.5969 17 15.0267C17 14.5891 16.9512 14.084 16.4101 13.9992C15.0334 13.7834 14.3451 13.6756 14.1917 13.6845C13.5847 13.7201 13.1603 14.1738 12.7044 14.5409L11.6227 15.4118"
                />
              </svg>
            </a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2026 Cholan Arts Emporium. All rights reserved</span>
        <div class="footer-bottom-links" aria-label="Legal links">
          <a href="/privacy-policy">Privacy Policy</a>
          <a href="/terms-of-use">Terms of Use</a>
          <a href="#">Sitemap</a>
        </div>
      </div>
    </footer>