<a class="btn btn-danger btn-sm" @if ($parent->childs->count()<1) href="#" data-toggle="modal" data-target=".delete-category-{{$parent->id}}" @endif><i class="fas fa-trash"></i></a>

<div class="modal fade delete-category-{{$parent->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-center">Delete Category {{$parent->name}} ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="/admin/category/{{$parent->id}}/delete" class="btn btn-danger btn-sm">Delete !</a>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>