<x-back-end.master>
    @section('page-title')
    Create New Page
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New Page</a></li>
    @endsection
    @section('content')
    <div class="card-box">
        <x-back-end.message></x-back-end.message>

        <x-back-end.validationAlert></x-back-end.validationAlert>
        

        <form action="{{route('admin.page.post.update',$data['row']->id)}}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="status" class="required">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled hidden>Select A Status</option>
                    <option value="draft"  {{ $data['row']->status=='draft' ? 'selected' : '' }}>draft</option>
                    <option value="published" {{ $data['row']->status=='published' ? 'selected' : '' }}>published</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="required">Page Title</label>
                <input type="text" class="form-control" id="title" value="{{$data['row']->title}}" name="title" placeholder="Enter Title">
            </div>
            <div class="form-group">
                <label for="summernote">Description</label>
                <textarea name="content" id="summernote">{{$data['row']->content}}</textarea>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="logo">Page Thumbnail</label>
                    <input type="file" class="dropify" name="file" data-height="100" data-default-file="{{$data['row']->getFirstMediaUrl('page','preview')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
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
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
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
