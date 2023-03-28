<form action="{{$action}}" method="POST" class="d-inline-block">
    @csrf
    <input type="hidden" name="id" value="{{$row->id}}"/>
    <button type="button" class="btn btn-danger waves-effect waves-light show_confirm">
        <span class="btn-label"><i class="fas fa-trash-alt"></i></span>
        Delete
    </button>
</form>