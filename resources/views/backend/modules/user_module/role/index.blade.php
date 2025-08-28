@extends('backend.template.layout')

@section('per_page_css')
     @include('backend.includes.components.datatables.css')
@endsection

@section('content')
<div class="container-fluid">
     <div class="page-title">
          <div class="row">
               <div class="col-6">
                    <h5>Role Management</h5>
               </div>
               <div class="col-6">
                    <ol class="breadcrumb">
                         <li class="breadcrumb-item">
                              <a href="{{ route('admin.dashboard.index') }}">
                                   Dashboard
                              </a>
                         </li>
                         <li class="breadcrumb-item active">User Module</li>
                         <li class="breadcrumb-item">Role</li>
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
                         @if(can("role_index"))
                         <div class="row">
                              <div class="col-12 text-right">
                                   <button type="button" data-content="{{ route('admin.user-module.role.create.modal') }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#extraLargeModal">
                                        Create
                                   </button>
                              </div>
                         </div>
                         @endif
                    </div>
                    <div class="card-body">
                         <div class="table-responsive custom-scrollbar">
                              <table id="dataGrid" class="table table-bordered table-striped dataTable dtr-inline" style="width: 100%">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Name</th>
                                             <th>Is Active</th>
                                             <th>Action</th>
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
                    url: "{{ route('admin.user-module.role.data') }}",
                    data: function(data) {
                         // data.business_unit_id = $('#search_business_unit_id').val();
                         // data.service_center_id = $('#search_service_center_id').val();
                         // data.user_group_id = $('#search_user_group_id').val();
                         // data.othoba_department_id = $('#othoba_department_id').val();
                         // data.agent_type_id = $('#search_agent_type_id').val();
                         // data.othoba_delivery_channel_id = $("#search_othoba_delivery_channel_id").val();
                         // data.thana_id = $("#search_thana_id").val();
                         // data.role_id = $("#search_role_id").val();
                         // data.product_category_id = $("#product_category_id").val();
                         // data.factory_id = $("#search_factory_id").val();
                         // data.spro_country_id = $("#search_spro_country_id").val();
                         // data.company = $("#search_company").val();
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
                         data: 'name',
                         name: 'name',
                         orderable: false,
                         searchable: true,

                    },
                    {
                         name: 'is_active',
                         data: 'is_active',
                         orderable: false,
                         searchable: false

                    },
                    {
                         data: 'action',
                         name: 'action',
                         orderable: false,
                         searchable: false
                    }

               ]
          });
     });
</script>
@endsection