@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">

        <!-- Header -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Edit Page</h2>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('pages.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="table-wrapper">
                        <form id="pageForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="pageId" value="{{ $page->id }}">
                            <!-- Basic Info -->
                            <div class="card mb-3">
                                <div class="card-header">Basic Info</div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Title -->
                                        <div class="col-md-6 mb-2">
                                            <label>Title</label>
                                            <input type="text" name="title" value="{{ $page->title }}" class="form-control">
                                            <small class="text-danger error-text title_error"></small>
                                        </div>
                                        <!-- Slug -->
                                        <div class="col-md-6 mb-2">
                                            <label>Slug</label>
                                            <input type="text" name="slug" value="{{ $page->slug }}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Hero Section -->
                            <div class="card mb-3">
                                <div class="card-header">Hero Section</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label>Hero Title</label>
                                            <input type="text" name="hero_title" value="{{ $page->hero_title }}" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Hero Subtitle</label>
                                            <input type="text" name="hero_subtitle" value="{{ $page->hero_subtitle }}" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-2">
                                            <label>Hero Image</label>
                                            @if($page->hero_image)
                                                <div class="mb-2">
                                                    <img src="{{ asset('uploads/pages/'.$page->hero_image) }}" width="120">
                                                </div>
                                            @endif
                                            <input type="file" name="hero_image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="card mb-3">
                                <div class="card-header">Page Content</div>
                                <div class="card-body">
                                    <textarea name="content" id="editor" class="form-control">{{ $page->content }}</textarea>
                                    <small class="text-danger error-text content_error"></small>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.0/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#editor',
        height: 400,

        plugins: [
            'image', 'link', 'lists', 'code', 'table'
        ],

        toolbar: `
            undo redo | styles | bold italic |
            alignleft aligncenter alignright |
            bullist numlist | link image | code
        `,

        automatic_uploads: true,
        images_upload_url: '/admin/editor/image-upload',

        images_upload_handler: function (blobInfo, success, failure) {
            let formData = new FormData();
            formData.append('file', blobInfo.blob());
            formData.append('_token', "{{ csrf_token() }}");

            fetch('/admin/editor/image-upload', {
                method: 'POST',
                body: formData
            })
            .then(res => res.json())
            .then(result => {
                success(result.location);
            })
            .catch(() => {
                failure('Upload failed');
            });
        }
    });

    $('#pageForm').submit(function(e){
        e.preventDefault();

        let id = $('#pageId').val();
        tinymce.triggerSave(); // 🔥 IMPORTANT
        let formData = new FormData(this);

        // ✅ CKEditor 5 content sync
        // formData.set('content', CKEDITOR.instances.editor.getData());
        formData.append('_method', 'PUT');

        $.ajax({
            url: "/admin/pages/" + id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(res){
                if(res.status){
                    Swal.fire('Success', res.message, 'success')
                    .then(()=>{
                        window.location.href = "/admin/pages";
                    });
                }
            },

            error: function(err){
                if(err.status === 422){
                    let errors = err.responseJSON.errors;
                    $('.error-text').text('');

                    $.each(errors, function(key, val){
                        $('.'+key+'_error').text(val[0]);
                    });
                }
            }
        });
    });
</script>
@endpush