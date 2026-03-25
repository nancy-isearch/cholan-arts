@extends('admin.layouts.app')

@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
                <div @class(['row', 'align-items-center'])>
                    <div @class(['col-md-6'])>
                        <div @class(['title'])>
                            <h2>Add Product</h2>
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

                        <!-- Basic Info -->
                        <div @class(['card', 'mb-3'])>
                            <div @class(['card-header'])>Basic Info</div>
                                <div @class(['card-body'])>

                                    <div @class(['row'])>

                                        <!-- Name -->
                                        <div @class(['col-md-6', 'mb-2'])>
                                            <label>Name</label>
                                            <input type="text" name="name" @class(['form-control'])>
                                            <small class="text-danger error-text name_error"></small>
                                        </div>

                                        <!-- Subtitle -->
                                        <div @class(['col-md-6', 'mb-2'])>
                                            <label>Subtitle</label>
                                            <input type="text" name="sub_title" @class(['form-control']) />
                                            <small class="text-danger error-text sub_title_error"></small>
                                        </div>

                                        <!-- Category -->
                                        <div @class(['col-md-6', 'mb-2'])>
                                            <label>Category</label>
                                            <select name="category_id[]" class="form-control category-select" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ isset($product) && $product->categories->contains($category->id) ? 'selected' : '' }}>
                                                        {{ ucfirst($category->name) }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger error-text category_id_error"></small>
                                        </div>

                                        <!-- Price -->
                                        <div @class(['col-md-3', 'mb-2'])>
                                            <label>Price</label>
                                            <input type="number" name="price" @class(['form-control'])>
                                            <small class="text-danger error-text price_error"></small>
                                        </div>

                                        <!-- Discount -->
                                        <div @class(['col-md-3', 'mb-2'])>
                                            <label>Discount (in %age)</label>
                                            <input type="number" name="discount" @class(['form-control'])>
                                            <small class="text-danger error-text discount_error"></small>
                                        </div>

                                        <!-- Description -->
                                        <div @class(['col-md-12', 'mb-2'])>
                                            <label>Description</label>
                                            <textarea name="description" id="description" @class(['form-control'])></textarea>
                                            <small class="text-danger error-text description_error"></small>
                                        </div>

                                        <!-- About title -->
                                        <div @class(['col-md-6', 'mb-2'])>
                                            <label>About Title</label>
                                            <input type="text" name="about_title" @class(['form-control'])>
                                        </div>

                                        <!-- About Image -->
                                        <div @class(['col-md-6', 'mb-2'])>
                                            <label>About Image</label>
                                            <input type="file" name="about_image" @class(['form-control'])>
                                        </div>

                                        <!-- About Description -->
                                        <div @class(['col-md-12', 'mb-2'])>
                                            <label>About Description</label>
                                            <textarea name="about_description" id="about_description" @class(['form-control'])></textarea>
                                        </div>

                                        <!-- Material -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Material</label>
                                            <input type="text" name="material" @class(['form-control'])>
                                        </div>

                                        <!-- Finish -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Finish</label>
                                            <input type="text" name="finish" @class(['form-control'])>
                                        </div>

                                        <!-- Technique -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Technique</label>
                                            <input type="text" name="technique" @class(['form-control'])>
                                        </div>

                                        <!-- Origin -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Origin</label>
                                            <input type="text" name="origin" @class(['form-control'])>
                                        </div>

                                        <!-- Delivery -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Delivery Info</label>
                                            <input type="text" name="delivery" @class(['form-control'])>
                                        </div>

                                        <!-- Stock -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Stock</label>
                                            <input type="number" name="stock" @class(['form-control'])>
                                        </div>

                                        <!-- GI Certified -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>GI Certified</label>
                                            <input type="text" name="gi_certified" @class(['form-control'])>
                                        </div>

                                        <!-- Tags -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Tags</label>
                                            <div @class(['tag-container', 'form-control', 'd-flex', 'flex-wrap']) id="tagContainer">
                                                <input type="text" id="tagInput" placeholder="Type and press Enter" @class(['border-0', 'flex-grow-1'])>
                                            </div>

                                            <!-- Hidden input -->
                                            <input type="hidden" name="tags" id="tagsHidden">
                                        </div>

                                        <!-- Available Sizes -->
                                        <div @class(['col-md-4', 'mb-2'])>
                                            <label>Available Sizes</label>
                                            <div @class(['tag-container', 'form-control', 'd-flex', 'flex-wrap']) id="sizeContainer">
                                                <input type="text" id="sizeInput" placeholder="Type and press Enter (e.g. 6'', 12'')" @class(['border-0', 'flex-grow-1'])>
                                            </div>
                                            <!-- Hidden input -->
                                            <input type="hidden" name="available_sizes" id="sizeHidden">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Feature Image -->
                            <div @class(['card', 'mb-3'])>
                                <div @class(['card-header'])>Feature Image</div>
                                <div @class(['card-body'])>
                                    <input type="file" name="feature_image" @class(['form-control'])>
                                </div>
                            </div>

                            <!-- Images -->
                            <div @class(['card', 'mb-3'])>
                                <div @class(['card-header'])>Product Images</div>
                                <div @class(['card-body'])>
                                    <input type="file" name="images[]" multiple @class(['form-control'])>
                                </div>
                            </div>
                            <!-- SEO Details -->
                            <div @class(['card', 'mb-3'])>
                                <div @class(['card-header'])>SEO Details</div>
                                <div @class(['card-body'])>
                                    <div @class(['row'])>
                                        <div @class(['col-md-6'])>
                                            <label>Meta Title</label>
                                            <input type="text" name="meta_title" @class(['form-control'])>
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
                                            <textarea name="meta_description" @class(['form-control'])></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sections -->
                            <div @class(['card', 'mb-3'])>
                                <div @class(['card-header'])>
                                    Sections (Tabs Data)
                                    <button type="button" @class(['btn', 'btn-sm', 'btn-success', 'float-end']) id="addSection">+ Add</button>
                                </div>

                                <div @class(['card-body']) id="sectionWrapper">
                                </div>
                            </div>

                            <button type="submit" @class(['btn', 'btn-primary'])>Save Product</button>
                        </div>
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
        $(document).ready(function () {
            $('.category-select').select2({
                placeholder: "Select Categories",
                allowClear: true,
                width: '100%'
            });
            let sectionIndex = 0;

            // Add Section
            $('#addSection').click(function () {
                let html = `
                <div @class(['section-row', 'border', 'p-2', 'mb-2'])>
                    <div @class(['row mb-2'])>
                        <div @class(['col-md-11'])>
                        </div>
                        <div @class(['col-md-1'])>
                            <button type="button" @class(['btn', 'btn-danger', 'removeSection'])>X</button>
                        </div>
                    </div>
                    <div @class(['row mb-2'])>
                        <div @class(['col-md-4'])>
                            <select name="sections[${sectionIndex}][type]" @class(['form-control'])>
                                <option value="symbolism">Symbolism</option>
                                <option value="customisation">Customisation</option>
                                <option value="care">Care</option>
                            </select>
                        </div>
                        <div @class(['col-md-4'])>
                            <input type="text" name="sections[${sectionIndex}][title]" @class(['form-control']) placeholder="Title">
                        </div>
                        <div @class(['col-md-4'])>
                            <input type="file" name="sections[${sectionIndex}][image]" @class(['form-control'])>
                        </div>
                    </div>
                    <div @class(['row'])>
                        <div @class(['col-md-12'])>
                            <textarea name="sections[${sectionIndex}][description]" @class(['form-control']) placeholder="Description"></textarea>
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
                // CKEditor data sync
                for (instance in CKEDITOR.instances) {
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

            //tags
            let tags = [];
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
                tags = tags.filter(tag => tag !== value);
                $(this).parent().remove();
                updateHiddenInput();
            });

            // Update hidden input (comma separated)
            function updateHiddenInput() {
                $('#tagsHidden').val(tags.join(','));
            }

            //sizes
            let sizes = [];
            $('#sizeInput').on('keypress', function (e) {
                if (e.which === 13) {
                    e.preventDefault();
                    let value = $(this).val().trim();
                    if (value !== '' && !tags.includes(value)) {
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

            // Remove tag
            $(document).on('click', '.remove-size', function () {
                let value = $(this).data('value');
                sizes = sizes.filter(size => size !== value);
                $(this).parent().remove();
                updateSizeHiddenInput();
            });

            // Update hidden input (comma separated)
            function updateSizeHiddenInput() {
                $('#sizeHidden').val(sizes.join(','));
            }

            //keywords
            let keywords = [];
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

            // Remove tag
            $(document).on('click', '.remove-keyword', function () {
                let value = $(this).data('value');
                keywords = keywords.filter(keyword => keyword !== value);
                $(this).parent().remove();
                updatekeywordHiddenInput();
            });

            // Update hidden input (comma separated)
            function updatekeywordHiddenInput() {
                $('#keywordsHidden').val(keywords.join(','));
            }
        });
    </script>

@endpush