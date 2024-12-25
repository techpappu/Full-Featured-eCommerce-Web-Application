<x-front-end.master>
    @section('page-title')
    My Account
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Register</li>
    </ul>
    @endsection
    @section('content')
    <div class="container">
        <div class="six columns centered">
            <x-front-end.validationAlert></x-front-end.validationAlert>
            <x-front-end.message></x-front-end.message>
            <h3 class="headline">Register</h3><span class="line" style="margin-bottom:20px;"></span>
            <div class="clearfix"></div>
    
            <form action="{{route('frontend.register.post')}}" method="POST" class="register" id="form">
                @csrf
                <p class="form-row form-row-wide">
                    <label for="first_name">First Name: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="first_name" id="first_name" />
                </p>
                <p class="form-row form-row-wide">
                    <label for="last_name">Last Name: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="last_name" id="last_name" />
                </p>
                <p class="form-row form-row-wide">
                    <label for="reg_email">Email Address: <span class="required">*</span></label>
                    <input type="email" class="input-text" name="email" id="reg_email" />
                </p>
    
    
                <p class="form-row form-row-wide">
                    <label for="reg_password">Password: <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password" id="reg_password" />
                </p>
    
                <p class="form-row form-row-wide">
                    <label for="reg_password2">Repeat Password: <span class="required">*</span></label>
                    <input type="password" class="input-text" name="password_confirmation" id="reg_password2" />
                </p>
    
    
                <p class="form-row">
                    <input type="submit" class="button" name="register" value="Register" />
                </p>
    
            </form>
        </div>
    </div>
    <div class="margin-top-40"></div>
    @endsection

    @section('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
        $("#form").validate({
            rules: {
                first_name: 'required',
                last_name: 'required',
                email: 'required',
                email: 'required',
                password: 'required',
                password_confirmation: 'required',
            },
            messages: {
                first_name: "Please enter First Name",
                first_name: "Please enter  Last Name",
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
    </style>
    @endsection
</x-front-end.master>
