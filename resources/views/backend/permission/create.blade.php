<x-back-end.master>
    @section('page-title')
    Create New Permission
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Permissions</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New Permission</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">

        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.permission.post.create')}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Permission Name</label>
                <input type="text" class="form-control" value="{{ request()->input('name', old('name')) }}" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
        $("#form").validate({
            rules: {
                name: 'required'
            },
            messages: {
                name: 'Please enter a name'

            }
        });

    </script>
    @endsection
    @section("css")
    <style>
        .error {
            color: red;
        }
        .required:after {
            content:" *";
            color: red;
        }
    </style>
    @endsection
</x-back-end.master>
