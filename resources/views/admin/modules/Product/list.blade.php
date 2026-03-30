@extends('admin.layouts.app')
@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
            <div @class(['row', 'align-items-center'])>
                <div @class(['col-md-6'])>
                <div @class(['title'])>
                    <h2>Products</h2>
                </div>
                </div>
                <!-- end col -->
                <div @class(['col-md-6'])>
                    <div @class(['breadcrumb-wrapper'])>
                        {{-- <a href="{{ route('products.sample.csv') }}" class="btn btn-info" title="Download Sample CSV">
                            <i class="lni lni-download"></i>
                        </a> --}}
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">
                            Bulk Upload
                        </a>
                        <a href="/admin/products/add" class="btn btn-primary">
                            + Add New
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
                    <table id="productTable" @class(['table', 'display']) style="width:100%">
                        <thead>
                            <tr>
                                <th><h6>#</h6></th>
                                <th><h6>Image</h6></th>
                                <th><h6>Name</h6></th>
                                <th><h6>Categories</h6></th>
                                <th><h6>Price</h6></th>
                                <th><h6>Is Featured?</h6></th>
                                <th><h6>Status</h6></th>
                                <th><h6>Actions</h6></th>
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
    <div class="modal fade" id="bulkUploadModal">
        <div class="modal-dialog">
            <div class="modal-content">
            
            <div class="modal-header">
                <h5 class="modal-title">Bulk Upload Products</h5>
                <a href="{{ route('products.sample.csv') }}" class="btn btn-info" title="Download Sample CSV">
                    <i class="lni lni-download"></i>
                </a>
            </div>

            <div class="modal-body">
                <form id="bulkUploadForm" enctype="multipart/form-data">
                @csrf

                <input type="file" name="file" class="form-control mb-2" required>

                <small>
                    Upload CSV (name, price, description, categories)
                </small>

                <br><br>

                <button type="submit" class="btn btn-primary">Upload</button>
                </form>
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
        let table = $('#productTable').DataTable({
            processing: true,
            serverSide: true,
            stripeClasses: [], // ❌ remove odd/even classes
            ajax: "{{ route('products.list') }}",
            
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'image', name: 'image', createdCell: function (td, cellData, rowData, row, col) {$(td).addClass('min-width');},render: function(data) {return `<p>${data}</p>`;}},
                { data: 'name', name: 'name',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p>${data}</p>`;
                    }
                },{ 
                    data: 'categories', name: 'categories',createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p>${data}</p>`;
                    }
                },{ 
                    data: 'price', name: 'price',createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p>${data}</p>`;
                    }
                },{ 
                    data: 'is_featured', 
                    createdCell: function (td, cellData, rowData, row, col) {$(td).addClass('min-width');
                    }, 
                    orderable: false, 
                    searchable: false 
                },{ 
                    data: 'is_active', 
                    createdCell: function (td, cellData, rowData, row, col) {$(td).addClass('min-width');
                    }, 
                    orderable: false, 
                    searchable: false 
                }, 
                { data: 'actions', orderable: false, searchable: false }
            ]
        });

        $(document).on('change', '.toggle-status', function() {
            let status = $(this).prop('checked') ? 1 : 0;
            let id = $(this).data('id');
            console.log("here => ", id, "== == ", status)
            $.ajax({
                url: "/admin/products/update-status",
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    status: status
                },
                success: function(response) {
                    Swal.fire(
                        'Done!',
                        'Status updated successfully.',
                        'success'
                    );
                }
            });
        });

        $(document).on('change', '.toggle-feature', function() {
            let feature = $(this).prop('checked') ? 1 : 0;
            let id = $(this).data('id');
            $.ajax({
                url: "/admin/products/update-feature",
                type: "PUT",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    feature: feature
                },
                success: function(response) {
                    Swal.fire(
                        'Done!',
                        'Updated successfully.',
                        'success'
                    );
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
                        url: "/admin/products/delete/" + id,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(response) {

                            Swal.fire(
                                'Deleted!',
                                'Product deleted successfully.',
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

        $('#bulkUploadForm').submit(function(e) {
            e.preventDefault();

            let form = this;
            let formData = new FormData(form);

            $.ajax({
                url: "/admin/products-bulk-upload",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,

                beforeSend: function() {
                    $('button[type="submit"]').prop('disabled', true).text('Uploading...');
                },

                success: function(res) {

                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message
                    });

                    // ✅ Reset form
                    form.reset();

                    // ✅ Close modal
                    $('#bulkUploadModal').modal('hide');

                    // ✅ Reload DataTable
                    $('#productTable').DataTable().ajax.reload();

                },

                error: function(err) {

                    let message = 'Upload failed';

                    if (err.responseJSON && err.responseJSON.message) {
                        message = err.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: message
                    });

                    // ❗ Optional: reset form even on error
                    form.reset();
                },

                complete: function() {
                    $('button[type="submit"]').prop('disabled', false).text('Upload');
                }
            });
        });
    });
</script>
@endpush
    