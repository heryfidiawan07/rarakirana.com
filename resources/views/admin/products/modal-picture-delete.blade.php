<div class="modal fade delete-pict" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Delete image ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div class="text-center">
                    <img id="select-picture" src="" width="150">
                    <hr>
                </div>
                <button class="btn btn-danger btn-sm" id="btn-delete-pict" data-url="/admin/product/picture/ajax/delete/{{$pict->id}}" data-dismiss="modal">Delete !</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>