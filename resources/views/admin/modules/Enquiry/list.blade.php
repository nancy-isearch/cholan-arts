@extends('admin.layouts.app')

@section('content')
<section @class(['section', 'enq-page'])>
    <div @class(['container-fluid'])>

        {{-- ══ PAGE HEADER ══ --}}
        <div class="enq-header">
            <div class="enq-header__left">
                <span class="enq-eyebrow">
                    Customer Management
                </span>
                <h2 class="enq-title">All <em>Enquiries</em></h2>
                <p class="enq-subtitle">Review, track and manage all incoming customer enquiries</p>
            </div>
            <div class="enq-header__right">
                <a href="/admin/dashboard" class="enq-btn enq-btn--ghost">
                    <i class="lni lni-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>

        {{-- ══ STAT CARDS ══ --}}
        <div class="enq-stats">
            <div class="enq-stat-card enq-stat-card--blue enq-fade-in">
                <div class="enq-stat-icon enq-stat-icon--blue">
                    <i class="lni lni-envelope"></i>
                </div>
                <div class="enq-stat-body">
                    <div class="enq-stat-value" id="stat-total">—</div>
                    <div class="enq-stat-label">Total Enquiries</div>
                </div>
            </div>
            <div class="enq-stat-card enq-stat-card--amber enq-fade-in" style="animation-delay:.06s">
                <div class="enq-stat-icon enq-stat-icon--amber">
                    <i class="lni lni-timer"></i>
                </div>
                <div class="enq-stat-body">
                    <div class="enq-stat-value" id="stat-pending">—</div>
                    <div class="enq-stat-label">Pending</div>
                </div>
            </div>
            <div class="enq-stat-card enq-stat-card--green enq-fade-in" style="animation-delay:.12s">
                <div class="enq-stat-icon enq-stat-icon--green">
                    <i class="lni lni-spinner-arrow"></i>
                </div>
                <div class="enq-stat-body">
                    <div class="enq-stat-value" id="stat-progress">—</div>
                    <div class="enq-stat-label">In Progress</div>
                </div>
            </div>
            <div class="enq-stat-card enq-stat-card--teal enq-fade-in" style="animation-delay:.18s">
                <div class="enq-stat-icon enq-stat-icon--teal">
                    <i class="lni lni-checkmark-circle"></i>
                </div>
                <div class="enq-stat-body">
                    <div class="enq-stat-value" id="stat-completed">—</div>
                    <div class="enq-stat-label">Completed</div>
                </div>
            </div>
        </div>

        {{-- ══ TABLE CARD ══ --}}
        <div class="enq-card enq-fade-in" style="animation-delay:.22s">

            {{-- Card toolbar --}}
            <div class="enq-card__toolbar">
                <div class="enq-card__toolbar-left">
                    <span class="enq-card__toolbar-title">Enquiry Records</span>
                </div>
                <div class="enq-card__toolbar-right">
                    <span class="enq-legend">
                        <span class="enq-legend-dot enq-legend-dot--amber"></span> Pending
                    </span>
                    <span class="enq-legend">
                        <span class="enq-legend-dot enq-legend-dot--blue"></span> In Progress
                    </span>
                    <span class="enq-legend">
                        <span class="enq-legend-dot enq-legend-dot--teal"></span> Completed
                    </span>
                </div>
            </div>

            {{-- DataTable controls row --}}
            <div class="enq-table-controls">
                <div id="enq-length-wrapper"></div>
                <div id="enq-search-wrapper"></div>
            </div>

            {{-- Table --}}
            <div class="enq-table-scroll">
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
            </div>

            {{-- Footer (pagination + info) --}}
            <div class="enq-table-footer">
                <div id="enq-info-wrapper"></div>
                <div id="enq-pagination-wrapper"></div>
            </div>

        </div>
        {{-- end table card --}}

    </div>
</section>

