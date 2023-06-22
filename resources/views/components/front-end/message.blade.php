@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('success') }}</strong>
    </div>
@endif
@if(session()->has('warning'))
    <div class="alert alert-warning " role="alert">
        <strong>{{ session('warning') }}</strong>
    </div>
@endif
@if(session()->has('danger'))
<div class="alert alert-danger" role="alert">
    <strong>{{ session('danger') }}</strong>
</div>
@endif

@if (session()->has('success') || session()->has('warning') || session()->has('danger'))
    <style>
        .alert-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeeba;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert {
            position: relative;
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
    </style>
@endif
