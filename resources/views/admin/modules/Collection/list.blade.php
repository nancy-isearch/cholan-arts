@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'cat-page'])>
    <div class="container-fluid">

        {{-- HEADER --}}
        <div class="cat-header">
            <div class="cat-header__left">
                <span class="cat-eyebrow">Collection Management</span>
                <h2 class="cat-title">Product <em>Collections</em></h2>
                <p class="cat-subtitle">Manage and organise your collections</p>
            </div>
            <div class="cat-header__right">
                <button class="cat-btn cat-btn--primary" data-bs-toggle="modal" data-bs-target="#addCollectionModal">
                    <i class="lni lni-plus"></i> Add New Collection
                </button>
            </div>
        </div>

        {{-- STATS --}}
        <div class="cat-stats">
            <div class="cat-stat-card cat-stat-card--green">
                <div class="cat-stat-body">
                    <div id="stat-total">—</div>
                    <div>Total Collections</div>
                </div>
            </div>
            <div class="cat-stat-card cat-stat-card--teal">
                <div class="cat-stat-body">
                    <div id="stat-active">—</div>
                    <div>Active</div>
                </div>
            </div>
            <div class="cat-stat-card cat-stat-card--amber">
                <div class="cat-stat-body">
                    <div id="stat-inactive">—</div>
                    <div>Inactive</div>
                </div>
            </div>
        </div>

        {{-- TABLE --}}
        <div class="cat-card">

            <div class="cat-card__toolbar">
                <span>All Collections</span>
                <button class="cat-btn cat-btn--primary cat-btn--sm" data-bs-toggle="modal" data-bs-target="#addCollectionModal">
                    Add Collection
                </button>
            </div>

            <table id="enquiryTable" class="table display" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Subtitle</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</section>


{{-- MODAL --}}
<div class="modal fade" id="addCollectionModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Add Collection</h5>
                <button data-bs-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form id="collectionForm">
                    @csrf

                    {{-- NAME --}}
                    <div class="mb-3">
                        <label>Name *</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Subtitle *</label>
                        <input type="text" name="subtitle" class="form-control">
                    </div>

                    {{-- IMAGE --}}
                    <div class="mb-3">
                        <label>Collection Image</label>

                        <div class="apf-upload-zone apf-upload-zone--sm">
                            <input type="file" name="image" id="collectionImage" class="apf-upload-zone__input">

                            <div class="apf-upload-zone__inner">
                                <i class="lni lni-image"></i>
                                <p>Drop image or <span>browse</span></p>
                                <small>JPG, PNG, WEBP — max 5MB</small>
                            </div>
                        </div>

                        <div id="imagePreview" style="margin-top:10px;"></div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                <button id="saveCollection" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
</div>

{{-- ================= EDIT MODAL ================= --}}
<div class="modal fade" id="editCollectionModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Collection</h5>
                <button data-bs-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <form id="editCollectionForm">
                    @csrf

                    <input type="hidden" id="edit_id">

                    <div class="mb-3">
                        <label>Name *</label>
                        <input type="text" id="edit_name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Subtitle *</label>
                        <input type="text" id="edit_subtitle" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Image</label>

                        <input type="file" id="edit_image" class="form-control">

                        <div id="editImagePreview" class="mt-2"></div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                <button id="updateCollection" class="btn btn-primary">Update</button>
            </div>

        </div>
    </div>
</div>

@endsection


@push('scripts')
<script>
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // DATATABLE
    let table = $('#enquiryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('collections.index') }}",

        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable:false },

            {
                data: 'image',
                orderable:false,
                render: function(data) {
                    if (!data) return '—';
                    return `<img src="${data}" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">`;
                }
            },

            { data: 'name' },
            { data: 'subtitle' },

            { data: 'is_active', orderable:false, searchable:false },

            { data: 'actions', orderable:false, searchable:false }
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


    // IMAGE PREVIEW
    $('#collectionImage').on('change', function(e){
        let file = e.target.files[0];

        if(file){
            let reader = new FileReader();

            reader.onload = function(e){
                $('#imagePreview').html(`
                    <img src="${e.target.result}" style="width:80px;height:80px;border-radius:8px;">
                `);
            }

            reader.readAsDataURL(file);
        }
    });


    // SAVE
    $('#saveCollection').click(function () {

        let formData = new FormData();
        formData.append('name', $('input[name="name"]').val());
        formData.append('subtitle', $('input[name="subtitle"]').val());
        formData.append('_token', $('input[name="_token"]').val());

        let file = $('#collectionImage')[0].files[0];
        if (file) formData.append('image', file);

        $.ajax({
            url: "{{ route('collections.store') }}",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (res) {
                if (res.status) {
                    alert(res.message);
                    $('#collectionForm')[0].reset();
                    $('#imagePreview').html('');
                    $('#addCollectionModal').modal('hide');
                    table.ajax.reload();
                }
            },

            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    Object.values(errors).forEach(err => alert(err[0]));
                }
            }
        });
    });

    // ================= EDIT OPEN =================
    $(document).on('click','.editBtn', function(){

        $('#edit_id').val($(this).data('id'));
        $('#edit_name').val($(this).data('name'));
        $('#edit_subtitle').val($(this).data('subtitle'));

        let image = $(this).data('image');

        if(image){
            $('#editImagePreview').html(`
                <img src="${image}" style="width:80px;height:80px;border-radius:8px;">
            `);
        }

        $('#editCollectionModal').modal('show');
    });

    // ================= EDIT IMAGE PREVIEW =================
    $('#edit_image').on('change', function(e){
        let file = e.target.files[0];

        if(file){
            let reader = new FileReader();

            reader.onload = function(e){
                $('#editImagePreview').html(`
                    <img src="${e.target.result}" style="width:80px;height:80px;border-radius:8px;">
                `);
            }

            reader.readAsDataURL(file);
        }
    });

    // ================= UPDATE =================
    $('#updateCollection').click(function(){

        let id = $('#edit_id').val();

        let formData = new FormData();
        formData.append('name', $('#edit_name').val());
        formData.append('subtitle', $('#edit_subtitle').val());

        let file = $('#edit_image')[0].files[0];
        if(file) formData.append('image', file);

        $.ajax({
            url: "/admin/collections/update/"+id,
            type: "POST",
            data: formData,
            contentType:false,
            processData:false,

            success:function(res){
                alert(res.message);
                $('#editCollectionModal').modal('hide');
                table.ajax.reload();
            }
        });
    });


    // DELETE
    $(document).on('click', '.dltBtn', function () {
        let id = $(this).data('id');

        if(confirm('Delete this collection?')){
            $.ajax({
                url: "/admin/collections/delete/" + id,
                type: "DELETE",
                data: { _token: "{{ csrf_token() }}" },

                success: function () {
                    table.ajax.reload();
                }
            });
        }
    });


    // STATUS
    $(document).on('change', '.toggle-status', function() {
        let status = $(this).prop('checked') ? 1 : 0;
        let id = $(this).data('id');

        $.ajax({
            url: "{{ route('collections.updateStatus') }}",
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

});
</script>
@endpush