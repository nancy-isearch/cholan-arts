@extends('admin.layouts.app')

@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
                <div @class(['row', 'align-items-center'])>
                    <div @class(['col-md-6'])>
                        <div @class(['title'])>
                            <h2>Edit Product</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div @class(['col-md-6'])>
                        <div @class(['breadcrumb-wrapper'])>
                            <a href="/admin/products" class="btn btn-primary">
                                Back
                            </A>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div @class(['row'])>
              <div @class(['col-lg-12'])>
                <div @class(['card-style', 'mb-30'])>
                  <div @class(['table-wrapper', 'table-responsive'])>

                        <form id="productForm" enctype="multipart/form-data">
                            @csrf
                            @method('POST')

                            <input type="hidden" id="productId" value="{{ $product->id }}">
                            <input type="hidden" id="oldTags" value="{{ $product->tags }}">
                            <input type="hidden" id="oldSizes" value="{{ $product->available_sizes }}">
                            <input type="hidden" id="oldKeywords" value="{{ $product->meta_keywords }}">

                            <!-- Basic Info -->
                            <div class="card mb-3">
                                <div class="card-body row">

                                    <div class="col-md-6 mb-2">
                                        <label>Name</label>
                                        <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                        <small class="text-danger error-text name_error"></small>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label>Sub Title</label>
                                        <input type="text" name="sub_title" class="form-control" value="{{ $product->sub_title }}" />
                                        <small class="text-danger error-text sub_title_error"></small>
                                    </div>

                                    <!-- Category -->
                                    <div @class(['col-md-4', 'mb-2'])>
                                        <label>Category</label>
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

                                    <div class="col-md-4 mb-2">
                                        <label>Price</label>
                                        <input type="number" name="price" value="{{ $product->price }}" class="form-control">
                                        <small class="text-danger error-text price_error"></small>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Discount (in %age)</label>
                                        <input type="number" name="discount" value="{{ $product->discount }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label>Description</label>
                                        <textarea name="description" id="description" class="form-control" rows=6>{{ $product->description }}</textarea>
                                        <small class="text-danger error-text description_error"></small>
                                    </div>

                                    <!-- About title -->
                                    <div @class(['col-md-6', 'mb-2'])>
                                        <label>About Title</label>
                                        <input type="text" name="about_title" @class(['form-control']) value="{{ $product->about_title }}">
                                    </div>

                                    <!-- About Image -->
                                    <div @class(['col-md-6', 'mb-2'])>
                                        <label>About Image</label>
                                        @if($product->about_image)
                                        <div class="row">
                                            <div class="col-md-2 position-relative image-box">
                                                <img src="{{ asset('uploads/products/'.$product->id .'/'.$product->about_image) }}" class="img-fluid rounded">
                                            </div>
                                        </div>
                                        @endif
                                        <input type="file" name="about_image" @class(['form-control'])>
                                    </div>

                                    <!-- About Description -->
                                    <div @class(['col-md-12', 'mb-2'])>
                                        <label>About Description</label>
                                        <textarea name="about_description" id="about_description" @class(['form-control'])>{{ $product->about_description }}</textarea>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Material</label>
                                        <input type="text" name="material" value="{{ $product->material }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Finish</label>
                                        <input type="text" name="finish" value="{{ $product->finish }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Technique</label>
                                        <input type="text" name="technique" value="{{ $product->technique }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Origin</label>
                                        <input type="text" name="origin" value="{{ $product->origin }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Delivery</label>
                                        <input type="text" name="delivery" value="{{ $product->delivery }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Stock</label>
                                        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>GI Certified</label>
                                        <input type="text" name="gi_certified" value="{{ $product->gi_certified }}" @class(['form-control'])>
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Available Sizes</label>
                                        <div class="tag-container form-control d-flex flex-wrap" id="sizeContainer">
                                            <input type="text" id="sizeInput" class="border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="available_sizes" id="sizeHidden">
                                    </div>

                                    <div class="col-md-4 mb-2">
                                        <label>Tags</label>
                                        <div class="tag-container form-control d-flex flex-wrap" id="tagContainer">
                                            <input type="text" id="tagInput" class="border-0 flex-grow-1">
                                        </div>
                                        <input type="hidden" name="tags" id="tagsHidden">
                                    </div>
                                </div>
                            </div>

                            <!-- Feature Image -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label>Feature Image</label>
                                    <div class="row">
                                        <div class="col-md-2 position-relative image-box">
                                            <img src="{{ asset('uploads/products/'.$product->id .'/'.$product->feature_image) }}" class="img-fluid rounded">
                                        </div>
                                    </div>
                                    <input type="file" name="feature_image" @class(['form-control', 'mt-2'])>
                                </div>
                            </div>

                            <!-- Images -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <label>Existing Images</label><br>
                                    <div class="row">
                                        @foreach($product->images as $img)
                                            <div class="col-md-2 position-relative image-box" id="image-{{ $img->id }}">
                                                <img src="{{ asset('uploads/products/'.$product->id .'/'.$img->image) }}" class="img-fluid rounded">
                                                <span class="delete-image" data-id="{{ $img->id }}">
                                                    &times;
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input type="file" name="images[]" multiple class="form-control mt-2">
                                </div>
                            </div>
                            <!-- SEO Details -->
                            <div @class(['card', 'mb-3'])>
                                <div @class(['card-header'])>SEO Details</div>
                                <div @class(['card-body'])>
                                    <div @class(['row'])>
                                        <div @class(['col-md-6'])>
                                            <label>Meta Title</label>
                                            <input type="text" name="meta_title" @class(['form-control']) value="{{ $product->meta_title }}">
                                        </div>
                                        <div @class(['col-md-6'])>
                                            <label>Meta Keywords</label>
                                            <div @class(['tag-container', 'form-control', 'd-flex', 'flex-wrap']) id="keywordContainer">
                                                <input type="text" id="keywordInput" placeholder="Type and press Enter" @class(['border-0', 'flex-grow-1'])>
                                            </div>

                                            <!-- Hidden input -->
                                            <input type="hidden" name="meta_keywords" id="keywordsHidden">
                                        </div>
                                    </div>
                                    <div @class(['row'])>
                                        <div @class(['col-md-12'])>
                                            <label>Meta Description</label>
                                            <textarea name="meta_description" @class(['form-control'])>{{ $product->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sections -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    Sections
                                    <button type="button" id="addSection" class="btn btn-success btn-sm float-end">+ Add</button>
                                </div>
                                <div class="card-body" id="sectionWrapper">
                                    @foreach($product->sections as $key => $section)
                                        <div class="section-row border rounded p-3 mb-3 bg-light">
                                            <div class="row align-items-center g-2">

                                                <!-- TYPE -->
                                                <div class="col-md-2">
                                                    <select name="sections[{{ $key }}][type]" class="form-control">
                                                        <option value="symbolism" {{ $section->type=='symbolism'?'selected':'' }}>Symbolism</option>
                                                        <option value="customisation" {{ $section->type=='customisation'?'selected':'' }}>Customisation</option>
                                                        <option value="care" {{ $section->type=='care'?'selected':'' }}>Care</option>
                                                    </select>
                                                </div>

                                                <!-- TITLE -->
                                                <div class="col-md-4">
                                                    <input type="text" 
                                                        name="sections[{{ $key }}][title]" 
                                                        value="{{ $section->title }}" 
                                                        class="form-control" 
                                                        placeholder="Title">
                                                </div>
                                                <!-- IMAGE UPLOAD -->
                                                <div class="col-md-2">
                                                    <input type="file" 
                                                        name="sections[{{ $key }}][image]" 
                                                        class="form-control">
                                                </div>
                                                <!-- IMAGE PREVIEW -->
                                                <div class="col-md-4 text-center">
                                                    @if($section->image)
                                                        <img src="{{ asset('uploads/products/'.$product->id .'/'.$section->image) }}" 
                                                            class="img-fluid rounded mb-1" 
                                                            style="height:60px; object-fit:cover;">
                                                    @endif
                                                </div>

                                                <!-- DESCRIPTION -->
                                                <div class="col-md-11">
                                                    <textarea name="sections[{{ $key }}][description]" 
                                                            class="form-control" 
                                                            rows="6"
                                                            placeholder="Description">{{ $section->description }}</textarea>
                                                </div>

                                                <!-- REMOVE BUTTON -->
                                                <div class="col-md-1 text-end">
                                                    <button type="button" class="btn btn-danger removeSection">✕</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <button class="btn btn-primary">Update Product</button>
                        </form>
                        <!-- end form -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
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
            $('.select2').select2({
                placeholder: "Select Categories",
                allowClear: true
            });
            let sectionIndex = {{ count($product->sections) }};;

            // Add Section
            $('#addSection').click(function () {
                let html = `
                <div @class(['section-row', 'border', 'p-2', 'mb-2'])>
                    <div @class(['row'])>

                        <div @class(['col-md-3'])>
                            <select name="sections[${sectionIndex}][type]" @class(['form-control'])>
                                <option value="symbolism">Symbolism</option>
                                <option value="customisation">Customisation</option>
                                <option value="care">Care</option>
                            </select>
                        </div>

                        <div @class(['col-md-3'])>
                            <input type="text" name="sections[${sectionIndex}][title]" @class(['form-control']) placeholder="Title">
                        </div>

                        <div @class(['col-md-5'])>
                            <textarea name="sections[${sectionIndex}][description]" @class(['form-control']) placeholder="Description"></textarea>
                        </div>

                        <div @class(['col-md-1'])>
                            <button type="button" @class(['btn', 'btn-danger', 'removeSection'])>X</button>
                        </div>

                    </div>
                </div>
                `;

                $('#sectionWrapper').append(html);
                sectionIndex++;
            });

            // Remove Section
            $(document).on('click', '.removeSection', function () {
                $(this).closest('.section-row').remove();
            });

            // AJAX Submit
            $('#productForm').submit(function (e) {
                e.preventDefault();
                let id = $('#productId').val();
                // CKEditor data sync
                for (instance in CKEDITOR.instances) {
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

            //tags
            let oldTags = $('#oldTags').val();
            if (oldTags) {
                tags = oldTags.split(',');

                tags.forEach(tag => {
                    $('#tagContainer').prepend(`
                        <div class="tag">
                            ${tag}
                            <span class="remove-tag" data-value="${tag}">&times;</span>
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
                            <div @class(['tag'])>
                                ${value}
                                <span @class(['remove-tag']) data-value="${value}">&times;</span>
                            </div>
                        `);

                        $(this).val('');
                        updateHiddenInput();
                    }
                }
            });

            // Remove tag
            $(document).on('click', '.remove-tag', function () {
                let value = $(this).data('value');
                tags = tags.filter(tag => tag != value);
                $(this).parent().remove();
                updateHiddenInput();
            });

            // Update hidden input (comma separated)
            function updateHiddenInput() {
                $('#tagsHidden').val(tags.join(','));
            }

            //sizes
            let oldSizes = $('#oldSizes').val();
            if (oldSizes) {
                sizes = oldSizes.split(',');

                sizes.forEach(size => {
                    $('#sizeContainer').prepend(`
                        <div class="tag">
                            ${size}
                            <span class="remove-size" data-value="${size}">&times;</span>
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
                            <div @class(['tag'])>
                                ${value}
                                <span @class(['remove-size']) data-value="${value}">&times;</span>
                            </div>
                        `);

                        $(this).val('');
                        updateSizeHiddenInput();
                    }
                }
            });

            // Remove size
            $(document).on('click', '.remove-size', function () {
                let value = $(this).data('value');
                console.log("value => ", value)
                console.log("sizes => ", sizes)
                sizes = sizes.filter(size => size != value);
                console.log("sizes => ", sizes)
                $(this).parent().remove();
                updateSizeHiddenInput();
            });

            // Update hidden input (comma separated)
            function updateSizeHiddenInput() {
                $('#sizeHidden').val(sizes.join(','));
            }


            //keywords
            let oldKeywords = $('#oldKeywords').val();
            if (oldKeywords) {
                keywords = oldKeywords.split(',');

                keywords.forEach(keyword => {
                    $('#keywordContainer').prepend(`
                        <div class="tag">
                            ${keyword}
                            <span class="remove-keyword" data-value="${keyword}">&times;</span>
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
                            <div @class(['tag'])>
                                ${value}
                                <span @class(['remove-keyword']) data-value="${value}">&times;</span>
                            </div>
                        `);

                        $(this).val('');
                        updatekeywordHiddenInput();
                    }
                }
            });

            // Remove keyword
            $(document).on('click', '.remove-keyword', function () {
                let value = $(this).data('value');
                keywords = keywords.filter(keyword => keyword != value);
                $(this).parent().remove();
                updatekeywordHiddenInput();
            });

            // Update hidden input (comma separated)
            function updatekeywordHiddenInput() {
                $('#keywordHidden').val(keywords.join(','));
            }
        });
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
                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (res) {
                            if (res.status) {

                                Swal.fire('Deleted!', res.message, 'success');

                                // remove image from UI
                                $('#image-' + id).remove();
                            }
                        }
                    });

                }
            });

        });
    </script>

@endpush