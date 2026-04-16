@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="container-fluid">

        <!-- Title -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="title">
                        <h2>Add Page</h2>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="breadcrumb-wrapper">
                        <a href="/admin/pages" class="btn btn-primary">Back</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Form -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-style mb-30">
                    <div class="table-wrapper table-responsive">

                        <form id="pageForm" enctype="multipart/form-data">
                            @csrf

                            <!-- Basic Info -->
                            <div class="card mb-3">
                                <div class="card-header">Basic Info</div>
                                <div class="card-body">

                                    <div class="row">

                                        <!-- Title -->
                                        <div class="col-md-6 mb-2">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control">
                                            <small class="text-danger error-text title_error"></small>
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-md-6 mb-2">
                                            <label>Slug</label>
                                            <input type="text" name="slug" class="form-control">
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6 mb-2">
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
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
                                            <input type="text" name="hero_title" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Hero Subtitle</label>
                                            <input type="text" name="hero_subtitle" class="form-control">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label>Hero Image</label>
                                            <input type="file" name="hero_image" class="form-control">
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <!-- Content -->
                            <div class="card mb-3">
                                <div class="card-header">Page Content</div>
                                <div class="card-body">

                                    <textarea name="content" id="editor" class="form-control"></textarea>
                                    <small class="text-danger error-text content_error"></small>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Save Page</button>

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
    $(document).ready(function () {

        // Auto slug generate
        $('[name="title"]').keyup(function () {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-');

            $('[name="slug"]').val(slug);
        });

        // Submit
        $('#pageForm').submit(function (e) {
            e.preventDefault();

            tinymce.triggerSave();
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('pages.store') }}",
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
                            window.location.href = "/admin/pages";
                        });
                    }
                },

                error: function (err) {
                    if (err.status === 422) {
                        let errors = err.responseJSON.errors;

                        $('.error-text').text('');

                        $.each(errors, function (key, value) {
                            $('.' + key + '_error').text(value[0]);
                        });

                    } else {
                        Swal.fire('Error!', 'Something went wrong', 'error');
                    }
                }
            });

        });

    });

</script>
@endpush