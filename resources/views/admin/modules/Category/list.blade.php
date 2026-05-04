@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'cat-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="cat-header">
            <div class="cat-header__left">
                <span class="cat-eyebrow">
                    Catalogue Management
                </span>
                <h2 class="cat-title">Product <em>Categories</em></h2>
                <p class="cat-subtitle">Manage and organise your product catalogue categories</p>
            </div>
            <div class="cat-header__right">
                <button class="cat-btn cat-btn--primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="lni lni-plus"></i> Add New Category
                </button>
            </div>
        </div>

        {{-- ══ STAT CARDS ══ --}}
        <div class="cat-stats">
            <div class="cat-stat-card cat-stat-card--green cat-fade-in">
                <div class="cat-stat-icon cat-stat-icon--green">
                    <i class="lni lni-grid-alt"></i>
                </div>
                <div class="cat-stat-body">
                    <div class="cat-stat-value" id="stat-total">—</div>
                    <div class="cat-stat-label">Total Categories</div>
                </div>
            </div>
            <div class="cat-stat-card cat-stat-card--teal cat-fade-in" style="animation-delay:.07s">
                <div class="cat-stat-icon cat-stat-icon--teal">
                    <i class="lni lni-checkmark-circle"></i>
                </div>
                <div class="cat-stat-body">
                    <div class="cat-stat-value" id="stat-active">—</div>
                    <div class="cat-stat-label">Active</div>
                </div>
            </div>
            <div class="cat-stat-card cat-stat-card--amber cat-fade-in" style="animation-delay:.14s">
                <div class="cat-stat-icon cat-stat-icon--amber">
                    <i class="lni lni-ban"></i>
                </div>
                <div class="cat-stat-body">
                    <div class="cat-stat-value" id="stat-inactive">—</div>
                    <div class="cat-stat-label">Inactive</div>
                </div>
            </div>
        </div>

        {{-- ══ TABLE CARD ══ --}}
        <div class="cat-card cat-fade-in" style="animation-delay:.20s">

            {{-- Card toolbar --}}
            <div class="cat-card__toolbar">
                <div class="cat-card__toolbar-left">
                    <div class="cat-card__toolbar-bar"></div>
                    <span class="cat-card__toolbar-title">All Categories</span>
                </div>
                <div class="cat-card__toolbar-right">
                    <button class="cat-btn cat-btn--primary cat-btn--sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="lni lni-plus"></i> Add Category
                    </button>
                </div>
            </div>

            {{-- DataTable controls row --}}
            <div class="cat-table-controls">
                <div id="cat-length-wrapper"></div>
                <div id="cat-search-wrapper"></div>
            </div>

            {{-- Table --}}
            <div class="cat-table-scroll">
                <table id="enquiryTable" @class(['table', 'display']) style="width:100%">
                    <thead>
                        <tr>
                            <th><h6>#</h6></th>
                            <th><h6>Image</h6></th>
                            <th><h6>Name</h6></th>
                            <th><h6>Is Active?</h6></th>
                            <th><h6>Action</h6></th>
                        </tr>
                    </thead>
                </table>
            </div>

            {{-- Footer --}}
            <div class="cat-table-footer">
                <div id="cat-info-wrapper"></div>
                <div id="cat-pagination-wrapper"></div>
            </div>

        </div>
        {{-- end table card --}}

    </div>
</section>

