@extends('backend.template.layout')

@section('per_page_css')
@include('backend.includes.components.datatables.css')
@endsection

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h5>File Processing</h5>
            </div>
            <div class="col-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard.index') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item active">User Module</li>
                    <li class="breadcrumb-item">File Processing</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0 card-no-border">
                    @if(can("file_processing"))
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="button" data-content="{{ route('admin.user-module.file_processing.create.modal') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Create
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive custom-scrollbar">
                        <table id="dataGrid" class="table table-bordered table-striped dataTable dtr-inline file-processing-table" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Image URL</th>
                                    <th>Status</th>
                                    <th>Created</th>
                                    <th>Processed</th>
                                </tr>
                            </thead>
                            <tbody class="tbody-user">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
@endsection

@section('per_page_js')

@include('backend.includes.components.datatables.script')
<script src="{{ asset('backend/js/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/js/ajax_form_submit.js') }}"></script>

<script>
    $(function() {
        $('#dataGrid').DataTable({
            processing: true,
            serverSide: true,
            pagination: 10,
            ajax: {
                url: "{{ route('admin.user-module.file_processing.data') }}",
                data: function(data) {
                }
            },
            order: [
                [0, 'Desc']
            ],
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'user',
                    name: 'user',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'image_url',
                    name: 'image_url',
                    orderable: false,
                    searchable: true,

                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: true,
                },
                {
                    name: 'created',
                    data: 'created',
                    orderable: false,
                    searchable: false

                },
                {
                    data: 'processed',
                    name: 'processed',
                    orderable: false,
                    searchable: false
                }

            ]
        });
    });
</script>
@endsection