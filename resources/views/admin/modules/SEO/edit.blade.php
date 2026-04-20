@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h2>Edit SEO - {{ ucfirst(str_replace('_', ' ', $seo->page_key)) }}</h2>
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('seo.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form id="seoForm" method="POST" action="{{ route('seo.update', $seo->page_key) }}" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <h5>Basic SEO</h5>
                </div>
                <div class="card-body">

                    <!-- Meta Title -->
                    <div class="mb-3">
                        <label class="form-label">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"
                               value="{{ old('meta_title', $seo->meta_title) }}">
                    </div>

                    <!-- Meta Description -->
                    <div class="mb-3">
                        <label class="form-label">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ old('meta_description', $seo->meta_description) }}</textarea>
                    </div>

                    <!-- Keywords -->
                    <div class="mb-3">
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control"
                               value="{{ old('meta_keywords', $seo->meta_keywords) }}">
                    </div>

                </div>
            </div>

            <!-- Schema -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Schema (JSON-LD)</h5>
                </div>
                <div class="card-body">

                    <div class="mb-3">
                        <label class="form-label">Schema JSON</label>
                        <textarea name="schema_json" class="form-control" rows="8">{{ old('schema_json', $seo->schema_json) }}</textarea>

                        <small class="text-muted">
                            Paste valid JSON-LD only (Organization, FAQ, Breadcrumb, etc.)
                        </small>
                    </div>

                </div>
            </div>

            <!-- Indexing -->
            {{-- <div class="card mb-4">
                <div class="card-header">
                    <h5>Search Engine Settings</h5>
                </div>
                <div class="card-body">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                               name="index_page" value="1"
                               {{ $seo->index_page ? 'checked' : '' }}>
                        <label class="form-check-label">
                            Allow Indexing (Enable for Google)
                        </label>
                    </div>

                </div>
            </div> --}}

            <!-- Submit -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">
                    Save SEO
                </button>
            </div>

        </form>

    </div>
</section>
@endsection
@push('scripts')
<script>
$(document).ready(function(){

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

});
</script>
@endpush

