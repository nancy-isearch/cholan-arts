@extends('admin.layouts.app')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@endpush


@section('content')

{{-- ============================================================
     PRODUCTS PAGE — unique class .prd-page prevents CSS overlap
     ============================================================ --}}
<section class="prd-page">

    {{-- ── Header ── --}}
    <div class="prd-header prd-fade-in">
        <div class="prd-header__left">
            <div class="prd-header__eyebrow">SEO Management</div>
            <h2 class="prd-header__title">SEO <em>Settings</em></h2>
            <p class="prd-header__subtitle">Manage, organise and publish your SEO settings</p>
        </div>
        <div class="prd-header__actions">
        </div>
    </div>

    {{-- ── Stats Strip ── --}}
    {{-- <div class="prd-stats prd-fade-in">
        <div class="prd-stat-card prd-stat-card--green">
            <div class="prd-stat-icon prd-stat-icon--green"><i class="lni lni-package"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatTotal">—</div>
                <div class="prd-stat-label">Total Products</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--teal">
            <div class="prd-stat-icon prd-stat-icon--teal"><i class="lni lni-checkmark-circle"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatActive">—</div>
                <div class="prd-stat-label">Active</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--amber">
            <div class="prd-stat-icon prd-stat-icon--amber"><i class="lni lni-checkmark-circle"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatFeatured">—</div>
                <div class="prd-stat-label">Featured</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--red">
            <div class="prd-stat-icon prd-stat-icon--red"><i class="lni lni-package"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatInactive">—</div>
                <div class="prd-stat-label">Inactive</div>
            </div>
        </div>
    </div> --}}

    {{-- ── Table Card ── --}}
    <div class="prd-card prd-fade-in">

        <div class="prd-card__toolbar">
            <div class="prd-card__toolbar-left">
                <div class="prd-card__toolbar-bar"></div>
                <div class="prd-card__toolbar-title">All SEO Settings</div>
            </div>
        </div>

        {{-- DataTables length + search injected here --}}
        <div class="prd-table-controls" id="prdTableControls"></div>

        <div class="prd-table-scroll">
            <table id="productTable" class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th><h6>#</h6></th>
                        <th><h6>Page</h6></th>
                        <th><h6>Meta Title</h6></th>
                        <th><h6>Schema</h6></th>
                        <th><h6>Actions</h6></th>
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
    {{-- /.prd-card --}}

</section>
{{-- /.prd-page --}}
@endsection


@push('scripts')
<script>
$(document).ready(function () {
   


});
</script>
@endpush
