<x-back-end.master>
    @section('page-title')
    Create New Role
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New Role</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">

        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.role.post.create')}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Role Name</label>
                <input type="text" class="form-control" value="{{ request()->input('name', old('name')) }}" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="guard_name" class="required">Guard Name</label>
                <input type="text" class="form-control" value="{{ request()->input('guard_name', old('guard_name')) }}" id="guard_name" name="guard_name">
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
                name: 'required',
                guard_name:'required'
            },
            messages: {
                name: 'Please enter a name',
                guard_name:'Please enter a guard name'

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
