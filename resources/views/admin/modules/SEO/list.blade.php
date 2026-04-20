@extends('admin.layouts.app')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
@endpush

@section('content')

<section class="prd-page">

    {{-- HEADER --}}
    <div class="prd-header prd-fade-in">
        <div class="prd-header__left">
            <div class="prd-header__eyebrow">SEO Management</div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="prd-card prd-fade-in">

        <div class="prd-card__toolbar">
            <div class="prd-card__toolbar-left">
                <div class="prd-card__toolbar-bar"></div>
                <div class="prd-card__toolbar-title">All SEO Pages</div>
                <span class="prd-table-badge">{{ $seoPages->count() }} items</span>
            </div>
        </div>

        <div class="prd-table-scroll">
            <table class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Page</th>
                        <th>Meta Title</th>
                        {{-- <th>Status</th> --}}
                        <th>Schema</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($seoPages as $key => $page)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <strong>{{ ucfirst(str_replace('_', ' ', $page->page_key)) }}</strong>
                        </td>
                        <td>
                            {{ $page->meta_title ?? '—' }}
                        </td>
                        {{-- <td>
                            @if($page->index_page)
                                <span class="badge bg-success">Indexed</span>
                            @else
                                <span class="badge bg-danger">No Index</span>
                            @endif
                        </td> --}}

                        <td>
                            @if($page->schema_json)
                                <span class="badge bg-info">Available</span>
                            @else
                                <span class="badge bg-secondary">Missing</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('seo.edit', $page->page_key) }}"
                               class="prd-btn prd-btn-primary prd-btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</section>

@endsection

