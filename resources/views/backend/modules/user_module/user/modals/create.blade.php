<div class="modal-header">
     <h6 class="modal-title" id="exampleModalLabel">Create User</h6>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
     <form action="{{ route('admin.user-module.user.create') }}" method="POST" class="ajax-form">
          @csrf

          <div class="row">

               <!-- name -->
               <div class="col-md-12 form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required>
               </div>

               <!-- Email -->
               <div class="col-md-12 form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter email" required>
               </div>

               <!-- Phone -->
               <div class="col-md-12 form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" placeholder="Enter phone" required>
               </div>

               <!-- Password -->
               <div class="col-md-6 form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="******" required>
               </div>

               <!-- Confirm Password -->
               <div class="col-md-6 form-group">
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="******" required>
               </div>

               <!-- Role -->
               <div class="col-md-12 form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-control chosen">
                         @foreach ($roles as $role)
                         <option value="{{ $role->id }}">{{ $role->name }}</option>
                         @endforeach
                    </select>
               </div>

               <!-- User Tiers -->
               <div class="col-md-12 form-group">
                    <label>User Tiers</label>
                    <select name="user_tiers" class="form-control chosen">
                         @foreach ($userTiers as $userTier)
                         <option value="{{ $userTier['value'] }}">{{ $userTier['label'] }}</option>
                         @endforeach
                    </select>
               </div>

               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-sm btn-success">Create</button>
               </div>

          </div>

     </form>
</div>
<!-- <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
</div> -->

@include('backend.includes.components.chosen.chosen')