@extends('frontend.layouts.about-us')

@section('title','Privacy Policy – Cholan Arts')

@section('content')
    <section class="story-section">
      <div class="story-grid">
        <div class="story-text">
            <h1>Privacy Policy</h1>
            <p class="sec-body"><strong>Last Updated:</strong> 30th March, 2026</p>
            <p class="sec-body">Your privacy is important to us. This Privacy Policy explains how we collect, use, and protect your information when you use our website and services.</p>
            <h3>1. Information We Collect</h3>
            <h4>a. Personal Information</h4>
            <ul>
                <li class="sec-li">Name</li>
                <li class="sec-li">Email address</li>
                <li class="sec-li">Phone number</li>
                <li class="sec-li">Company details</li>
                <li class="sec-li">Information submitted through contact or inquiry forms</li>
            </ul>

            <h4>b. Non-Personal Information</h4>
            <ul>
                <li class="sec-li">IP address</li>
                <li class="sec-li">Browser type</li>
                <li class="sec-li">Device information</li>
                <li class="sec-li">Pages visited and time spent</li>
                <li class="sec-li">Cookies and usage data</li>
            </ul>

            <h3>2. How We Use Your Information</h3>
            <ul>
                <li class="sec-li">Provide and improve our services</li>
                <li class="sec-li">Respond to inquiries and support requests</li>
                <li class="sec-li">Send updates and service-related communication</li>
                <li class="sec-li">Improve website performance and user experience</li>
                <li class="sec-li">Analyze website traffic and usage</li>
            </ul>

            <h3>3. Cookies Policy</h3>
            <p class="sec-body">We use cookies and similar technologies to enhance your experience, track performance, and understand user behavior.</p>
            <p class="sec-body">You can disable cookies through your browser settings, but some features may not work properly.</p>

            <h3>4. Data Sharing & Disclosure</h3>
            <p class="sec-body">We do not sell, trade, or rent your personal information.</p>
            <p class="sec-body">We may share information only:</p>
            <ul>
                <li class="sec-li">With trusted service providers</li>
                <li class="sec-li">To comply with legal obligations</li>
                <li class="sec-li">To protect our rights and security</li>
            </ul>

            <h3>5. Data Security</h3>
            <p class="sec-body">We implement appropriate security measures to protect your data. However, no method of transmission over the internet is 100% secure.</p>

            <h3>6. Third-Party Services</h3>
            <p class="sec-body">We may use third-party tools like analytics and marketing services that collect data according to their own privacy policies.</p>

            <h3>7. Your Rights</h3>
            <ul>
                <li class="sec-li">Access your personal data</li>
                <li class="sec-li">Request correction or deletion</li>
                <li class="sec-li">Withdraw consent at any time</li>
            </ul>

            <h3>8. External Links</h3>
            <p class="sec-body">Our website may contain links to external websites. We are not responsible for their privacy practices.</p>

            <h3>9. Children's Privacy</h3>
            <p class="sec-body">Our services are not intended for individuals under 18. We do not knowingly collect personal data from children.</p>

            <h3>10. Changes to This Policy</h3>
            <p class="sec-body">We may update this policy from time to time. Changes will be posted on this page with an updated date.</p>

        </div>
      </div>
    </section>

    <!-- ══ 13. CTA ═════════════════════════════════════════════════════ -->
    @include('frontend.components.cta')
@endsection