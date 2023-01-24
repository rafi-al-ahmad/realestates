<!-- Responsive Datatable -->
<section id="responsive-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        @if(isset($dt_mainButtonAction) || isset($dt_mainButtonText)|| isset($dt_title))
                        <div class="card-header flex-column flex-md-row">
                            <div class="head-label text-center">
                                <h4 class="card-title mb-0">{{ $dt_title }}</h4>
                            </div>
                            @if(isset($dt_mainButtonAction) && isset($dt_mainButtonText))
                            <a href="{{ $dt_mainButtonAction }}" class="btn btn-secondary create-new btn-primary">
                                <span>
                                    <span class="d-none d-sm-inline-block">{{ $dt_mainButtonText }}</span>
                                </span>
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
                <div class="card-datatable">
                    {{ $dataTable->table([
                    "class" => "dt-responsive table " . $dt_class,
                    "style" => " " . $dt_style
                        ])
                    }}
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Responsive Datatable -->




@push('scripts')

<script src="{{ url('dashboard') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="{{ url('dashboard') }}/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
{!! $dataTable->scripts() !!}

@endpush

@push('style')

<link rel="stylesheet" type="text/css" href="{{ url('dashboard') }}/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
<link rel="stylesheet" type="text/css" href="{{ url('dashboard') }}/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
<link rel="stylesheet" type="text/css" href="{{ url('dashboard') }}/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css">
@endpush
