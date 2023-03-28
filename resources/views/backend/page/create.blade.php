<x-back-end.master>
    @section('page-title')
    Create New Page
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New Page</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">

        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.page.post.create')}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option selected disabled hidden>Select A Status</option>
                    <option value="draft">draft</option>
                    <option value="published">published</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Page Name</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="summernote">Description</label>
                <textarea name="" id="summernote"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300
            });
        });
        $("#form").validate({
            rules: {
                status: 'required',
                name: 'required',
            },
            messages: {
                status: 'required',
                name: "Please enter a name",
                
            }
        });

    </script>
    @endsection
    @section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
        }

    </style>
    @endsection
</x-back-end.master>
