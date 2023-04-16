<x-back-end.master>
    @section('page-title')
    Settings
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">
        <x-back-end.message></x-back-end.message>

        <form action="{{ route('admin.setting.post.update') }}" method="POST" id="form"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $data['row']->id }}">
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name"
                    value="{{ $data['row']->title }}" name="title">
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="logo">Site Logo</label>
                    <input type="file" class="dropify" name="file" data-height="100" data-default-file="{{$data['file']}}">
                </div>
                <div class="form-group col-md-8">
                    <label for="keywords"  >Keywords</label>
                    <input type="text" value="{{ $data['row']->keywords }}" name="keywords" id="keywords" data-role="tagsinput" placeholder="add keywords"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ $data['row']->phone }}" placeholder="Phone number">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $data['row']->email }}" placeholder="Type Your Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $data['row']->address }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $data['row']->city }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="postcode">Postcode</label>
                    <input type="number" class="form-control" id="postcode" name="postcode" value="{{ $data['row']->postcode }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="facebook">Facebook</label>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $data['row']->facebook }}" placeholder="Facebok Profile Link">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="twitter">Twitter</label>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fab fa-twitter"></i></span>
                        </div>
                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $data['row']->twitter }}" placeholder="twitter Profile Link">
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="youtube">Youtube</label>
                    <div class="input-group mb-3 mr-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fab fa-youtube"></i></span>
                        </div>
                        <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $data['row']->youtube }}" placeholder="youtube Channel Link">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description"
                    id="description">{{ $data['row']->description }}</textarea>
            </div>
            <div class="form-group col-3 pl-0">
                <label for="status">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option value="active" {{ $data['row']->status=='active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $data['row']->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Settings</button>
        </form>
    </div>
    @endsection
    @section('script')
    <script src="{{ asset('assets/libs/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#description').summernote({
                height: 300
            });
        });
        $("#form").validate({
            rules: {
                name: 'required',
                price: 'required',
                status: 'required',
            },
            messages: {
                name: 'Please enter a Name',
                price: 'Please enter a  price',
                status: 'Please select a status',

            }
        });

    </script>
    @endsection
    @section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/dropify/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
    <style>
        .error {
            color: red;
        }

    </style>
    @endsection
</x-back-end.master>
