@extends('admin.layouts.app')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

@endpush


@section('content')

{{-- ============================================================
     PRODUCTS PAGE — unique class .prd-page prevents CSS overlap
     ============================================================ --}}
<section class="prd-page">

    {{-- ── Header ── --}}
    <div class="prd-header prd-fade-in">
        <div class="prd-header__left">
            <div class="prd-header__eyebrow">Inventory Management</div>
            <h2 class="prd-header__title">Product <em>Catalogue</em></h2>
            <p class="prd-header__subtitle">Manage, organise and publish your product listings</p>
        </div>
        <div class="prd-header__actions">
            {{-- Bulk Upload — href & data-* attributes fully preserved --}}
            <a href="#" class="prd-btn prd-btn-secondary" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
                <i class="lni lni-upload"></i> Bulk Upload
            </a>
            {{-- Add New — original href preserved --}}
            <a href="/admin/products/add" class="prd-btn prd-btn-primary">
                <i class="lni lni-plus"></i> Add New Product
            </a>
        </div>
    </div>

    {{-- ── Stats Strip ── --}}
    <div class="prd-stats prd-fade-in">
        <div class="prd-stat-card prd-stat-card--green">
            <div class="prd-stat-icon prd-stat-icon--green"><i class="lni lni-package"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatTotal">—</div>
                <div class="prd-stat-label">Total Products</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--teal">
            <div class="prd-stat-icon prd-stat-icon--teal"><i class="lni lni-checkmark-circle"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatActive">—</div>
                <div class="prd-stat-label">Active</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--amber">
            <div class="prd-stat-icon prd-stat-icon--amber"><i class="lni lni-checkmark-circle"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatFeatured">—</div>
                <div class="prd-stat-label">Featured</div>
            </div>
        </div>
        <div class="prd-stat-card prd-stat-card--red">
            <div class="prd-stat-icon prd-stat-icon--red"><i class="lni lni-package"></i></div>
            <div>
                <div class="prd-stat-value" id="prdStatInactive">—</div>
                <div class="prd-stat-label">Inactive</div>
            </div>
        </div>
    </div>

    {{-- ── Table Card ── --}}
    <div class="prd-card prd-fade-in">

        <div class="prd-card__toolbar">
            <div class="prd-card__toolbar-left">
                <div class="prd-card__toolbar-bar"></div>
                <div class="prd-card__toolbar-title">All Products</div>
                <span class="prd-table-badge" id="prdBadgeCount">0 items</span>
            </div>
        </div>

        {{-- DataTables length + search injected here --}}
        <div class="prd-table-controls" id="prdTableControls"></div>

        <div class="prd-table-scroll">
            <table id="productTable" class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th><h6>#</h6></th>
                        <th><h6>Image</h6></th>
                        <th><h6>Name</h6></th>
                        <th><h6>Categories</h6></th>
                        <th><h6>Collections</h6></th>
                        <th><h6>Is Featured?</h6></th>
                        <th><h6>Status</h6></th>
                        <th><h6>Actions</h6></th>
                    </tr>
                </thead>
            </table>
        </div>

        {{-- DataTables info + pagination injected here --}}
        <div class="prd-table-footer" id="prdTableFooter"></div>

    </div>
    {{-- /.prd-card --}}

</section>
{{-- /.prd-page --}}


