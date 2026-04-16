@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="container-fluid">

            <!-- Title -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">

                    <div class="col-md-6">
                        <div class="title">
                            <h2>Pages</h2>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <a href="{{ route('pages.create') }}" class="btn btn-primary">
                                + Add New
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="table-wrapper table-responsive">

                            <table id="pageTable" class="table display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th><h6>#</h6></th>
                                        <th><h6>Title</h6></th>
                                        <th><h6>Slug</h6></th>
                                        <th><h6>Hero</h6></th>
                                        <th><h6>Status</h6></th>
                                        <th><h6>Actions</h6></th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // DataTable
            let table = $('#pageTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('pages.list') }}",

                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },

                    { data: 'title',
                        render: function(data){
                            return `<p>${data}</p>`;
                        }
                    },

                    { data: 'slug' },

                    { data: 'hero_image',
                        orderable: false,
                        searchable: false,
                        render: function(data){
                            if(data){
                                return `<img src="/uploads/pages/${data}" width="60">`;
                            }
                            return '-';
                        }
                    },

                    { data: 'status',
                        orderable: false,
                        searchable: false
                    },

                    { data: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // ✅ Toggle Status
            $(document).on('change', '.toggle-status', function() {
                let status = $(this).prop('checked') ? 1 : 0;
                let id = $(this).data('id');

                $.ajax({
                    url: "/admin/pages/update-status",
                    type: "PUT",
                    data: {
                        id: id,
                        status: status
                    },
                    success: function() {
                        Swal.fire('Done!', 'Status updated', 'success');
                    }
                });
            });

            // ✅ Delete
            $(document).on('click', '.dltBtn', function() {
                let id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes delete'
                }).then((result) => {

                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/admin/pages/delete/" + id,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function() {
                                Swal.fire('Deleted!', '', 'success');
                                $('#pageTable').DataTable().ajax.reload();
                            }
                        });
                    }
                });
            });

        });
    </script>
@endpush
    