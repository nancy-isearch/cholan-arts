@extends('frontend.layouts.app')
@section('title', 'Thank You')
@section('seo_title', 'Thank You | Cholan Arts')

@section('content')
<div class="breadcrumb-wrap">
  <div class="container">
    <ul class="breadcrumb">
      <li><a href="{{ url('/') }}">Home</a></li>
      <li class="active">Thank You</li>
    </ul>
  </div>
</div>

<section class="inner-banner text-center" style="padding: 100px 0; text-align: center;">
  <div class="container">
    <div style="font-size: 80px; margin-bottom: 20px; color: #4caf50;">✓</div>
    <h1 style="margin-bottom: 15px;">Thank You!</h1>
    <p style="font-size: 18px; max-width: 600px; margin: 0 auto 30px; line-height: 1.6;">
      Your enquiry has been submitted successfully. Our team will review your request and get back to you shortly.
    </p>
    <a href="{{ url('/') }}" style="display: inline-block; background-color: var(--primary-color, #385632); color: #fff; padding: 12px 30px; border-radius: 4px; text-decoration: none; font-weight: 500; font-size: 16px;">
      Return to Home
    </a>
  </div>
</section>
@endsection
