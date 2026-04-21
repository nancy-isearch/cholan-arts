@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'edit-product-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="epf-header">
            <div class="epf-header__left">
                <span class="epf-eyebrow">
                    Product Management
                </span>
                <h2 class="epf-title">Edit <em>Product</em></h2>
                <p class="epf-subtitle">Update the details below to modify this product in your catalogue</p>
            </div>
            <div class="epf-header__right">
                <a href="/admin/products" class="btn btn-primary epf-btn epf-btn--ghost">
                    <i class="lni lni-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>

        {{-- ══ FORM ══ --}}
        <form id="productForm" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Hidden state inputs — untouched --}}
            <input type="hidden" id="productId" value="{{ $product->id }}">
            <input type="hidden" id="oldTags" value="{{ $product->tags }}">
            <input type="hidden" id="oldSizes" value="{{ $product->available_sizes }}">
            <input type="hidden" id="oldKeywords" value="{{ $product->meta_keywords }}">

            <div class="epf-layout">

                {{-- ══════ LEFT / MAIN COLUMN ══════ --}}
                <div class="epf-col-main">

                    {{-- ── BASIC INFO ── --}}
                    <div class="epf-card epf-fade-in">
                        <div class="epf-card__head">
                            
                            <span class="epf-card__head-title">
                                <i class="lni lni-pencil-alt"></i> Basic Information
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">

                                {{-- Name --}}
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Product Name <span class="epf-required">*</span></label>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control epf-input" placeholder="e.g. Handwoven Silk Scarf">
                                        <small class="text-danger error-text name_error"></small>
                                    </div>
                                </div>

                                {{-- Sub Title --}}
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Subtitle <span class="epf-required">*</span></label>
                                        <input type="text" name="sub_title" class="form-control epf-input" value="{{ $product->sub_title }}" placeholder="Short descriptive line" />
                                        <small class="text-danger error-text sub_title_error"></small>
                                    </div>
                                </div>

                                {{-- Category --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Category <span class="epf-required">*</span></label>
                                        <select name="category_id[]" class="form-control select2" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ in_array($category->id, $productCategoryIds) ? 'selected' : '' }}>
                                                    {{ ucfirst($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger error-text category_id_error"></small>
                                    </div>
                                </div>

                                {{-- Collection --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Collection <span class="epf-required">*</span></label>
                                        <select name="collection_id[]" class="form-control collection-select2" multiple>
                                            @foreach($collections as $collection)
                                                <option value="{{ $collection->id }}"
                                                    {{ in_array($collection->id, $productCollectionIds) ? 'selected' : '' }}>
                                                    {{ ucfirst($collection->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger error-text collection_id_error"></small>
                                    </div>
                                </div>

                                {{-- Price --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Price (₹) <span class="epf-required">*</span></label>
                                        <div class="epf-input-prefix">
                                            <span class="epf-prefix-icon">₹</span>
                                            <input type="number" name="price" value="{{ $product->price }}" class="form-control epf-input epf-input--prefixed" placeholder="0">
                                        </div>
                                        <small class="text-danger error-text price_error"></small>
                                    </div>
                                </div>

                                {{-- Discount --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Discount (%)</label>
                                        <div class="epf-input-prefix">
                                            <span class="epf-prefix-icon">%</span>
                                            <input type="number" name="discount" value="{{ $product->discount }}" class="form-control epf-input epf-input--prefixed" placeholder="0">
                                        </div>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Description <span class="epf-required">*</span></label>
                                        <textarea name="description" id="description" class="form-control epf-input epf-textarea" rows="6">{{ $product->description }}</textarea>
                                        <small class="text-danger error-text description_error"></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── ABOUT SECTION ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.08s">
                        <div class="epf-card__head">
                            
                            <span class="epf-card__head-title">
                                <i class="lni lni-book"></i> About Section
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">

                                {{-- About Title --}}
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">About Title</label>
                                        <input type="text" name="about_title" class="form-control epf-input" value="{{ $product->about_title }}" placeholder="e.g. The Story Behind This Piece">
                                    </div>
                                </div>

                                {{-- About Image --}}
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">About Image</label>
                                        @if($product->about_image)
                                        <div class="epf-existing-image epf-existing-image--sm mb-2">
                                            <img src="{{ asset('uploads/products/'.$product->id .'/'.$product->about_image) }}" alt="About Image">
                                            <span class="epf-existing-image__badge"> Current</span>
                                        </div>
                                        @endif
                                        <div class="epf-upload-zone epf-upload-zone--sm">
                                            <input type="file" name="about_image" class="epf-upload-zone__input">
                                            <div class="epf-upload-zone__inner">
                                                <div class="epf-upload-zone__icon"><i class="lni lni-image"></i></div>
                                                <p class="epf-upload-zone__text">Replace image or <span>browse</span></p>
                                                <p class="epf-upload-zone__hint">JPG, PNG, WEBP — max 5MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- About Description --}}
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">About Description</label>
                                        <textarea name="about_description" id="about_description" class="form-control epf-input epf-textarea">{{ $product->about_description }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── PRODUCT SPECIFICATIONS ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.12s">
                        <div class="epf-card__head">
                            
                            <span class="epf-card__head-title">
                                <i class="lni lni-layers"></i> Product Specifications
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Material</label>
                                        <input type="text" name="material" value="{{ $product->material }}" class="form-control epf-input" placeholder="e.g. Pure Silk">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Finish</label>
                                        <input type="text" name="finish" value="{{ $product->finish }}" class="form-control epf-input" placeholder="e.g. Matte / Glossy">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Technique</label>
                                        <input type="text" name="technique" value="{{ $product->technique }}" class="form-control epf-input" placeholder="e.g. Hand-loomed">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Origin</label>
                                        <input type="text" name="origin" value="{{ $product->origin }}" class="form-control epf-input" placeholder="e.g. Varanasi, India">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Delivery Info</label>
                                        <input type="text" name="delivery" value="{{ $product->delivery }}" class="form-control epf-input" placeholder="e.g. 5–7 working days">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Stock</label>
                                        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control epf-input" placeholder="0">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">GI Certified</label>
                                        <input type="text" name="gi_certified" value="{{ $product->gi_certified }}" class="form-control epf-input" placeholder="Yes / No / Certificate #">
                                    </div>
                                </div>

                                {{-- Available Sizes --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Available Sizes</label>
                                        <div class="tag-container epf-tag-container" id="sizeContainer">
                                            <input type="text" id="sizeInput" class="epf-tag-input border-0 flex-grow-1" placeholder="Type and press Enter">
                                        </div>
                                        <input type="hidden" name="available_sizes" id="sizeHidden">
                                        <small class="epf-field-hint">Press <kbd>Enter</kbd> to add a size</small>
                                    </div>
                                </div>

                                {{-- Tags --}}
                                <div class="col-md-4">
                                    <div class="epf-field">
                                        <label class="epf-label">Tags</label>
                                        <div class="tag-container epf-tag-container" id="tagContainer">
                                            <input type="text" id="tagInput" class="epf-tag-input border-0 flex-grow-1" placeholder="Type and press Enter">
                                        </div>
                                        <input type="hidden" name="tags" id="tagsHidden">
                                        <small class="epf-field-hint">Press <kbd>Enter</kbd> to add a tag</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── SEO DETAILS ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.16s">
                        <div class="epf-card__head">
                            
                            <span class="epf-card__head-title">
                                <i class="lni lni-search-alt"></i> SEO Details
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control epf-input" value="{{ $product->meta_title }}" placeholder="SEO page title">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Keywords</label>
                                        <div class="tag-container epf-tag-container" id="keywordContainer">
                                            <input type="text" id="keywordInput" placeholder="Type and press Enter" class="epf-tag-input border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="meta_keywords" id="keywordsHidden">
                                        <small class="epf-field-hint">Press <kbd>Enter</kbd> to add a keyword</small>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control epf-input epf-textarea epf-textarea--sm" placeholder="Brief description for search engines (150–160 chars)">{{ $product->meta_description }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── FAQs ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.20s">
                        <div class="epf-card__head epf-card__head--split">
                            <div class="epf-card__head-left">
                                
                                <span class="epf-card__head-title">
                                    <i class="lni lni-question-circle"></i> FAQs
                                </span>
                                @if($product->faqs->count())
                                <span class="epf-count-badge">{{ $product->faqs->count() }}</span>
                                @endif
                            </div>
                            <button type="button" class="epf-btn epf-btn--add" id="addFaq">
                                <i class="lni lni-plus"></i> Add FAQ
                            </button>
                        </div>
                        <div class="epf-card__body epf-card__body--faq" id="faqWrapper">

                            @forelse($product->faqs as $key => $faq)
                            <div class="faq-row epf-dynamic-row">
                                <div class="epf-dynamic-row__head">
                                    <span class="epf-dynamic-row__label">FAQ #{{ $key + 1 }}</span>
                                    <button type="button" class="epf-row-remove removeFaq"><i class="lni lni-close"></i></button>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-5">
                                        <div class="epf-field">
                                            <label class="epf-label">Question</label>
                                            <input type="text" name="faqs[{{ $key }}][question]" value="{{ $faq->question }}" class="form-control epf-input" placeholder="Question">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="epf-field">
                                            <label class="epf-label">Answer</label>
                                            <textarea name="faqs[{{ $key }}][answer]" class="form-control epf-input epf-textarea--sm" rows="2" placeholder="Answer">{{ $faq->answer }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="epf-empty-state" id="faqEmptyState">
                                <i class="lni lni-question-circle"></i>
                                <p>No FAQs yet. Click <strong>Add FAQ</strong> to get started.</p>
                            </div>
                            @endforelse

                        </div>
                    </div>

                    {{-- ── SECTIONS / TABS DATA ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.24s">
                        <div class="epf-card__head epf-card__head--split">
                            <div class="epf-card__head-left">
                                
                                <span class="epf-card__head-title">
                                    <i class="lni lni-tab"></i> Sections (Tabs Data)
                                </span>
                                @if($product->sections->count())
                                <span class="epf-count-badge epf-count-badge--teal">{{ $product->sections->count() }}</span>
                                @endif
                            </div>
                            <button type="button" class="epf-btn epf-btn--add" id="addSection">
                                <i class="lni lni-plus"></i> Add Section
                            </button>
                        </div>
                        <div class="epf-card__body epf-card__body--faq" id="sectionWrapper">

                            @forelse($product->sections as $key => $section)
                            <div class="section-row epf-dynamic-row">
                                <div class="epf-dynamic-row__head">
                                    <span class="epf-dynamic-row__label">Section #{{ $key + 1 }}</span>
                                    <button type="button" class="epf-row-remove removeSection"><i class="lni lni-close"></i></button>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <div class="epf-field">
                                            <label class="epf-label">Type</label>
                                            <select name="sections[{{ $key }}][type]" class="form-control epf-input">
                                                <option value="symbolism"      {{ $section->type=='symbolism'      ? 'selected' : '' }}>Symbolism</option>
                                                <option value="customisation"  {{ $section->type=='customisation'  ? 'selected' : '' }}>Customisation</option>
                                                <option value="care"           {{ $section->type=='care'           ? 'selected' : '' }}>Care</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="epf-field">
                                            <label class="epf-label">Title</label>
                                            <input type="text" name="sections[{{ $key }}][title]" value="{{ $section->title }}" class="form-control epf-input" placeholder="Section title">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="epf-field">
                                            <label class="epf-label">Replace Image</label>
                                            <input type="file" name="sections[{{ $key }}][image]" class="form-control epf-input">
                                        </div>
                                    </div>
                                    @if($section->image)
                                    <div class="col-md-2">
                                        <div class="epf-field">
                                            <label class="epf-label">Current</label>
                                            <div class="epf-section-img-thumb">
                                                <img src="{{ asset('uploads/products/'.$product->id .'/'.$section->image) }}" alt="{{ $section->title }}">
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="epf-field">
                                            <label class="epf-label">Description</label>
                                            <textarea name="sections[{{ $key }}][description]" class="form-control epf-input epf-textarea--sm" rows="6" placeholder="Description">{{ $section->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="epf-empty-state" id="sectionEmptyState">
                                <i class="lni lni-tab"></i>
                                <p>No sections yet. Click <strong>Add Section</strong> to begin.</p>
                            </div>
                            @endforelse

                        </div>
                    </div>

                </div>
                {{-- end left column --}}

                {{-- ══════ RIGHT / SIDEBAR COLUMN ══════ --}}
                <div class="epf-col-side">

                    {{-- ── FEATURE IMAGE ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.06s">
                        <div class="epf-card__head">
                            <span class="epf-card__head-title">
                                <i class="lni lni-gallery"></i> Feature Image
                            </span>
                        </div>
                        <div class="epf-card__body">
                            {{-- Existing feature image --}}
                            <div class="epf-existing-image mb-3" id="featureCurrentWrap">
                                <img src="{{ asset('uploads/products/'.$product->id .'/'.$product->feature_image) }}" alt="Feature Image" id="featureCurrentImg">
                                <span class="epf-existing-image__badge"><i class="lni lni-star-filled"></i> Current</span>
                            </div>
                            {{-- Upload zone --}}
                            <div class="epf-upload-zone">
                                <input type="file" name="feature_image" class="epf-upload-zone__input" id="featureImageInput" accept="image/*">
                                <div class="epf-upload-zone__inner">
                                    <div class="epf-upload-zone__icon">
                                        <i class="lni lni-upload"></i>
                                    </div>
                                    <p class="epf-upload-zone__text">Replace or <span>browse</span></p>
                                    <p class="epf-upload-zone__hint">JPG, PNG, WEBP · Max 5 MB</p>
                                </div>
                                <div class="epf-upload-preview" id="featurePreview" style="display:none;">
                                    <img id="featurePreviewImg" src="" alt="New Feature Image">
                                    <button type="button" class="epf-upload-preview__remove" id="featurePreviewRemove">
                                        <i class="lni lni-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── PRODUCT IMAGES GALLERY ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.10s">
                        <div class="epf-card__head">
                            
                            <span class="epf-card__head-title">
                                <i class="lni lni-gallery"></i> Product Gallery
                            </span>
                        </div>
                        <div class="epf-card__body">

                            {{-- Existing gallery images with delete --}}
                            @if($product->images->count())
                            <p class="epf-gallery-label">Existing Images</p>
                            <div class="epf-gallery-grid" id="existingGallery">
                                @foreach($product->images as $img)
                                <div class="epf-gallery-item" id="image-{{ $img->id }}">
                                    <img src="{{ asset('uploads/products/'.$product->id .'/'.$img->image) }}" alt="Product Image">
                                    <button type="button" class="epf-gallery-item__delete delete-image" data-id="{{ $img->id }}">
                                        <i class="lni lni-close"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            {{-- Upload new images --}}
                            <div class="epf-upload-zone epf-upload-zone--gallery {{ $product->images->count() ? 'mt-3' : '' }}">
                                <input type="file" name="images[]" multiple class="epf-upload-zone__input" id="galleryInput" accept="image/*">
                                <div class="epf-upload-zone__inner">
                                    <div class="epf-upload-zone__icon">
                                        <i class="lni lni-upload"></i>
                                    </div>
                                    <p class="epf-upload-zone__text">Add more images or <span>browse</span></p>
                                    <p class="epf-upload-zone__hint">Multiple files · JPG, PNG, WEBP</p>
                                </div>
                            </div>
                            <div class="epf-gallery-preview" id="galleryPreview"></div>
                        </div>
                    </div>

                    {{-- ── UPDATE PRODUCT ── --}}
                    <div class="epf-save-card epf-fade-in" style="animation-delay:.14s">
                        <div class="epf-save-card__body">
                            <div class="epf-save-card__meta">
                                <div class="epf-save-card__meta-item">
                                    <i class="lni lni-tag"></i>
                                    <span>ID: <strong>#{{ $product->id }}</strong></span>
                                </div>
                                <div class="epf-save-card__meta-item">
                                    <i class="lni lni-calendar"></i>
                                    <span>Updated: <strong>{{ $product->updated_at->format('d M Y') }}</strong></span>
                                </div>
                            </div>
                            <p class="epf-save-card__hint">
                                <i class="lni lni-shield-check"></i>
                                Review all changes carefully before saving. This will immediately update the product listing.
                            </p>
                            <button type="submit" class="btn btn-primary epf-btn epf-btn--submit">
                                <i class="lni lni-save"></i>
                                Save Changes
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end sidebar column --}}

            </div>
            {{-- end epf-layout --}}

        </form>
        {{-- end form --}}

    </div>
</section>
@endsection

@push('scripts')
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('about_description');

    let tags = [];
    let sizes = [];
    let keywords = [];

    $(document).ready(function () {

        // ── Select2 ──
        $('.select2').select2({
            placeholder: "Select Categories",
            allowClear: true
        });

        $('.collection-select2').select2({
            placeholder: "Select Collections",
            allowClear: true
        });

        let sectionIndex = {{ count($product->sections) }};

        // ── Feature image preview ──
        $('#featureImageInput').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#featurePreviewImg').attr('src', e.target.result);
                    $('#featurePreview').show();
                    $('#featureImageInput').closest('.epf-upload-zone').find('.epf-upload-zone__inner').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        $('#featurePreviewRemove').on('click', function () {
            $('#featureImageInput').val('');
            $('#featurePreview').hide();
            $('#featureImageInput').closest('.epf-upload-zone').find('.epf-upload-zone__inner').show();
        });

        // ── Gallery preview ──
        $('#galleryInput').on('change', function () {
            const files = this.files;
            const $preview = $('#galleryPreview');
            $preview.empty();
            if (files.length) {
                Array.from(files).forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $preview.append(`<div class="epf-gallery-thumb"><img src="${e.target.result}" alt=""></div>`);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        // ── Add Section ──
        $('#addSection').click(function () {
            $('#sectionEmptyState').hide();
            let html = `
            <div class="section-row epf-dynamic-row">
                <div class="epf-dynamic-row__head">
                    <span class="epf-dynamic-row__label">Section #${sectionIndex + 1}</span>
                    <button type="button" class="epf-row-remove removeSection"><i class="lni lni-close"></i></button>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="epf-field">
                            <label class="epf-label">Type</label>
                            <select name="sections[${sectionIndex}][type]" class="form-control epf-input">
                                <option value="symbolism">Symbolism</option>
                                <option value="customisation">Customisation</option>
                                <option value="care">Care</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="epf-field">
                            <label class="epf-label">Title</label>
                            <input type="text" name="sections[${sectionIndex}][title]" class="form-control epf-input" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="epf-field">
                            <label class="epf-label">Image</label>
                            <input type="file" name="sections[${sectionIndex}][image]" class="form-control epf-input">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="epf-field">
                            <label class="epf-label">Description</label>
                            <textarea name="sections[${sectionIndex}][description]" class="form-control epf-input epf-textarea--sm" placeholder="Description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            `;
            $('#sectionWrapper').append(html);
            sectionIndex++;
        });

        // ── Remove Section ──
        $(document).on('click', '.removeSection', function () {
            $(this).closest('.section-row').remove();
            if ($('#sectionWrapper .section-row').length === 0) $('#sectionEmptyState').show();
        });

        // ── AJAX Submit ──
        $('#productForm').submit(function (e) {
            e.preventDefault();
            let id = $('#productId').val();
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            let formData = new FormData(this);

            $.ajax({
                url: "/admin/products/" + id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: res.message
                        }).then(() => {
                            window.location.href = "/admin/products";
                        });
                    }
                },
                error: function (err) {
                    if (err.status === 422) {
                        let errors = err.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $('.' + key + '_error').text(value[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: res.message
                        });
                    }
                    console.log(err);
                }
            });
        });

        // ── Tags (pre-populate from existing) ──
        let oldTags = $('#oldTags').val();
        if (oldTags) {
            tags = oldTags.split(',');
            tags.forEach(tag => {
                $('#tagContainer').prepend(`
                    <div class="epf-chip tag">
                        ${tag}
                        <span class="epf-chip__remove remove-tag" data-value="${tag}">&times;</span>
                    </div>
                `);
            });
            updateHiddenInput();
        }

        $('#tagInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !tags.includes(value)) {
                    tags.push(value);
                    $('#tagContainer').prepend(`
                        <div class="epf-chip tag">
                            ${value}
                            <span class="epf-chip__remove remove-tag" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updateHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-tag', function () {
            let value = $(this).data('value');
            tags = tags.filter(tag => tag != value);
            $(this).parent().remove();
            updateHiddenInput();
        });
        function updateHiddenInput() { $('#tagsHidden').val(tags.join(',')); }

        // ── Sizes (pre-populate from existing) ──
        let oldSizes = $('#oldSizes').val();
        if (oldSizes) {
            sizes = oldSizes.split(',');
            sizes.forEach(size => {
                $('#sizeContainer').prepend(`
                    <div class="epf-chip tag">
                        ${size}
                        <span class="epf-chip__remove remove-size" data-value="${size}">&times;</span>
                    </div>
                `);
            });
            updateSizeHiddenInput();
        }

        $('#sizeInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !sizes.includes(value)) {
                    sizes.push(value);
                    $('#sizeContainer').prepend(`
                        <div class="epf-chip tag">
                            ${value}
                            <span class="epf-chip__remove remove-size" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updateSizeHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-size', function () {
            let value = $(this).data('value');
            console.log("value => ", value);
            console.log("sizes => ", sizes);
            sizes = sizes.filter(size => size != value);
            console.log("sizes => ", sizes);
            $(this).parent().remove();
            updateSizeHiddenInput();
        });
        function updateSizeHiddenInput() { $('#sizeHidden').val(sizes.join(',')); }

        // ── Keywords (pre-populate from existing) ──
        let oldKeywords = $('#oldKeywords').val();
        if (oldKeywords) {
            keywords = oldKeywords.split(',');
            keywords.forEach(keyword => {
                $('#keywordContainer').prepend(`
                    <div class="epf-chip tag">
                        ${keyword}
                        <span class="epf-chip__remove remove-keyword" data-value="${keyword}">&times;</span>
                    </div>
                `);
            });
            updatekeywordHiddenInput();
        }

        $('#keywordInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !keywords.includes(value)) {
                    keywords.push(value);
                    $('#keywordContainer').prepend(`
                        <div class="epf-chip tag">
                            ${value}
                            <span class="epf-chip__remove remove-keyword" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updatekeywordHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-keyword', function () {
            let value = $(this).data('value');
            keywords = keywords.filter(keyword => keyword != value);
            $(this).parent().remove();
            updatekeywordHiddenInput();
        });
        function updatekeywordHiddenInput() { $('#keywordsHidden').val(keywords.join(',')); }

    }); // end document.ready

    // ── Delete gallery image (outside ready — keep original scope) ──
    $(document).on('click', '.delete-image', function () {
        let id = $(this).data('id');
        let el = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this image!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/products/image/" + id,
                    type: "DELETE",
                    data: { _token: "{{ csrf_token() }}" },
                    success: function (res) {
                        if (res.status) {
                            Swal.fire('Deleted!', res.message, 'success');
                            $('#image-' + id).remove();
                        }
                    }
                });
            }
        });
    });

    // ── FAQ index starts after existing FAQs ──
    let faqIndex = {{ count($product->faqs) }};

    $('#addFaq').click(function () {
        $('#faqEmptyState').hide();
        let html = `
        <div class="faq-row epf-dynamic-row">
            <div class="epf-dynamic-row__head">
                <span class="epf-dynamic-row__label">FAQ #${faqIndex + 1}</span>
                <button type="button" class="epf-row-remove removeFaq"><i class="lni lni-close"></i></button>
            </div>
            <div class="row g-3">
                <div class="col-md-5">
                    <div class="epf-field">
                        <label class="epf-label">Question</label>
                        <input type="text" name="faqs[${faqIndex}][question]" class="form-control epf-input" placeholder="Question">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="epf-field">
                        <label class="epf-label">Answer</label>
                        <textarea name="faqs[${faqIndex}][answer]" class="form-control epf-input epf-textarea--sm" placeholder="Answer"></textarea>
                    </div>
                </div>
            </div>
        </div>
        `;
        $('#faqWrapper').append(html);
        faqIndex++;
    });

    $(document).on('click', '.removeFaq', function () {
        $(this).closest('.faq-row').remove();
        if ($('#faqWrapper .faq-row').length === 0) $('#faqEmptyState').show();
    });
</script>
@endpush