{{-- ══ VIEW ENQUIRY MODAL ══ --}}
<div class="modal fade enq-modal" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">
                <div class="enq-modal__header-left">
                    <div class="enq-modal__header-icon">
                        <i class="lni lni-envelope"></i>
                    </div>
                    <div>
                        <h5 class="modal-title" id="viewModalLabel">Enquiry Details</h5>
                        <p class="enq-modal__header-sub">Full enquiry information</p>
                    </div>
                </div>
                <button type="button" class="enq-modal__close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="lni lni-close"></i>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="modal-body">

                {{-- Top row — product + status --}}
                <div class="enq-modal__top-row">
                    <div class="enq-modal__field enq-modal__field--highlight">
                        <span class="enq-modal__field-label"><i class="lni lni-package"></i> Product</span>
                        <span class="enq-modal__field-value" id="v_product">—</span>
                    </div>
                    <div class="enq-modal__field enq-modal__field--status">
                        <span class="enq-modal__field-label"><i class="lni lni-reload"></i> Status</span>
                        <span class="enq-modal__field-value" id="v_status">—</span>
                    </div>
                </div>

                {{-- Grid of fields --}}
                <div class="enq-modal__grid">

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-user"></i> Name</span>
                        <span class="enq-modal__field-value" id="v_name">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-envelope"></i> Email</span>
                        <span class="enq-modal__field-value" id="v_email">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-phone"></i> Phone</span>
                        <span class="enq-modal__field-value" id="v_phone">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-layers"></i> Program</span>
                        <span class="enq-modal__field-value" id="v_program">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-ruler-alt"></i> Preferred Size</span>
                        <span class="enq-modal__field-value" id="v_preferred_size">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-brush"></i> Preferred Finish</span>
                        <span class="enq-modal__field-value" id="v_preferred_finish">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-target-customer"></i> Purpose</span>
                        <span class="enq-modal__field-value" id="v_purpose">—</span>
                    </div>

                    <div class="enq-modal__field">
                        <span class="enq-modal__field-label"><i class="lni lni-calendar"></i> Preferred Time</span>
                        <span class="enq-modal__field-value" id="v_preferred_time">—</span>
                    </div>

                </div>

                {{-- Message — full width --}}
                <div class="enq-modal__field enq-modal__field--full">
                    <span class="enq-modal__field-label"><i class="lni lni-comments"></i> Message</span>
                    <span class="enq-modal__field-value enq-modal__field-value--message" id="v_message">—</span>
                </div>

            </div>

            {{-- Modal Footer --}}
            <!-- <div class="modal-footer">
                <button type="button" class="enq-btn enq-btn--ghost" data-bs-dismiss="modal">
                    <i class="lni lni-close"></i> Close
                </button>
            </div> -->

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
            ajax: "{{ route('enquiries.index') }}",

            columns: [
                {
                    data: 'product_name',
                    name: 'product_name',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        if (!data) return '<span class="enq-cell-empty">—</span>';
                        let formatted = data.charAt(0).toUpperCase() + data.slice(1);
                        return `<p class="enq-cell-name">${formatted}</p>`;
                    }
                },
                {
                    data: 'full_name',
                    name: 'full_name',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        if (!data) return '<span class="enq-cell-empty">—</span>';
                        let formatted = data.charAt(0).toUpperCase() + data.slice(1);
                        let initials = formatted.split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase();
                        return `<div class="enq-name-cell">
                                    <div class="enq-avatar">${initials}</div>
                                    <p class="enq-cell-name">${formatted}</p>
                                </div>`;
                    }
                },
                {
                    data: 'email',
                    name: 'email',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p class="enq-cell-muted">${data}</p>`;
                    }
                },
                {
                    data: 'phone',
                    name: 'phone',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p class="enq-cell-muted">${data}</p>`;
                    }
                },
                {
                    data: 'program',
                    name: 'program',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        if (!data) return '<span class="enq-cell-empty">—</span>';
                        return `<span class="enq-program-badge">${data}</span>`;
                    }
                },
                {
                    data: 'status',
                    name: 'status',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        let cls = '', text = '';
                        if (data === 'pending') {
                            cls = 'enq-status--pending';
                            text = 'Pending';
                        } else if (data === 'in-progress') {
                            cls = 'enq-status--progress';
                            text = 'In Progress';
                        } else if (data === 'completed') {
                            cls = 'enq-status--completed';
                            text = 'Completed';
                        }
                        // Keep original status-btn classes for backward-compat with statusChange JS
                        return `<span class="enq-status-badge ${cls} status-btn">${text}</span>`;
                    },
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).addClass('min-width');
                    },
                    render: function(data) {
                        return `<p class="enq-cell-date">${data}</p>`;
                    }
                },
                { data: 'actions', orderable: false, searchable: false }
            ],

            createdRow: function (row, data, dataIndex) {
                if (data.status.includes('pending'))     $(row).addClass('row-pending');
                if (data.status.includes('in-progress')) $(row).addClass('row-progress');
                if (data.status.includes('completed'))   $(row).addClass('row-completed');
            },

            // Move DataTables controls into our custom slots
            initComplete: function () {
                let api = this.api();

                // Move length + filter into our wrappers
                $('#enq-length-wrapper').html($('#enquiryTable_length').detach());
                $('#enq-search-wrapper').html($('#enquiryTable_filter').detach());

                // Update stat counters from table draw data
                updateStats(api);
            },

            drawCallback: function () {
                updateStats(this.api());
            }
        });

        // ── Stat card counter updater ──
        function updateStats(api) {
            let info = api.page.info();
            $('#stat-total').text(info.recordsTotal);

            // Count by status from visible rows (approx — for full accuracy use server response)
            let pending = 0, progress = 0, completed = 0;
            api.rows({ search: 'applied' }).data().each(function(d) {
                if (d.status === 'pending')     pending++;
                if (d.status === 'in-progress') progress++;
                if (d.status === 'completed')   completed++;
            });
            $('#stat-pending').text(pending);
            $('#stat-progress').text(progress);
            $('#stat-completed').text(completed);
        }

        // ── View Modal ──
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

                // Style status badge inside modal
                let statusCls = '';
                if (data.status === 'pending')     statusCls = 'enq-status--pending';
                if (data.status === 'in-progress') statusCls = 'enq-status--progress';
                if (data.status === 'completed')   statusCls = 'enq-status--completed';
                $('#v_status').html(`<span class="enq-status-badge ${statusCls}">${data.status}</span>`);

                $('#viewModal').modal('show');
            });
        });

        // ── Status Change AJAX ──
        $(document).on('change', '.statusChange', function () {
            let id = $(this).data('id');
            let status = $(this).val();

            $.ajax({
                url: '/admin/enquiry/' + id + '/status',
                type: 'POST',
                data: { status: status },
                success: function (response) {
                    alert(response.message);
                    table.ajax.reload(null, false);
                }
            });
        });

    });
</script>
@endpush
