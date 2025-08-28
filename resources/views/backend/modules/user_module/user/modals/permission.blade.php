<style>
     .permission_block {
          border: 1px solid #ddd;
          border-radius: 10px;
          background-color: #f9f9f9;
     }

     .module-header {
          background-color: #eaeaea;
          padding: 5px;
          border-radius: 5px;
     }


     .dark-mode .permission_block {
          border: 1px solid #6e6e6e;
          border-radius: 10px;
          background-color: rgba(50, 50, 50, 0.82);
          color: lightgray;
     }

     .dark-mode .module-header {
          background-color: #46a3e6;
          padding: 5px;
          border-radius: 5px;
          ;
          color: lightgray;
     }

     .sub_module_block {
          list-style-type: none;
          padding: 0;
     }

     .sub-permission-item {
          padding: 3px 0;
     }

     .permission_block input[type="checkbox"] {
          cursor: pointer;
     }
</style>
<div class="modal-header">
     <h6 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h6>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
     <form action="{{ route('admin.user-module.user.permission', $user->id) }}" method="POST" class="ajax-form">
          @csrf

          <div class="row">

               <!-- Permissions -->
               <div class="form-group col-12">
                    <label for="role-status">Permissions</label><span class="text-danger">*</span>
                    <div class="form-group row">
                         @foreach ($modules as $module)
                         @php
                              $modulePermissionId = $module->permissions->where('key', $module->key)->first()->id;
                         @endphp
                         <div class="col-12 col-md-3 my-2">
                              <div class="permission_block p-1">
                                   <label class="module-header mb-0 d-flex align-items-center">
                                        <input type="checkbox" class="module_check me-2" name="permissions[]" value="{{ $module->permissions->where('key', $module->key)->first()->id }}"
                                        @if ($user->permissions->contains('id', $modulePermissionId))
                                             checked
                                        @endif
                                        />
                                        <span>{{ $module->name }}</span>
                                   </label>
                                   <ul class="sub_module_block mt-2 ps-3">
                                        @foreach ($module->permissions as $permission)
                                        @if ($permission->key != $module->key)
                                        <li class="sub-permission-item">
                                             <label class="mb-0 d-flex align-items-center">
                                                  <input type="checkbox" class="sub_module_check me-2" name="permissions[]" value="{{ $permission->id }}"
                                                  @if ($user->permissions->contains('id', $permission->id)) checked @endif
                                                  />
                                                  <span>{{ $permission->display_name }}</span>
                                             </label>
                                        </li>
                                        @endif
                                        @endforeach
                                   </ul>
                              </div>
                         </div>
                         @endforeach
                    </div>
               </div>

               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
               </div>

          </div>

     </form>
</div>

<script>
     $(".module_check").click(function(e) {
          let $this = $(this);
          if (e.target.checked == true) {
               $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").removeAttr("disabled")
          } else {
               $this.closest(".permission_block").find(".sub_module_block").find(".sub_module_check").attr("disabled", "disabled")
          }
     })
</script>