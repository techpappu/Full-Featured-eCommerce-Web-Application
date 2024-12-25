<x-back-end.master>
    @section('page-title')
    Update Slide
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Slides</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Update Slide</a></li>
    @endsection
    @section('content')
    <div class="card-box">
        <x-back-end.message></x-back-end.message>

        <x-back-end.validationAlert></x-back-end.validationAlert>
        

        <form action="{{route('admin.slide.update',$data['row']->id)}}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="status" class="required">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option value="active" {{ $data['row']->status=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $data['row']->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="required">Page Title</label>
                <input type="text" class="form-control" id="title" value="{{$data['row']->title}}" name="title" placeholder="Enter Title">
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="logo">Slide Image</label>
                    <input type="file" class="dropify" name="file" data-height="300" data-default-file="{{$data['row']->getFirstMediaUrl('slide','preview')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
        $("#form").validate({
            rules: {
                status: 'required',
                title: 'required',
            },
            messages: {
                status: 'required',
                title: "Please enter a Page Title",
                
            }
        });

    </script>
    @endsection
    @section("css")
    <link rel="stylesheet" href="{{ asset('assets/libs/dropify/dropify.min.css') }}">
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
