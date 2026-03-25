@extends('admin.layouts.app')
@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
            <div @class(['row', 'align-items-center'])>
                <div @class(['col-md-6'])>
                <div @class(['title'])>
                    <h2>Categories</h2>
                </div>
                </div>
                <!-- end col -->
                <div @class(['col-md-6'])>
                    <div @class(['breadcrumb-wrapper'])>
                        {{-- <nav aria-label="breadcrumb">
                        <ol @class(['breadcrumb'])>
                            <li @class(['breadcrumb-item', 'active']) aria-current="page">
                            <a href="/admin/categories">Categories</a>
                            </li>
                        </ol>
                        </nav> --}}
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                            + Add New
                        </button>
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
                    <table id="enquiryTable" @class(['table', 'display']) style="width:100%">
                        <thead>
                            <tr>
                                <th><h6>#</h6></th>
                                <th><h6>Name</h6></th>
                                <th><h6>Is Active?</h6></th>
                                <th><h6>Action</h6></th>
                            </tr>
                        </thead>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
            
        </div>
    </section>
<div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form id="categoryForm">
                    @csrf

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter category name">
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveCategory">Save</button>
            </div>

        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        // CSRF setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // DataTable Init
        let table = $('#enquiryTable').DataTable({
            processing: true,
            serverSide: true,
            stripeClasses: [], // ❌ remove odd/even classes
            ajax: "{{ route('categories.index') }}",
            
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { 
                    data: 'name', 
                    name: 'name',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        if (!data) return '';

                        let formatted = data.charAt(0).toUpperCase() + data.slice(1).toLowerCase();

                        return `<p>${formatted}</p>`;
                    }
                }, { 
                    data: 'is_active', 
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    }, 
                    orderable: false, 
                    searchable: false 
                }, { data: 'actions', orderable: false, searchable: false }
            ]
        });

        // Status Change AJAX
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
                    alert('Status updated')
                }
            });
        });

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
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            Swal.fire(
                                'Deleted!',
                                'Category deleted successfully.',
                                'success'
                            );

                            $('.dataTable').DataTable().ajax.reload();
                        },
                        error: function() {
                            Swal.fire(
                                'Error!',
                                'Something went wrong.',
                                'error'
                            );
                        }
                    });

                }
            });
        });

        $('#saveCategory').click(function () {
            let formData = {
                name: $('input[name="name"]').val(),
                _token: $('input[name="_token"]').val()
            };

            $.ajax({
                url: "{{ route('categories.store') }}",
                type: "POST",
                data: formData,
                success: function (response) {

                    if(response.status){
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        });
                        // reset form
                        $('#categoryForm')[0].reset();

                        // close modal
                        $('#addCategoryModal').modal('hide');
                        $('.dataTable').DataTable().ajax.reload();
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    if(errors){
                        $.each(errors, function(key, value){
                            Swal.fire(
                                'Error!',
                                value[0],
                                'error'
                            );
                        });
                    }
                }
            });
        });

        $('#addCategoryModal').on('hidden.bs.modal', function () {
            $('#categoryForm')[0].reset();
            $('#addCategoryModal').modal('hide');
        });

    });
</script>
@endpush
    