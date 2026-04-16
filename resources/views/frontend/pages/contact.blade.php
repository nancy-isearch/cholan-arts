@extends('frontend.layouts.app')
@section('title','Contact Us - Cholan Arts')
@section('content')
    <!-- BREADCRUMB -->
    <div class="breadcrumb-wrap">
      <div class="container">
        <ul class="breadcrumb">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="active">Contact Us</li>
        </ul>
      </div>
    </div>
    <!-- HERO -->
    <section @class(['inner-banner'])>
      <span @class(['mb-3'])>Get in Touch</span>
      <h1>We'd Love to Hear<br><em>From You</em></h1>
      <p>Whether you're a student, parent, art lover, or patron - reach out and our team will respond within 24 hours.</p>
    </section>
    <!-- MAIN BODY -->
    <div @class(['contact-body'])>
      <div @class(['contact-grid', 'container'])>

        <!-- LEFT: INFO -->
        <div @class(['info-side'])>
          <h2>Reach Out, Begin Your Journey</h2>
          <p>Our doors are always open for those who seek to connect with classical art. Come visit us, send a message, or simply call - we are here.</p>

          <div @class(['info-cards'])>
            <div @class(['info-card'])>
              <div @class(['info-card-icon'])><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5">
        <path d="M13.6177 21.367C13.1841 21.773 12.6044 22 12.0011 22C11.3978 22 10.8182 21.773 10.3845 21.367C6.41302 17.626 1.09076 13.4469 3.68627 7.37966C5.08963 4.09916 8.45834 2 12.0011 2C15.5439 2 18.9126 4.09916 20.316 7.37966C22.9082 13.4393 17.599 17.6389 13.6177 21.367Z" />
        <path d="M15.5 11C15.5 12.933 13.933 14.5 12 14.5C10.067 14.5 8.5 12.933 8.5 11C8.5 9.067 10.067 7.5 12 7.5C13.933 7.5 15.5 9.067 15.5 11Z" />
    </svg></div>
              <div @class(['info-card-body'])>
                <strong>Address</strong>
                <p>42, Thiruvalluvar Salai, T. Nagar,<br>Chennai - 600 017, Tamil Nadu</p>
              </div>
            </div>
            <div @class(['info-card'])>
              <div @class(['info-card-icon'])><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="#141B34" stroke-width="1.5" stroke-linecap="round">
        <path d="M9.1585 5.71217L8.75584 4.80619C8.49256 4.21382 8.36092 3.91762 8.16405 3.69095C7.91732 3.40688 7.59571 3.19788 7.23592 3.08779C6.94883 2.99994 6.6247 2.99994 5.97645 2.99994C5.02815 2.99994 4.554 2.99994 4.15597 3.18223C3.68711 3.39696 3.26368 3.86322 3.09497 4.35054C2.95175 4.76423 2.99278 5.18937 3.07482 6.03964C3.94815 15.0901 8.91006 20.052 17.9605 20.9254C18.8108 21.0074 19.236 21.0484 19.6496 20.9052C20.137 20.7365 20.6032 20.3131 20.818 19.8442C21.0002 19.4462 21.0002 18.972 21.0002 18.0237C21.0002 17.3755 21.0002 17.0514 20.9124 16.7643C20.8023 16.4045 20.5933 16.0829 20.3092 15.8361C20.0826 15.6393 19.7864 15.5076 19.194 15.2443L18.288 14.8417C17.6465 14.5566 17.3257 14.414 16.9998 14.383C16.6878 14.3533 16.3733 14.3971 16.0813 14.5108C15.7762 14.6296 15.5066 14.8543 14.9672 15.3038C14.4304 15.7511 14.162 15.9748 13.834 16.0946C13.5432 16.2009 13.1588 16.2402 12.8526 16.1951C12.5071 16.1442 12.2426 16.0028 11.7135 15.7201C10.0675 14.8404 9.15977 13.9327 8.28011 12.2867C7.99738 11.7576 7.85602 11.4931 7.80511 11.1476C7.75998 10.8414 7.79932 10.457 7.90554 10.1662C8.02536 9.83822 8.24905 9.5698 8.69643 9.03294C9.14586 8.49362 9.37058 8.22396 9.48939 7.91885C9.60309 7.62688 9.64686 7.31234 9.61719 7.00042C9.58618 6.67446 9.44362 6.3537 9.1585 5.71217Z" />
    </svg></div>
              <div @class(['info-card-body'])>
                <strong>Phone</strong>
                <p><a href="tel:+914442123456">+91 44 4212 3456</a></p>
              </div>
            </div>
            <div @class(['info-card'])>
              <div @class(['info-card-icon'])><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
        <path d="M2 6L8.91302 9.91697C11.4616 11.361 12.5384 11.361 15.087 9.91697L22 6" />
        <path d="M2.01577 13.4756C2.08114 16.5412 2.11383 18.0739 3.24496 19.2094C4.37608 20.3448 5.95033 20.3843 9.09883 20.4634C11.0393 20.5122 12.9607 20.5122 14.9012 20.4634C18.0497 20.3843 19.6239 20.3448 20.7551 19.2094C21.8862 18.0739 21.9189 16.5412 21.9842 13.4756C22.0053 12.4899 22.0053 11.5101 21.9842 10.5244C21.9189 7.45886 21.8862 5.92609 20.7551 4.79066C19.6239 3.65523 18.0497 3.61568 14.9012 3.53657C12.9607 3.48781 11.0393 3.48781 9.09882 3.53656C5.95033 3.61566 4.37608 3.65521 3.24495 4.79065C2.11382 5.92608 2.08114 7.45885 2.01576 10.5244C1.99474 11.5101 1.99475 12.4899 2.01577 13.4756Z" />
    </svg></div>
              <div @class(['info-card-body'])>
                <strong>Email</strong>
                <p><a href="mailto:info@cholanarts.com">info@cholanarts.com</a></p>
              </div>
            </div>
            <div @class(['info-card'])>
              <div @class(['info-card-icon'])><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M8.76938 2.5C8.4973 2.59728 8.23058 2.70543 7.96979 2.8239M5.42501 4.46566C5.19851 4.66428 4.98106 4.87255 4.77334 5.08979M3.03178 7.56476C2.84599 7.93804 2.68313 8.32421 2.54498 8.72152M2.01608 11.3914C1.99387 11.7808 1.99471 12.1778 2.01835 12.5673M2.56845 15.2658C2.70147 15.6396 2.85641 16.0035 3.03178 16.3558M4.69086 18.7435C4.93508 19.005 5.19323 19.2539 5.46415 19.4891M7.77635 21.0064C8.17073 21.1954 8.57927 21.3606 9 21.5" />
        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2" />
        <path d="M12 13.5C12.8284 13.5 13.5 12.8284 13.5 12C13.5 11.1716 12.8284 10.5 12 10.5M12 13.5C11.1716 13.5 10.5 12.8284 10.5 12C10.5 11.1716 11.1716 10.5 12 10.5M12 13.5V16M12 10.5V6" />
    </svg></div>
              <div @class(['info-card-body'])>
                <strong>Office Hours</strong>
                <p>Mon - Sat: 9:00 AM - 7:00 PM<br>Sunday: 10:00 AM - 2:00 PM</p>
              </div>
            </div>
          </div>

          <div @class(['social-row'])>
            <a href="https://www.instagram.com/cholanartsemporium/" @class(['social-btn']) title="Instagram">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <a href="https://www.facebook.com/Cholanartsemporium/" @class(['social-btn']) title="Facebook">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <a href="https://www.youtube.com/" @class(['social-btn']) title="YouTube">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.97C18.88 4 12 4 12 4s-6.88 0-8.59.45A2.78 2.78 0 0 0 1.46 6.42 29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58 2.78 2.78 0 0 0 1.95 1.97C5.12 20 12 20 12 20s6.88 0 8.59-.45a2.78 2.78 0 0 0 1.95-1.97A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg>
            </a>
          </div>

          <div @class(['map-card'])>
            <div @class(['map-card-overlay'])>
              <span @class(['map-icon'])><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
        <path d="M5.25345 4.19584L4.02558 4.90813C3.03739 5.48137 2.54329 5.768 2.27164 6.24483C2 6.72165 2 7.30233 2 8.46368V16.6283C2 18.1542 2 18.9172 2.34226 19.3418C2.57001 19.6244 2.88916 19.8143 3.242 19.8773C3.77226 19.9719 4.42148 19.5953 5.71987 18.8421C6.60156 18.3306 7.45011 17.7994 8.50487 17.9435C8.98466 18.009 9.44231 18.2366 10.3576 18.6917L14.1715 20.588C14.9964 20.9982 15.004 21 15.9214 21H18C19.8856 21 20.8284 21 21.4142 20.4013C22 19.8026 22 18.8389 22 16.9117V10.1715C22 8.24423 22 7.2806 21.4142 6.68188C20.8284 6.08316 19.8856 6.08316 18 6.08316H15.9214C15.004 6.08316 14.9964 6.08139 14.1715 5.6712L10.8399 4.01463C9.44884 3.32297 8.75332 2.97714 8.01238 3.00117C7.27143 3.02521 6.59877 3.41542 5.25345 4.19584Z" />
        <path d="M15 6.5V20.5" stroke-dasharray="1 3" />
        <path d="M8 3.5V17.5" stroke-dasharray="1 3" />
    </svg></span>
              <p>42, Thiruvalluvar Salai, T. Nagar<br>Chennai, Tamil Nadu</p>
              <a href="https://maps.google.com" target="_blank">Open in Google Maps →</a>
            </div>
          </div>
        </div>

        <!-- RIGHT: FORM -->
        <div @class(['form-side'])>
          <div id="formSection">
            <div @class(['form-header'])>
              <span @class(['tag'])>Send a Message</span>
              <h3>Start a Conversation</h3>
              <p>Fill in your details and we'll get back to you promptly with everything you need to know.</p>
            </div>

            <div @class(['form-row'])>
              <div @class(['form-group'])>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <label for="fname">Full Name <span @class(['req'])>*</span></label>
                <input type="text" id="fname" placeholder="Your full name" />
              </div>
              <div @class(['form-group'])>
                <label for="email">Email Address <span @class(['req'])>*</span></label>
                <input type="email" id="email" placeholder="your@email.com" />
              </div>
            </div>
            <div @class(['form-row'])>
              <div @class(['form-group'])>
                <label for="phone">Phone Number</label>
                <input type="tel" pattern="[0-9+\-\s]*" id="phone" placeholder="00000 00000" />
              </div>
              <div @class(['form-group'])>
                <label for="program">Program of Interest</label>
                <select id="program">
                  <option value="" disabled selected>Select a program</option>
                  <option>Bharatanatyam</option>
                  <option>Carnatic Vocal</option>
                  <option>Veena &amp; Violin</option>
                  <option>Mridangam</option>
                  <option>Kuchipudi</option>
                  <option>Mohiniattam</option>
                  <option>Other / General Enquiry</option>
                </select>
              </div>
            </div>
            <div @class(['form-row']) style="grid-template-columns:1fr; margin-bottom:1.25rem;">
              <div @class(['form-group'])>
                <label>Preferred Contact Time</label>
                <div @class(['preferred-time'])>
                  <div @class(['time-chip']) onclick="toggleChip(this)">Morning (9-12)</div>
                  <div @class(['time-chip']) onclick="toggleChip(this)">Afternoon (12-4)</div>
                  <div @class(['time-chip']) onclick="toggleChip(this)">Evening (4-7)</div>
                </div>
              </div>
              <input type="hidden" id="preferred_time" name="preferred_time">
            </div>
            <div @class(['form-row']) style="grid-template-columns:1fr;">
              <div @class(['form-group', 'full'])>
                <label for="msg">Message <span @class(['req'])>*</span></label>
                <textarea id="msg" placeholder="Tell us about yourself or your query…"></textarea>
              </div>
            </div>

            <button @class(['btn-send']) onclick="submitForm()">
              Send Message
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/>
              </svg>
            </button>
            <p @class(['form-note'])>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="currentColor" fill="none" stroke="currentColor" stroke-width="1.5">
                  <path d="M4.26781 18.8447C4.49269 20.515 5.87613 21.8235 7.55966 21.9009C8.97627 21.966 10.4153 22 12 22C13.5847 22 15.0237 21.966 16.4403 21.9009C18.1239 21.8235 19.5073 20.515 19.7322 18.8447C19.879 17.7547 20 16.6376 20 15.5C20 14.3624 19.879 13.2453 19.7322 12.1553C19.5073 10.485 18.1239 9.17649 16.4403 9.09909C15.0237 9.03397 13.5847 9 12 9C10.4153 9 8.97627 9.03397 7.55966 9.09909C5.87613 9.17649 4.49269 10.485 4.26781 12.1553C4.12105 13.2453 4 14.3624 4 15.5C4 16.6376 4.12105 17.7547 4.26781 18.8447Z" />
                  <path d="M7.5 9V6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5V9" />
                  <path d="M16 15.49V15.5" />
                  <path d="M12 15.49V15.5" />
                  <path d="M8 15.49V15.5" />
                </svg>
              </span>
              We respect your privacy. Your information will never be shared.
            </p>
            <div id="successMsg" class="success-box" style="display:none;">
              <div class="success-icon"> ✓</div>
              <h3>Thank you!</h3>
              <p>Your enquiry has been submitted successfully.</p>
            </div>
          </div>
        </div>
    </div>

      <!-- ===== CTA BANNER ===== -->
      @include('frontend.components.cta')
      <!-- ===== SERVICE STRIP ===== -->
      <section @class(['service-strip']) aria-label="Our services">
        <div @class(['service-grid'])>
          <div @class(['service-item'])>
            <div @class(['service-icon'])>
              <!-- HugeIcons: Call stroke-rounded -->
              <img src="{{ asset('assets/svg/headphones.svg')}}" alt="" width="50"/>
            </div>
            <div @class(['service-title'])>Reach out to us</div>
            <p @class(['service-desc'])>
              Our dedicated support team is here to assist you. Reach out
              anytime for prompt and friendly help.
            </p>
          </div>
          <div @class(['service-item'])>
            <div @class(['service-icon'])>
              <!-- HugeIcons: Exchange 01 stroke-rounded -->
              <img src="{{ asset('assets/svg/package.svg')}}" alt="" width="50" />
            </div>
            <div @class(['service-title'])>Easy Exchanges & Returns</div>
            <p @class(['service-desc'])>
              Hassle-free returns and easy exchanges for a worry-free shopping
              experience.
            </p>
          </div>
          <div @class(['service-item'])>
            <div @class(['service-icon'])>
              <!-- HugeIcons: Gift stroke-rounded -->
              <img src="{{ asset('assets/svg/Sucure.svg')}}" alt="" width="50" />
            </div>
            <div @class(['service-title'])>Gifting &amp; Corporate Orders</div>
            <p @class(['service-desc'])>
              Make every occasion special with our customized gifting and
              corporate solutions.
            </p>
          </div>
        </div>
      </section>
