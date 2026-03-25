@extends('admin.layouts.app')
@section('content')
    <section @class(['section'])>
        <div @class(['container-fluid'])>
            <!-- ========== title-wrapper start ========== -->
            <div @class(['title-wrapper', 'pt-30'])>
            <div @class(['row', 'align-items-center'])>
                <div @class(['col-md-6'])>
                <div @class(['title'])>
                    <h2>Enquiries</h2>
                </div>
                </div>
                <!-- end col -->
                <div @class(['col-md-6'])>
                    <div @class(['breadcrumb-wrapper'])>
                        <a href="/admin/dashboard" class="btn btn-primary">
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
                    <table id="enquiryTable" @class(['table', 'display']) style="width:100%">
                        <thead>
                            <tr>
                                <th><h6>Product</h6></th>
                                <th><h6>Name</h6></th>
                                <th><h6>Email</h6></th>
                                <th><h6>Phone</h6></th>
                                <th><h6>Program</h6></th>
                                <th><h6>Status</h6></th>
                                <th><h6>Date</h6></th>
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
<div class="modal fade" id="viewModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">
        <h5>Enquiry Details</h5>
        <p><b>Product:</b> <span id="v_product"></span></p>
        <p><b>Name:</b> <span id="v_name"></span></p>
        <p><b>Email:</b> <span id="v_email"></span></p>
        <p><b>Phone:</b> <span id="v_phone"></span></p>
        <p><b>Program:</b> <span id="v_program"></span></p>
        <p><b>Preferred Size:</b> <span id="v_preferred_size"></span></p>
        <p><b>Purpose:</b> <span id="v_purpose"></span></p>
        <p><b>Preferred Finish:</b> <span id="v_preferred_finish"></span></p>
        <p><b>Preferred Time:</b> <span id="v_preferred_time"></span></p>
        <p><b>Message:</b> <span id="v_message"></span></p>
        <p><b>Status:</b> <span id="v_status"></span></p>

        <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        ajax: "{{ route('enquiries.index') }}",
        
        columns: [
            { 
                data: 'product_name', 
                name: 'product_name',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    if (!data) return '';

                    // First letter capitalize
                    let formatted = data.charAt(0).toUpperCase() + data.slice(1);
                    return `<p>${formatted}</p>`;
                }
            },
            { 
                data: 'full_name', 
                name: 'full_name',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    if (!data) return '';

                    // First letter capitalize
                    let formatted = data.charAt(0).toUpperCase() + data.slice(1);
                    return `<p>${formatted}</p>`;
                }
            }, { 
                data: 'email', 
                name: 'email', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    return `<p>${data}</p>`;
                } 
            }, {   
                data: 'phone', 
                name: 'phone', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    return `<p>${data}</p>`;
                } 
            }, { 
                data: 'program', 
                name: 'program', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    return `<p>${data}</p>`;
                } 
            }, { 
                data: 'status', 
                name: 'status',
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    let statusClass = '';
                    let statusText = '';
                    if (data === 'pending') {
                        statusClass = 'info-btn';
                        statusText = 'Pending';
                    } else if (data === 'in-progress') {
                        statusClass = 'active-btn';
                        statusText = 'In Progress';
                    } else if (data === 'completed') {
                        statusClass = 'success-btn';
                        statusText = 'Completed';
                    }

                    return `<span class="status-btn ${statusClass}">${statusText}</span>`;
                }, 
                orderable: false, 
                searchable: false 
            }, { 
                data: 'created_at', 
                name: 'created_at', 
                createdCell: function (td, cellData, rowData, row, col) {
                    $(td).addClass('min-width');
                },
                render: function(data) {
                    return `<p>${data}</p>`;
                } 
            }, { data: 'actions', orderable: false, searchable: false }
        ],
        createdRow: function (row, data, dataIndex) {
            if (data.status.includes('pending')) {
                $(row).addClass('row-pending');
            }
            if (data.status.includes('in-progress')) {
                $(row).addClass('row-progress');
            }
            if (data.status.includes('completed')) {
                $(row).addClass('row-completed');
            }
        }
    });

    $(document).on('click', '.viewBtn', function () {
        let id = $(this).data('id');
        $.get(`/admin/enquiries/${id}`, function (data) {
            $('#v_product').text(data.product ? data.product.name : 'NA');
            $('#v_name').text(data.full_name);
            $('#v_email').text(data.email);
            $('#v_phone').text(data.phone);
            $('#v_program').text(data.program ? data.program : 'NA');
            $('#v_message').text(data.message ? data.message : 'NA');
            $('#v_preferred_size').text(data.preferred_size ? data.preferred_size : 'NA');
            $('#v_preferred_time').text(data.preferred_time ? data.preferred_time : 'NA');
            $('#v_purpose').text(data.purpose ? data.purpose : 'NA');
            $('#v_preferred_finish').text(data.preferred_finish ? data.preferred_finish : 'NA');
            $('#v_status').text(data.status);

            $('#viewModal').modal('show');
        });
    });

    // Status Change AJAX
    $(document).on('change', '.statusChange', function () {
        let id = $(this).data('id');
        let status = $(this).val();

        $.ajax({
            url: '/admin/enquiry/' + id + '/status',
            type: 'POST',
            data: {
                status: status
            },
            success: function (response) {
                alert(response.message);
                table.ajax.reload(null, false); // refresh without reset pagination
            }
        });
    });

});
</script>
@endpush
    