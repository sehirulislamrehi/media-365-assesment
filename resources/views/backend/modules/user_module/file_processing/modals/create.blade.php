<div class="modal-header">
    <h6 class="modal-title" id="exampleModalLabel">File Processing</h6>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <form action="{{ route('admin.user-module.file_processing.create') }}" method="POST" class="ajax-form">
        @csrf

        <div class="row">

            <!-- Thumbnail Link  -->
            <div class="col-md-12 form-group">
                <label>Thumbnail Link <small>(Use coma separator)</small></label>
                <textarea name="image_links" class="form-control"></textarea>
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