@endsection
@push('scripts')
<script>
    function toggleMenu() {
        const nav = document.getElementById('navLinks');
        nav.classList.toggle('open');
    }

    function toggleChip(el) {
        el.classList.toggle('active');
        let selected = [];
        document.querySelectorAll('.time-chip.active').forEach(chip => {
            selected.push(chip.innerText);
        });

        document.getElementById('preferred_time').value = selected.join(',');
    }

    function submitForm() {
      const name = document.getElementById('fname').value.trim();
      const email = document.getElementById('email').value.trim();
      let rawPhone = document.getElementById('phone').value.trim();
      const program = document.getElementById('program').value;
      const preferred_time = document.getElementById('preferred_time').value;
      const message = document.getElementById('msg').value.trim();

      // Email regex
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      // Phone regex (10 digits)
      // const phonePattern = /^[0-9]{10}$/;

      if (!name || !email || !message) {
          alert('Please fill required fields');
          return;
      }

      if (!emailPattern.test(email)) {
          alert('Please enter a valid email');
          return;
      }

      // check if contains only valid characters (digits, +, space, -)
      const validChars = /^[0-9+\-\s]+$/;

      if (rawPhone && !validChars.test(rawPhone)) {
          alert('Phone number contains invalid characters');
          return;
      }

      // clean number
      let phone = rawPhone.replace(/\D/g, '');

      // remove country codes
      if (phone.startsWith('91')) phone = phone.substring(2);
      if (phone.startsWith('81')) phone = phone.substring(2);
      if (phone.startsWith('1')) phone = phone.substring(1);

      // length validation
      if (rawPhone && (phone.length < 10 || phone.length > 11)) {
          alert('Enter valid phone number (10–11 digits)');
          return;
      }

      const btn = document.querySelector('.btn-send');
      btn.disabled = true;
      btn.innerText = 'Sending...';
      fetch('/enquiry', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
              full_name: name,
              email: email,
              phone: phone,
              program: program,
              preferred_time: preferred_time,
              message: message
          })
      })
      .then(response => response.json())
      .then(data => {
        const btn = document.querySelector('.btn-send');
        btn.disabled = false;
        btn.innerText = 'Send';
          if (data.status) {
              document.getElementById('successMsg').style.display = 'block';
              document.querySelectorAll('input, textarea').forEach(el => el.value = '');
              document.getElementById('program').selectedIndex = 0;
          } else {
              alert('Something went wrong!');
          }
      })
      .catch(error => {
          const btn = document.querySelector('.btn-send');
          btn.disabled = false;
          btn.innerText = 'Send';
          console.error(error);
          alert('Server error! Please try after some time.');
      });
    }   
</script>
@endpush