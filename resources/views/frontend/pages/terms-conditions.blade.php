@extends('frontend.layouts.about-us')

@section('title','Terms of Use – Cholan Arts')

@section('content')
    <section class="story-section">
      <div class="story-grid">
        <div class="story-text">
            <h1>Terms of Use</h1>
            <p class="sec-body"><strong>Last Updated:</strong> 30th March, 2026</p>
            <p class="sec-body">By accessing or using this website, you agree to comply with and be bound by the following Terms of Use.</p>
            <h3>1. Acceptance of Terms</h3>
            <p>By using our website and services, you agree to these Terms. If you do not agree, please do not use the website.</p>

            <h3>2. Services</h3>
            <p>We provide services including but not limited to:</p>
            <ul>
                <li>Web development</li>
                <li>SEO (Search Engine Optimization)</li>
                <li>Digital marketing</li>
                <li>IT consulting</li>
            </ul>

            <h3>3. User Responsibilities</h3>
            <ul>
                <li>Provide accurate and complete information</li>
                <li>Do not use the website for illegal activities</li>
                <li>Do not attempt to harm or disrupt the website</li>
                <li>Respect intellectual property rights</li>
            </ul>

            <h3>4. Intellectual Property</h3>
            <p>All content on this website (text, graphics, logos, etc.) is the property of iSearch Solution Pvt. Ltd. and is protected by applicable copyright laws.</p>

            <h3>5. Payment Terms</h3>
            <p>All payments for services must be made as agreed. Failure to pay may result in suspension or termination of services.</p>

            <h3>6. Limitation of Liability</h3>
            <p>We are not liable for any direct, indirect, or incidental damages resulting from the use or inability to use our services.</p>

            <h3>7. Third-Party Links</h3>
            <p>Our website may contain links to third-party websites. We are not responsible for their content or policies.</p>

            <h3>8. Termination</h3>
            <p>We reserve the right to suspend or terminate access to our services at any time without notice if Terms are violated.</p>

            <h3>9. Changes to Terms</h3>
            <p>We may update these Terms at any time. Changes will be posted on this page.</p>

            <h3>10. Governing Law</h3>
            <p>These Terms shall be governed by the laws of India.</p>
        </div>
      </div>
    </section>

    <!-- ══ 13. CTA ═════════════════════════════════════════════════════ -->
    @include('frontend.components.cta')
@endsection