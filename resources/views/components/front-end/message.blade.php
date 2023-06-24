@if(session()->has('success'))
    <div class="notification success closeable">
        <p>{{ session('success') }}</p>
        <a class="close"></a>
    </div>
@endif
@if(session()->has('warning'))
    <div class="notification warning closeable">
        <p>{{ session('warning') }}</p>
        <a class="close"></a>
    </div>
@endif
@if(session()->has('danger'))
    <div class="notification error closeable">
        <p>{{ session('danger') }}</p>
        <a class="close"></a>
    </div>
@endif
