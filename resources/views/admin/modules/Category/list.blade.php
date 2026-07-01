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
                <a href="{{ route('categories.create') }}" class="cat-btn cat-btn--primary">
                    <i class="lni lni-plus"></i> Add New Category
                </a>
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
                    <a href="{{ route('categories.create') }}" class="cat-btn cat-btn--primary cat-btn--sm">
                        <i class="lni lni-plus"></i> Add Category
                    </a>
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



    });
</script>
@endpush
