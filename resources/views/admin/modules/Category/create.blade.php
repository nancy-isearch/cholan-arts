@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'edit-product-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="epf-header">
            <div class="epf-header__left">
                <span class="epf-eyebrow">
                    Catalogue Management
                </span>
                <h2 class="epf-title">Add New <em>Category</em></h2>
                <p class="epf-subtitle">Fill in the details to create a new category</p>
            </div>
            <div class="epf-header__right">
                <a href="{{ route('categories.index') }}" class="btn btn-primary epf-btn epf-btn--ghost">
                    <i class="lni lni-arrow-left"></i> Back to Categories
                </a>
            </div>
        </div>

        <form id="categoryForm">
            @csrf

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
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Category Name <span class="epf-required">*</span></label>
                                        <input type="text" name="name" class="form-control epf-input" placeholder="e.g. Handwoven Textiles" autocomplete="off">
                                        <small class="epf-field-hint">Use a clear, descriptive name for easy identification.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="epf-field">
                                        <label class="epf-label">Category Image</label>
                                        <input type="file" name="image" class="form-control epf-input" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Hero Text</label>
                                        <textarea name="hero_text" class="form-control epf-input epf-textarea--sm" rows="3" placeholder="Enter hero text"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── FOOTER CONTENT ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.08s">
                        <div class="epf-card__head">
                            <span class="epf-card__head-title">
                                <i class="lni lni-layout"></i> Footer Section
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Footer Title (H2)</label>
                                        <input type="text" name="footer_title" class="form-control epf-input" placeholder="Enter footer title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Footer Content</label>
                                        <textarea name="footer_content" class="form-control epf-input epf-textarea" rows="4" placeholder="Enter footer paragraph"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── FAQs ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.12s">
                        <div class="epf-card__head epf-card__head--split">
                            <div class="epf-card__head-left">
                                <span class="epf-card__head-title">
                                    <i class="lni lni-question-circle"></i> FAQs
                                </span>
                            </div>
                            <button type="button" class="epf-btn epf-btn--add" id="addFaqBtn">
                                <i class="lni lni-plus"></i> Add FAQ
                            </button>
                        </div>
                        <div class="epf-card__body epf-card__body--faq" id="faqContainer">
                            <div class="epf-empty-state" id="faqEmptyState">
                                <i class="lni lni-question-circle"></i>
                                <p>No FAQs yet. Click <strong>Add FAQ</strong> to get started.</p>
                            </div>
                        </div>
                    </div>

                    {{-- ── FAQ JSON SCHEMA ── --}}
                    <div class="epf-card epf-fade-in" style="animation-delay:.14s">
                        <div class="epf-card__head">
                            <span class="epf-card__head-title">
                                <i class="lni lni-code"></i> FAQ JSON Schema
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="epf-field">
                                <label class="epf-label">JSON Schema (Optional)</label>
                                <textarea name="faq_json_schema" class="form-control epf-input epf-textarea" rows="6" placeholder="Paste your JSON-LD script here..."></textarea>
                                <small class="epf-field-hint">Paste the JSON-LD script for FAQs here for SEO purposes.</small>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- ══════ RIGHT / SIDEBAR COLUMN ══════ --}}
                <div class="epf-col-side">
                    <div class="epf-save-card epf-fade-in" style="animation-delay:.16s">
                        <div class="epf-save-card__body">
                            <p class="epf-save-card__hint">
                                <i class="lni lni-shield-check"></i>
                                Review all details carefully before saving. This will immediately create the category.
                            </p>
                            <button type="button" class="btn btn-primary epf-btn epf-btn--submit" id="saveCategory">
                                <i class="lni lni-save"></i>
                                Save Category
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    // ── FAQs Dynamic Fields ──
    let faqIndex = 0;
    function addFaqField(question = '', answer = '') {
        $('#faqEmptyState').hide();
        // Determine the visual number based on current count
        let visualNumber = $('#faqContainer .faq-row').length + 1;
        
        let html = `
            <div class="faq-row epf-dynamic-row">
                <div class="epf-dynamic-row__head">
                    <span class="epf-dynamic-row__label">FAQ #${visualNumber}</span>
                    <button type="button" class="epf-row-remove removeFaqBtn"><i class="lni lni-close"></i></button>
                </div>
                <div class="row g-3">
                    <div class="col-md-5">
                        <div class="epf-field">
                            <label class="epf-label">Question</label>
                            <input type="text" name="faqs[${faqIndex}][question]" class="form-control epf-input" placeholder="Question" value="${question.replace(/"/g, '&quot;')}">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="epf-field">
                            <label class="epf-label">Answer</label>
                            <textarea name="faqs[${faqIndex}][answer]" class="form-control epf-input epf-textarea--sm" rows="2" placeholder="Answer">${answer}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('#faqContainer').append(html);
        faqIndex++;
    }

    $('#addFaqBtn').click(function() {
        addFaqField();
    });

    function updateFaqNumbers() {
        $('#faqContainer .faq-row').each(function(index) {
            $(this).find('.epf-dynamic-row__label').text('FAQ #' + (index + 1));
        });
    }

    $(document).on('click', '.removeFaqBtn', function() {
        $(this).closest('.faq-row').remove();
        updateFaqNumbers();
        if ($('#faqContainer .faq-row').length === 0) $('#faqEmptyState').show();
    });

    // ── Save Category ──
    $('#saveCategory').click(function () {
        let form = document.getElementById('categoryForm');
        let formData = new FormData(form);

        $.ajax({
            url: "{{ route('categories.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message
                    }).then(() => {
                        window.location.href = "{{ route('categories.index') }}";
                    });
                }
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    $.each(errors, function(key, value) {
                        Swal.fire('Error!', value[0], 'error');
                    });
                }
            }
        });
    });
});
</script>
@endpush
