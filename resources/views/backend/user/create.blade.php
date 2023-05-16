<x-back-end.master>
    @section('page-title')
    Create New User
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New User</a></li>
    @endsection
    @section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card-box overflow-hidden">
                <img src="{{asset('assets/images/users/default-user.jpg')}}" alt="" class="w-100 rounded-circle">
            </div>
        </div>
        <div class="col-md-9">
            <form action="{{route('admin.user.post.create')}}" method="POST" id="form" enctype="multipart/form-data">
                @csrf
                <div class="card-box overflow-hidden">
                    <h1 class="text-center">User</h1>
                    <x-back-end.validationAlert></x-back-end.validationAlert>
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
                    
                </div>
                <div class="card-box">
                    <h1 class="text-center">Profile</h1>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{ request()->input('first_name', old('first_name')) }}" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{ request()->input('last_name', old('last_name')) }}" placeholder="Enter Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ request()->input('address', old('address')) }}" placeholder="Enter Address">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" id="address" value="{{ request()->input('city', old('city')) }}" placeholder="Enter City">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="district">District</label>
                            <input type="text" class="form-control" name="district" id="district" value="{{ request()->input('district', old('district')) }}" placeholder="Enter District">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="postcode">postcode</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" value="{{ request()->input('postcode', old('postcode')) }}" placeholder="Enter postcode">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phone">Phone</label>
                            <div class="input-group mb-3 mr-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" id="phone" name="phone" value="{{ request()->input('postcode', old('postcode')) }}" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Upload Profile Picture</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" name="profile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
    @endsection
    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $("#form").validate({
            rules: {
                email: 'required',
                password: 'required',
                password_confirmation: 'required',
            },
            messages: {
                email: "Please enter an unique Email",
                password: 'Please enter password',
                password_confirmation: 'Please enter password confirmation',
                
            }
        });
        $(document).ready(function () {
        bsCustomFileInput.init()
        })

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
