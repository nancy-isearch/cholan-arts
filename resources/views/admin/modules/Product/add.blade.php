@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'add-product-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="apf-header">
            <div class="apf-header__left">
                <span class="apf-eyebrow">
                    Product Management
                </span>
                <h2 class="apf-title">Add <em>New Product</em></h2>
                <p class="apf-subtitle">Fill in the details below to list a new product in your catalogue</p>
            </div>
            <div class="apf-header__right">
                <a href="/admin/products" class="btn btn-primary apf-btn apf-btn--ghost">
                    <i class="lni lni-arrow-left"></i> Back to Products
                </a>
            </div>
        </div>

        {{-- ══ FORM ══ --}}
        <form id="productForm" enctype="multipart/form-data">
            @csrf

            <div class="apf-layout">

                {{-- ══════ LEFT / MAIN COLUMN ══════ --}}
                <div class="apf-col-main">

                    {{-- ── BASIC INFO ── --}}
                    <div class="apf-card apf-fade-in">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-pencil-alt"></i> Basic Information
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="row g-3">

                                {{-- Name --}}
                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label" for="name">Product Name <span class="apf-required">*</span></label>
                                        <input type="text" id="name" name="name" class="form-control apf-input" placeholder="e.g. Handwoven Silk Scarf">
                                        <small class="text-danger error-text name_error"></small>
                                    </div>
                                </div>

                                {{-- Subtitle --}}
                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label" for="sub_title">Subtitle <span class="apf-required">*</span></label>
                                        <input type="text" id="sub_title" name="sub_title" class="form-control apf-input" placeholder="Short descriptive line" />
                                        <small class="text-danger error-text sub_title_error"></small>
                                    </div>
                                </div>

                                {{-- Category --}}
                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label">Category <span class="apf-required">*</span></label>
                                        <select name="category_id[]" class="form-control apf-input category-select" multiple>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ isset($product) && $product->categories->contains($category->id) ? 'selected' : '' }}>
                                                    {{ ucfirst($category->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <small class="text-danger error-text category_id_error"></small>
                                    </div>
                                </div>

                                {{-- Price --}}
                                <div class="col-md-3">
                                    <div class="apf-field">
                                        <label class="apf-label" for="price">Price (₹) <span class="apf-required">*</span></label>
                                        <div class="apf-input-prefix">
                                            <span class="apf-prefix-icon">₹</span>
                                            <input type="number" id="price" name="price" class="form-control apf-input apf-input--prefixed" placeholder="0">
                                        </div>
                                        <small class="text-danger error-text price_error"></small>
                                    </div>
                                </div>

                                {{-- Discount --}}
                                <div class="col-md-3">
                                    <div class="apf-field">
                                        <label class="apf-label" for="discount">Discount (%)</label>
                                        <div class="apf-input-prefix">
                                            <span class="apf-prefix-icon">%</span>
                                            <input type="number" id="discount" name="discount" class="form-control apf-input apf-input--prefixed" placeholder="0">
                                        </div>
                                        <small class="text-danger error-text discount_error"></small>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="col-md-12">
                                    <div class="apf-field">
                                        <label class="apf-label" for="description">Description <span class="apf-required">*</span></label>
                                        <textarea name="description" id="description" class="form-control apf-input apf-textarea"></textarea>
                                        <small class="text-danger error-text description_error"></small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── ABOUT SECTION ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.08s">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-book"></i> About Section
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="row g-3">

                                {{-- About Title --}}
                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label" for="about_title">About Title</label>
                                        <input type="text" id="about_title" name="about_title" class="form-control apf-input" placeholder="e.g. The Story Behind This Piece">
                                    </div>
                                </div>

                                {{-- About Image --}}
                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label">About Image</label>
                                        <div class="apf-upload-zone apf-upload-zone--sm">
                                            <input type="file" name="about_image" class="apf-upload-zone__input">
                                            <div class="apf-upload-zone__inner">
                                                <div class="apf-upload-zone__icon"><i class="lni lni-image"></i></div>
                                                <p class="apf-upload-zone__text">Drop image or <span>browse</span></p>
                                                <p class="apf-upload-zone__hint">JPG, PNG, WEBP — max 5MB</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- About Description --}}
                                <div class="col-md-12">
                                    <div class="apf-field">
                                        <label class="apf-label" for="about_description">About Description</label>
                                        <textarea name="about_description" id="about_description" class="form-control apf-input apf-textarea"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── PRODUCT SPECIFICATIONS ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.12s">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-layers"></i> Product Specifications
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="row g-3">

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="material">Material</label>
                                        <input type="text" id="material" name="material" class="form-control apf-input" placeholder="e.g. Pure Silk">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="finish">Finish</label>
                                        <input type="text" id="finish" name="finish" class="form-control apf-input" placeholder="e.g. Matte / Glossy">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="technique">Technique</label>
                                        <input type="text" id="technique" name="technique" class="form-control apf-input" placeholder="e.g. Hand-loomed">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="origin">Origin</label>
                                        <input type="text" id="origin" name="origin" class="form-control apf-input" placeholder="e.g. Varanasi, India">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="delivery">Delivery Info</label>
                                        <input type="text" id="delivery" name="delivery" class="form-control apf-input" placeholder="e.g. 5–7 working days">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="stock">Stock</label>
                                        <input type="number" id="stock" name="stock" class="form-control apf-input" placeholder="0">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label" for="gi_certified">GI Certified</label>
                                        <input type="text" id="gi_certified" name="gi_certified" class="form-control apf-input" placeholder="Yes / No / Certificate #">
                                    </div>
                                </div>

                                {{-- Tags --}}
                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label">Tags</label>
                                        <div class="tag-container apf-tag-container" id="tagContainer">
                                            <input type="text" id="tagInput" placeholder="Type and press Enter" class="apf-tag-input border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="tags" id="tagsHidden">
                                        <small class="apf-field-hint">Press <kbd>Enter</kbd> to add a tag</small>
                                    </div>
                                </div>

                                {{-- Available Sizes --}}
                                <div class="col-md-4">
                                    <div class="apf-field">
                                        <label class="apf-label">Available Sizes</label>
                                        <div class="tag-container apf-tag-container" id="sizeContainer">
                                            <input type="text" id="sizeInput" placeholder="e.g. 6'', 12''" class="apf-tag-input border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="available_sizes" id="sizeHidden">
                                        <small class="apf-field-hint">Press <kbd>Enter</kbd> to add a size</small>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── SEO DETAILS ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.16s">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-search-alt"></i> SEO Details
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="row g-3">

                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label" for="meta_title">Meta Title</label>
                                        <input type="text" id="meta_title" name="meta_title" class="form-control apf-input" placeholder="SEO page title">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="apf-field">
                                        <label class="apf-label">Meta Keywords</label>
                                        <div class="tag-container apf-tag-container" id="keywordContainer">
                                            <input type="text" id="keywordInput" placeholder="Type and press Enter" class="apf-tag-input border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="meta_keywords" id="keywordsHidden">
                                        <small class="apf-field-hint">Press <kbd>Enter</kbd> to add a keyword</small>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="apf-field">
                                        <label class="apf-label" for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" id="meta_description" class="form-control apf-input apf-textarea apf-textarea--sm" placeholder="Brief description for search engines (150–160 chars)"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ── FAQs ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.20s">
                        <div class="apf-card__head apf-card__head--split">
                            <div class="apf-card__head-left">
                                
                                <span class="apf-card__head-title">
                                    <i class="lni lni-question-circle"></i> FAQs
                                </span>
                            </div>
                            <button type="button" class="apf-btn apf-btn--add" id="addFaq">
                                <i class="lni lni-plus"></i> Add FAQ
                            </button>
                        </div>
                        <div class="apf-card__body apf-card__body--faq" id="faqWrapper">
                            <div class="apf-empty-state" id="faqEmptyState">
                                <i class="lni lni-question-circle"></i>
                                <p>No FAQs yet. Click <strong>Add FAQ</strong> to get started.</p>
                            </div>
                        </div>
                    </div>

                    {{-- ── SECTIONS / TABS DATA ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.24s">
                        <div class="apf-card__head apf-card__head--split">
                            <div class="apf-card__head-left">
                                
                                <span class="apf-card__head-title">
                                    <i class="lni lni-tab"></i> Sections (Tabs Data)
                                </span>
                            </div>
                            <button type="button" class="apf-btn apf-btn--add" id="addSection">
                                <i class="lni lni-plus"></i> Add Section
                            </button>
                        </div>
                        <div class="apf-card__body apf-card__body--faq" id="sectionWrapper">
                            <div class="apf-empty-state" id="sectionEmptyState">
                                <i class="lni lni-tab"></i>
                                <p>No sections yet. Click <strong>Add Section</strong> to begin.</p>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- end left column --}}

                {{-- ══════ RIGHT / SIDEBAR COLUMN ══════ --}}
                <div class="apf-col-side">

                    {{-- ── FEATURE IMAGE ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.06s">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-gallery"></i> Feature Image
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="apf-upload-zone">
                                <input type="file" name="feature_image" class="apf-upload-zone__input" id="featureImageInput" accept="image/*">
                                <div class="apf-upload-zone__inner">
                                    <div class="apf-upload-zone__icon">
                                        <i class="lni lni-upload"></i>
                                    </div>
                                    <p class="apf-upload-zone__text">Drop image or <span>browse</span></p>
                                    <p class="apf-upload-zone__hint">JPG, PNG, WEBP · Max 5 MB</p>
                                </div>
                                <div class="apf-upload-preview" id="featurePreview" style="display:none;">
                                    <img id="featurePreviewImg" src="" alt="Feature Image">
                                    <button type="button" class="apf-upload-preview__remove" data-target="feature">
                                        <i class="lni lni-close"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── PRODUCT IMAGES ── --}}
                    <div class="apf-card apf-fade-in" style="animation-delay:.10s">
                        <div class="apf-card__head">
                            
                            <span class="apf-card__head-title">
                                <i class="lni lni-gallery"></i> Product Gallery
                            </span>
                        </div>
                        <div class="apf-card__body">
                            <div class="apf-upload-zone apf-upload-zone--gallery">
                                <input type="file" name="images[]" multiple class="apf-upload-zone__input" id="galleryInput" accept="image/*">
                                <div class="apf-upload-zone__inner">
                                    <div class="apf-upload-zone__icon">
                                        <i class="lni lni-upload"></i>
                                    </div>
                                    <p class="apf-upload-zone__text">Drop images or <span>browse</span></p>
                                    <p class="apf-upload-zone__hint">Multiple files · JPG, PNG, WEBP</p>
                                </div>
                            </div>
                            <div class="apf-gallery-preview" id="galleryPreview"></div>
                        </div>
                    </div>

                    {{-- ── SAVE PRODUCT ── --}}
                    <div class="apf-save-card apf-fade-in" style="animation-delay:.14s">
                        <div class="apf-save-card__body">
                            <p class="apf-save-card__hint">
                                <i class="lni lni-shield-check"></i>
                                Review all details before publishing. You can always edit the product later.
                            </p>
                            <button type="submit" class="btn btn-primary apf-btn apf-btn--submit">
                                <i class="lni lni-checkmark-circle"></i>
                                Save &amp; Publish Product
                            </button>
                        </div>
                    </div>

                </div>
                {{-- end sidebar column --}}

            </div>
            {{-- end apf-layout --}}

        </form>
        {{-- end form --}}

    </div>
</section>
@endsection

@push('scripts')
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('about_description');

    $(document).ready(function () {

        // ── Select2 ──
        $('.category-select').select2({
            placeholder: "Select Categories",
            allowClear: true,
            width: '100%'
        });

        // ── Feature image preview ──
        $('#featureImageInput').on('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    $('#featurePreviewImg').attr('src', e.target.result);
                    $('#featurePreview').show();
                    $('#featureImageInput').closest('.apf-upload-zone').find('.apf-upload-zone__inner').hide();
                };
                reader.readAsDataURL(file);
            }
        });

        $(document).on('click', '.apf-upload-preview__remove[data-target="feature"]', function () {
            $('#featureImageInput').val('');
            $('#featurePreview').hide();
            $('#featureImageInput').closest('.apf-upload-zone').find('.apf-upload-zone__inner').show();
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
                        $preview.append(`<div class="apf-gallery-thumb"><img src="${e.target.result}" alt=""></div>`);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });

        // ── AJAX Submit ──
        $('#productForm').submit(function (e) {
            e.preventDefault();
            for (let instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('products.store') }}",
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

        // ── Tags ──
        let tags = [];
        $('#tagInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !tags.includes(value)) {
                    tags.push(value);
                    $('#tagContainer').prepend(`
                        <div class="apf-chip tag">
                            ${value}
                            <span class="apf-chip__remove remove-tag" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updateHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-tag', function () {
            let value = $(this).data('value');
            tags = tags.filter(tag => tag !== value);
            $(this).parent().remove();
            updateHiddenInput();
        });
        function updateHiddenInput() { $('#tagsHidden').val(tags.join(',')); }

        // ── Sizes ──
        let sizes = [];
        $('#sizeInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !sizes.includes(value)) {
                    sizes.push(value);
                    $('#sizeContainer').prepend(`
                        <div class="apf-chip tag">
                            ${value}
                            <span class="apf-chip__remove remove-size" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updateSizeHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-size', function () {
            let value = $(this).data('value');
            sizes = sizes.filter(size => size !== value);
            $(this).parent().remove();
            updateSizeHiddenInput();
        });
        function updateSizeHiddenInput() { $('#sizeHidden').val(sizes.join(',')); }

        // ── Keywords ──
        let keywords = [];
        $('#keywordInput').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                let value = $(this).val().trim();
                if (value !== '' && !keywords.includes(value)) {
                    keywords.push(value);
                    $('#keywordContainer').prepend(`
                        <div class="apf-chip tag">
                            ${value}
                            <span class="apf-chip__remove remove-keyword" data-value="${value}">&times;</span>
                        </div>
                    `);
                    $(this).val('');
                    updatekeywordHiddenInput();
                }
            }
        });
        $(document).on('click', '.remove-keyword', function () {
            let value = $(this).data('value');
            keywords = keywords.filter(keyword => keyword !== value);
            $(this).parent().remove();
            updatekeywordHiddenInput();
        });
        function updatekeywordHiddenInput() { $('#keywordsHidden').val(keywords.join(',')); }

        // ── FAQs ──
        let faqIndex = 0;
        $('#addFaq').click(function () {
            $('#faqEmptyState').hide();
            let html = `
            <div class="faq-row apf-dynamic-row border p-2 mb-2">
                <div class="apf-dynamic-row__head">
                    <span class="apf-dynamic-row__label">FAQ #${faqIndex + 1}</span>
                    <button type="button" class="apf-row-remove removeFaq"><i class="lni lni-close"></i></button>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="apf-field">
                            <label class="apf-label">Question</label>
                            <input type="text" name="faqs[${faqIndex}][question]" class="form-control apf-input" placeholder="Enter question">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="apf-field">
                            <label class="apf-label">Answer</label>
                            <textarea name="faqs[${faqIndex}][answer]" class="form-control apf-input apf-textarea--sm" placeholder="Enter answer"></textarea>
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

        // ── Sections ──
        let sectionIndex = 0;
        $('#addSection').click(function () {
            $('#sectionEmptyState').hide();
            let html = `
            <div class="section-row apf-dynamic-row border p-2 mb-2">
                <div class="apf-dynamic-row__head">
                    <span class="apf-dynamic-row__label">Section #${sectionIndex + 1}</span>
                    <button type="button" class="apf-row-remove removeSection"><i class="lni lni-close"></i></button>
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="apf-field">
                            <label class="apf-label">Type</label>
                            <select name="sections[${sectionIndex}][type]" class="form-control apf-input">
                                <option value="symbolism">Symbolism</option>
                                <option value="customisation">Customisation</option>
                                <option value="care">Care</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="apf-field">
                            <label class="apf-label">Title</label>
                            <input type="text" name="sections[${sectionIndex}][title]" class="form-control apf-input" placeholder="Section title">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="apf-field">
                            <label class="apf-label">Image</label>
                            <input type="file" name="sections[${sectionIndex}][image]" class="form-control apf-input">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="apf-field">
                            <label class="apf-label">Description</label>
                            <textarea name="sections[${sectionIndex}][description]" class="form-control apf-input apf-textarea--sm" placeholder="Section description"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            `;
            $('#sectionWrapper').append(html);
            sectionIndex++;
        });
        $(document).on('click', '.removeSection', function () {
            $(this).closest('.section-row').remove();
            if ($('#sectionWrapper .section-row').length === 0) $('#sectionEmptyState').show();
        });

    });
</script>
@endpush
