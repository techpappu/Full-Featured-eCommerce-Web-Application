<x-front-end.master>
    @section('page-title')
    My Account
    @endsection
    @section('breadcrumbs')
    <ul>
        <li>home</li>
        <li>Login</li>
    </ul>
    @endsection
    @section('content')
    <div class="container">
        <div class="six columns centered">
            <x-front-end.message></x-front-end.message>
            <h3 class="headline">Login</h3><span class="line" style="margin-bottom:20px;"></span>
            <div class="clearfix"></div>

            <form action="{{route('frontend.login.post')}}" method="POST" class="login">
                @csrf

                <p class="form-row form-row-wide">
                    <label for="username">Email Address: <span class="required">*</span></label>
                    <input type="text" class="input-text" name="email" id="username" value="" />
                </p>

                <p class="form-row form-row-wide">
                    <label for="password">Password: <span class="required">*</span></label>
                    <input class="input-text" type="password" name="password" id="password" />
                </p>

                <p class="form-row">
                    <input type="submit" class="button" name="login" value="Login" />

                    <label for="rememberme" class="rememberme">
                        <input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember Me</label>
                </p>
            </form>
            
        </div>
    </div>
    <div class="margin-top-40"></div>
    @endsection
    @section('css')
    @endsection
</x-front-end.master>
