<x-back-end.master>
    @section('page-title')
    Create New Category
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Categories</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New Category</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">

        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.category.post.create')}}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name" class="required">Category Name</label>
                    <input type="text" class="form-control" id="name" value="{{ request()->input('name', old('name')) }}" name="name">
                </div>
                <div class="form-group col-md-6">
                    <label for="file" class="required">Category Image</label>
                    <input type="file" class="dropify" id="file" name="file" data-height="100" data-default-file="">
                </div>
            </div>
            
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description">
                    {{ request()->input('name', old('name')) }}
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
            $('#description').summernote({
                height: 300
            });
        });
        $("#form").validate({
            rules: {
                name: 'required',
            },
            messages: {
                name: 'Please enter a name',

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
