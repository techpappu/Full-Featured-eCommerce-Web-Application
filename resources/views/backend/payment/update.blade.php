<x-back-end.master>
    @section('page-title')
    Update Payment
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Update Payment</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">
        <x-back-end.message></x-back-end.message>
        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.payment.post.update',$data['row']->id)}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="label" class="required">Label</label>
                <input type="text" class="form-control" value="{{$data['row']->label}}" name="label">
            </div>
            <div class="form-group">
                <label for="status" class="required">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option value="active" {{ $data['row']->status=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $data['row']->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script>
        $("#form").validate({
            rules: {
                label: 'required',
                status: 'required',
            },
            messages: {
                label: 'Please enter a label',
                status: 'Please select a status',

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
