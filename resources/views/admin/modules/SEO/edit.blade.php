@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'edit-product-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="epf-header">
            <div class="epf-header__left">
                <span class="epf-eyebrow">
                    SEO Management
                </span>
                <h2 class="epf-title">Edit <em>SEO Setting</em></h2>
                <p class="epf-subtitle">Update the details below to modify this setting</p>
            </div>
            <div class="epf-header__right">
                <a href="/admin/seo" class="btn btn-primary epf-btn epf-btn--ghost">
                    <i class="lni lni-arrow-left"></i> Back to List
                </a>
            </div>
        </div>

        {{-- ══ FORM ══ --}}
        <form id="seoForm" method="POST" action="{{ route('seo.update', $seoSetting->page_key) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')


            <div class="epf-layout">

                {{-- ══════ LEFT / MAIN COLUMN ══════ --}}
                <div class="epf-col-main">
                    {{-- ── BASIC INFO ── --}}
                    <div class="epf-card epf-fade-in">
                        <div class="epf-card__head">
                            <span class="epf-card__head-title">
                                <i class="lni lni-pencil-alt"></i> Basic SEO
                            </span>
                        </div>
                        <div class="epf-card__body">
                            <div class="row g-3">

                                {{-- Name --}}
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Title <span class="epf-required">*</span></label>
                                        <input type="text" name="meta_title" value="{{ old('meta_title', $seoSetting->meta_title) }}" class="form-control epf-input" placeholder="">
                                        <small class="text-danger error-text meta_title_error"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Keywords <span class="epf-required">*</span></label>
                                        <input type="text" class="form-control epf-input"  name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $seoSetting->meta_keywords) }}">
                                        <small class="text-danger error-text category_id_error"></small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Meta Description <span class="epf-required">*</span></label>

                                        <textarea class="form-control epf-input" name="meta_description" class="form-control" rows="3">{{ old('meta_description', $seoSetting->meta_description) }}</textarea>

                                        <small class="text-danger error-text meta_description_error"></small>
                                    </div>
                                </div>
                                {{-- Schema JSON --}}
                                <div class="col-md-12">
                                    <div class="epf-field">
                                        <label class="epf-label">Schema JSON</label>
                                        <textarea name="schema_json" id="about_description" class="form-control epf-input epf-textarea" rows="10">{{ old('schema_json', $seoSetting->schema_json) }}</textarea>
                                    </div>
                                </div>
                                 <!-- Submit -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">
                                        Save SEO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end left column --}}
            </div>
            {{-- end epf-layout --}}
           
        </form>
        {{-- end form --}}

    </div>
</section>
@endsection

@push('scripts')
<script>

    $(document).ready(function () {
        $('#seoForm').on('submit', function(e){
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);

            // clear old errors
            $('.text-danger').text('');

            $.ajax({
                url: $(form).attr('action'),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                beforeSend: function(){
                    $('button[type="submit"]').prop('disabled', true).text('Saving...');
                },

                success: function(response){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Details updated successfully'
                    }).then(() => {
                        window.location.href = "/admin/seo";
                    });
                },

                error: function(xhr){
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;

                        $.each(errors, function(key, value){
                            $('.error-' + key).text(value[0]);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong'
                        });
                    }
                },

                complete: function(){
                    $('button[type="submit"]').prop('disabled', false).text('Save SEO');
                }
            });
        });
    }); // end document.ready

</script>
@endpush