{{-- ══ ADD CATEGORY MODAL ══ --}}
<div class="modal fade cat-modal" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">
                <div class="cat-modal__header-left">
                    <div class="cat-modal__header-icon">
                        <i class="lni lni-grid-alt"></i>
                    </div>
                    <div>
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <p class="cat-modal__header-sub">Fill in the details to create a category</p>
                    </div>
                </div>
                <button type="button" class="cat-modal__close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="lni lni-close"></i>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">
                <form id="categoryForm">
                    @csrf
                    <div class="cat-modal__field">
                        <input type="hidden" name="id" id="categoryId">
                        <label class="cat-modal__label" for="categoryName">
                            Category Name <span class="cat-required">*</span>
                        </label>
                        <input
                            type="text"
                            id="categoryName"
                            name="name"
                            class="form-control cat-modal__input"
                            placeholder="e.g. Handwoven Textiles"
                            autocomplete="off"
                        >
                        <span class="cat-modal__hint">Use a clear, descriptive name for easy identification.</span>
                    </div>
                    <div class="cat-modal__field">
                        <label class="cat-modal__label">
                            Category Image
                        </label>
                        <!-- Image Preview -->
                        <div id="imagePreview" style="margin-top:10px;"></div>
                        <input 
                            type="file" 
                            name="image" 
                            id="categoryImage"
                            class="form-control cat-modal__input"
                            accept="image/*"
                        >
                    </div>
                </form>
            </div>

            {{-- Modal Footer --}}
            <div class="modal-footer">
                <button type="button" class="cat-btn cat-btn--ghost" data-bs-dismiss="modal">
                    <i class="lni lni-close"></i> Cancel
                </button>
                <button type="button" class="cat-btn cat-btn--primary" id="saveCategory">
                    <i class="lni lni-save"></i> Save Category
                </button>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $(document).ready(function () {

        // ── CSRF setup ──
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // ── DataTable Init ──
        let table = $('#enquiryTable').DataTable({
            processing: true,
            serverSide: true,
            stripeClasses: [],
            ajax: "{{ route('categories.index') }}",

            columns: [
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    render: function(data) {
                        return `<span class="cat-row-index">${data}</span>`;
                    }
                },
                {
                    data: 'image', name: 'image',
                    createdCell: function(td){ $(td).addClass('min-width'); },
                    render: function(data){ return `<p>${data}</p>`; }
                },
                {
                    data: 'name',
                    name: 'name',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        if (!data) return '<span class="cat-cell-empty">—</span>';
                        let formatted = data.charAt(0).toUpperCase() + data.slice(1).toLowerCase();
                        let initial = formatted.charAt(0).toUpperCase();
                        return `<div class="cat-name-cell">
                                    <div class="cat-cat-avatar">${initial}</div>
                                    <p class="cat-cell-name">${formatted}</p>
                                </div>`;
                    }
                },
                {
                    data: 'is_active',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                }
            ],

            initComplete: function () {
                // Move DataTable controls into custom slots
                $('#cat-length-wrapper').html($('#enquiryTable_length').detach());
                $('#cat-search-wrapper').html($('#enquiryTable_filter').detach());
                $('#cat-info-wrapper').html($('#enquiryTable_info').detach());
                $('#cat-pagination-wrapper').html($('#enquiryTable_paginate').detach());

                updateStats(this.api());
            },

            drawCallback: function () {
                updateStats(this.api());
                // Re-attach pagination/info after redraw
                $('#cat-info-wrapper').html($('#enquiryTable_info').detach());
                $('#cat-pagination-wrapper').html($('#enquiryTable_paginate').detach());
            }
        });

        // ── Stat card updater ──
        function updateStats(api) {
            let info = api.page.info();
            $('#stat-total').text(info.recordsTotal);

            let active = 0, inactive = 0;
            api.rows({ search: 'applied' }).data().each(function(d) {
                // is_active comes as rendered HTML from backend; count based on raw data if available
                // Fallback: count from rendered toggle value
                if (typeof d.is_active === 'string') {
                    if (d.is_active.includes('checked') || d.is_active.includes('1')) active++;
                    else inactive++;
                } else {
                    if (d.is_active == 1) active++;
                    else inactive++;
                }
            });
            $('#stat-active').text(active);
            $('#stat-inactive').text(inactive);
        }

        // ── Toggle status ──
        $(document).on('change', '.toggle-status', function() {
            let status = $(this).prop('checked') ? 1 : 0;
            let id = $(this).data('id');

            $.ajax({
                url: "{{ route('categories.updateStatus') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    alert('Status updated');
                }
            });
        });

        // ----- Edit -----
        $(document).on('click', '.editBtn', function () {

            let id = $(this).data('id');
            let name = $(this).data('name');
            let image = $(this).data('image');

            $('#categoryId').val(id);
            $('#categoryName').val(name);

            if (image) {
                $('#imagePreview').html(`<img src="/${image}" width="60">`);
            } else {
                $('#imagePreview').html('');
            }

            $('#addCategoryModal').modal('show');
        });

        // ── Delete ──
        $(document).on('click', '.dltBtn', function() {
            let id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/categories/delete/" + id,
                        type: "DELETE",
                        data: { _token: "{{ csrf_token() }}" },
                        success: function(response) {
                            Swal.fire('Deleted!', 'Category deleted successfully.', 'success');
                            $('.dataTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                        }
                    });
                }
            });
        });

        // ── Save Category ──
        $('#saveCategory').click(function () {
            let form = document.getElementById('categoryForm');
            let formData = new FormData(form);


            // let formData = {
            //     name: $('input[name="name"]').val(),
            //     _token: $('input[name="_token"]').val()
            // };

            let id = $('#categoryId').val();
            let url = id 
            ? "/admin/categories/" + id   // UPDATE
            : "{{ route('categories.store') }}"; // CREATE
            console.log("id => ", id);
            console.log("url => ", url);
            $.ajax({
                url: url,
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
                        });
                        $('#categoryForm')[0].reset();
                        $('#categoryId').val('');
                        $('#imagePreview').html('');
                        $('#addCategoryModal').modal('hide');
                        $('.dataTable').DataTable().ajax.reload();
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

        // ── Reset on modal close ──
        $('#addCategoryModal').on('hidden.bs.modal', function () {
            $('#categoryForm')[0].reset();
            $('#categoryId').val('');
            $('#imagePreview').html('');
        });

    });
</script>
@endpush
