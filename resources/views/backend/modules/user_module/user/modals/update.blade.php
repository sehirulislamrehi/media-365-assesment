<div class="modal-header">
     <h6 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h6>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
     <form action="{{ route('admin.user-module.user.update', $user->id) }}" method="POST" class="ajax-form">
          @csrf

          <div class="row">

               <!-- name -->
               <div class="col-md-12 form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name" required>
               </div>

               <!-- Email -->
               <div class="col-md-12 form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email" required>
               </div>

               <!-- Phone -->
               <div class="col-md-12 form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" placeholder="Enter phone" required>
               </div>

               <!-- Role -->
               <div class="col-md-12 form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-control chosen">
                         @foreach ($roles as $role)
                         <option value="{{ $role->id }}" @if( $user->role_id == $role->id ) selecetd @endif >{{ $role->name }}</option>
                         @endforeach
                    </select>
               </div>

               <!-- User Tiers -->
               <div class="col-md-12 form-group">
                    <label>User Tiers</label>
                    <select name="user_tiers" class="form-control chosen">
                         @foreach ($userTiers as $userTier)
                         <option value="{{ $userTier['value'] }}" @if($userTier['value'] == $user->user_tiers) selected @endif >{{ $userTier['label'] }}</option>
                         @endforeach
                    </select>
               </div>

               <!-- Status -->
               <div class="col-md-12 form-group">
                    <label>Status</label><span class="text-danger">*</span>
                    <select name="is_active" class="form-control">
                         <option value="1" @if( $user->is_active ) selected @endif >Active</option>
                         <option value="0" @if( !$user->is_active ) selected @endif >In active</option>
                    </select>
               </div>

               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-sm btn-success">Update</button>
               </div>

          </div>

     </form>
</div>
<!-- <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
</div> -->

@include('backend.includes.components.chosen.chosen')