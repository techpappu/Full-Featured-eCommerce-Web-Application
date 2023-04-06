<x-back-end.master>
    @section('page-title')
    Create New User
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New User</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">
        <x-back-end.validationAlert></x-back-end.validationAlert>
        <form action="{{route('admin.user.post.create')}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ request()->input('name', old('name')) }}" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1" class="required">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" value="{{ request()->input('email', old('email')) }}" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1" class="required">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                    placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2" class="required">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="password_confirmation"
                    placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $("#form").validate({
            rules: {
                name: 'required',
                email: 'required',
                password: 'required',
                password_confirmation: 'required',
            },
            messages: {
                name: "Please enter a name",
                email: "Please enter an unique Email",
                password: 'Please enter password',
                password_confirmation: 'Please enter password confirmation',
                
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
