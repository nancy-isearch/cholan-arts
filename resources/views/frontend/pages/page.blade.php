@extends('frontend.layouts.app')
@section('title', $page->title)

@section('content')

<!-- INNER BANNER -->
<section class="page-inner-banner"
    style="background-image: url('{{ asset('uploads/pages/'.$page->hero_image) }}');">

    <div class="overlay"></div>

    <div class="page-banner-content">
        <span class="page-banner-content__eyebrow">
            <i class="lni lni-home"></i>
            <span>Home</span>
            <i class="lni lni-chevron-right"></i>
            <span>{{ $page->title }}</span>
        </span>
        <h1>{{ $page->hero_title ?? $page->title }}</h1>
        @if($page->hero_subtitle)
            <p>{{ $page->hero_subtitle }}</p>
        @endif
        <div class="page-banner-content__divider"></div>
    </div>
</section>

<!-- PAGE CONTENT -->
<section class="story-section">
    <div class="story-grid">
        <div class="story-text">
            {!! $page->content !!}
        </div>
    </div>
</section>

@endsection
