<x-back-end.auth.master>
    @section('authForm')
        <div class="account-card-box">
            <div class="card mb-0">
                <div class="card-body p-4">
                    
                    <div class="text-center">
                        <div class="my-3">
                            <a href="index.html">
                                <span><img src="{{asset('assets/images/logo.png')}}" alt="" height="28"></span>
                            </a>
                        </div>
                        <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                    </div>
                    <x-back-end.message></x-back-end.message>
        
                    <form action="{{route('postLogin')}}" method="POST" class="mt-2">
                        @csrf
                        <div class="form-group mb-3">
                            <input class="form-control" type="text" name="email" required="" placeholder="Enter your username">
                        </div>
        
                        <div class="form-group mb-3">
                            <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                        </div>
        
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>
        
                        <div class="form-group text-center">
                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Log In </button>
                        </div>
        
                    </form>
        
                </div> <!-- end card-body -->
            </div>
            <!-- end card -->
        </div>
    @endsection
</x-back-end.auth.master>