{{-- ══════════════════════════════════════════════════════
     BULK UPLOAD MODAL — all inputs & routes fully preserved
══════════════════════════════════════════════════════ --}}
<div class="modal fade prd-modal" id="bulkUploadModal" tabindex="-1" aria-labelledby="bulkUploadModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="bulkUploadModalLabel">Bulk Upload Products</h5>
                {{-- Download Sample CSV — route preserved exactly --}}
                <a href="{{ route('products.sample.csv') }}" class="prd-btn-csv" title="Download Sample CSV">
                    <i class="lni lni-download"></i> Sample CSV
                </a>
            </div>

            <div class="modal-body">
                <form id="bulkUploadForm" enctype="multipart/form-data">
                    @csrf

                    {{-- File input — name="file" preserved --}}
                    <div class="prd-upload-zone" id="prdUploadZone">
                        <input type="file" name="file" required id="prdFileInput">
                        <div class="prd-upload-zone__icon"><i class="lni lni-cloud-upload"></i></div>
                        <div class="prd-upload-zone__text">Drop your CSV file here</div>
                        <div class="prd-upload-zone__hint">or click to browse</div>
                        <div class="prd-selected-file" id="prdSelectedFile"></div>
                    </div>

                    <div class="prd-upload-hint">
                        <i class="lni lni-information"></i>
                        <span>CSV must include columns: <strong>name, price, description, categories</strong></span>
                    </div>

                    <div class="prd-modal-actions">
                        <button type="button" class="prd-btn prd-btn-ghost prd-btn-sm" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="prd-btn prd-btn-primary prd-btn-sm" id="prdUploadBtn">
                            <i class="lni lni-upload"></i> Upload
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function () {
    let isMoved = false;

    /* ── CSRF ── */
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    /* ══════════════════════════════
       DataTable — all columns & logic preserved exactly
    ══════════════════════════════ */
    let table = $('#productTable').DataTable({
        processing  : true,
        serverSide  : true,
        stripeClasses: [],
        ajax        : "{{ route('products.list') }}",
        dom         : '<"prd-dt-top"lf>t<"prd-dt-bot"ip>',
        language    : {
            search            : '',
            searchPlaceholder : 'Search products…',
            lengthMenu        : 'Show _MENU_ rows',
            processing        : '<span style="color:#3d5a2e;font-weight:600;font-family:\'Plus Jakarta Sans\',sans-serif">Loading…</span>',
            zeroRecords       : '<div style="padding:44px 24px;text-align:center;color:#8a9e78;font-family:\'Plus Jakarta Sans\',sans-serif">No products found matching your search</div>',
            emptyTable        : '<div style="padding:44px 24px;text-align:center;color:#8a9e78;font-family:\'Plus Jakarta Sans\',sans-serif">No products yet. Start by adding your first product!</div>',
            info              : 'Showing _START_–_END_ of _TOTAL_ products',
            infoEmpty         : 'No products to show',
            paginate          : { previous: '&#8592;', next: '&#8594;' }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            {
                data: 'image', name: 'image',
                createdCell: function(td){ $(td).addClass('min-width'); },
                render: function(data){ return `<p>${data}</p>`; }
            },
            {
                data: 'name', name: 'name',
                createdCell: function(td){ $(td).addClass('min-width'); },
                render: function(data){ return `<p>${data}</p>`; }
            },
            {
                data: 'categories', name: 'categories',
                createdCell: function(td){ $(td).addClass('min-width'); },
                render: function(data){ return `<p>${data}</p>`; }
            },
            {
                data: 'collections', name: 'collections',
                createdCell: function(td){ $(td).addClass('min-width'); },
                render: function(data){ return `<p>${data}</p>`; }
            },
            {
                data: 'is_featured',
                createdCell: function(td){ $(td).addClass('min-width'); },
                orderable: false, searchable: false
            },
            {
                data: 'is_active',
                createdCell: function(td){ $(td).addClass('min-width'); },
                orderable: false, searchable: false
            },
            { data: 'actions', orderable: false, searchable: false }
        ],
        drawCallback: function() {
            var api  = this.api();
            var info = api.page.info();

            if (!isMoved) {
                var dtTop = $('.prd-dt-top');
                var dtBot = $('.prd-dt-bot');

                if (dtTop.length) $('#prdTableControls').append(dtTop.children());
                if (dtBot.length) $('#prdTableFooter').append(dtBot.children());

                isMoved = true;
            }

            if (info && info.recordsTotal !== undefined) {
                $('#prdStatTotal').text(info.recordsTotal);
                $('#prdBadgeCount').text(info.recordsTotal + ' items');
            }
        }
    });

    /* ── Status Toggle — original logic preserved ── */
    $(document).on('change', '.toggle-status', function() {
        let status = $(this).prop('checked') ? 1 : 0;
        let id     = $(this).data('id');
        console.log("here => ", id, "== == ", status);
        $.ajax({
            url  : "/admin/products/update-status",
            type : "PUT",
            data : { _token: "{{ csrf_token() }}", id: id, status: status },
            success: function(response) {
                Swal.fire('Done!', 'Status updated successfully.', 'success');
            }
        });
    });

    /* ── Feature Toggle — original logic preserved ── */
    $(document).on('change', '.toggle-feature', function() {
        let feature = $(this).prop('checked') ? 1 : 0;
        let id      = $(this).data('id');
        $.ajax({
            url  : "/admin/products/update-feature",
            type : "PUT",
            data : { _token: "{{ csrf_token() }}", id: id, feature: feature },
            success: function(response) {
                Swal.fire('Done!', 'Updated successfully.', 'success');
            }
        });
    });

    /* ── Delete — original logic preserved ── */
    $(document).on('click', '.dltBtn', function() {
        let id = $(this).data('id');
        Swal.fire({
            title             : 'Are you sure?',
            text              : "You won't be able to revert this!",
            icon              : 'warning',
            showCancelButton  : true,
            confirmButtonColor: '#3d5a2e',
            cancelButtonColor : '#d94f3d',
            confirmButtonText : 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url  : "/admin/products/delete/" + id,
                    type : "DELETE",
                    data : { _token: "{{ csrf_token() }}" },
                    success: function(response) {
                        Swal.fire('Deleted!', 'Product deleted successfully.', 'success');
                        $('.dataTable').DataTable().ajax.reload();
                    },
                    error: function() {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });

    /* ── Bulk Upload — original logic preserved ── */
    $('#bulkUploadForm').submit(function(e) {
        e.preventDefault();
        let form     = this;
        let formData = new FormData(form);
        $.ajax({
            url         : "/admin/products-bulk-upload",
            type        : "POST",
            data        : formData,
            contentType : false,
            processData : false,
            beforeSend  : function() {
                $('#prdUploadBtn').prop('disabled', true).html('<i class="lni lni-spinner-arrow"></i> Uploading…');
            },
            success: function(res) {
                Swal.fire({ icon: 'success', title: 'Success', text: res.message });
                form.reset();
                $('#prdSelectedFile').hide().text('');
                $('#prdUploadZone .prd-upload-zone__text').text('Drop your CSV file here');
                $('#bulkUploadModal').modal('hide');
                $('#productTable').DataTable().ajax.reload();
            },
            error: function(err) {
                let message = 'Upload failed';
                if (err.responseJSON && err.responseJSON.message) {
                    message = err.responseJSON.message;
                }
                Swal.fire({ icon: 'error', title: 'Error', text: message });
                form.reset();
            },
            complete: function() {
                $('#prdUploadBtn').prop('disabled', false).html('<i class="lni lni-upload"></i> Upload');
            }
        });
    });

    /* ── File name display ── */
    $(document).on('change', '#prdFileInput', function() {
        if (this.files[0]) {
            $('#prdSelectedFile').text('✓ ' + this.files[0].name).show();
            $('#prdUploadZone .prd-upload-zone__text').text('File ready to upload');
        }
    });

});
</script>
@endpush
