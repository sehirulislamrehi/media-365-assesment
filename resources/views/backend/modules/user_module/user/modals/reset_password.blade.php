<div class="modal-header">
     <h6 class="modal-title" id="exampleModalLabel">{{ $user->name }}</h6>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
     <form action="{{ route('admin.user-module.user.reset.password', $user->id) }}" method="POST" class="ajax-form">
          @csrf

          <div class="row">

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


               <div class="col-md-12 form-group text-right">
                    <button type="submit" class="btn btn-sm btn-success">Reset</button>
               </div>

          </div>

     </form>
</div>
<!-- <div class="modal-footer">
     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
     <button type="button" class="btn btn-primary">Save changes</button>
</div> -->
