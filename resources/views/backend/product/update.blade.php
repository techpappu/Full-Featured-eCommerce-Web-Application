<x-back-end.master>
    @section('page-title')
    update Product
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">update Product</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">
        <x-back-end.message></x-back-end.message>
        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.product.post.update',$data['row']->id)}}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Name</label>
                <input type="text" class="form-control" id="name" value="{{$data['row']->name}}" name="name">
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="price" class="required" >Price</label>
                    <input type="number" class="form-control" id="price" value="{{$data['row']->getRawOriginal('price')}}" name="price">
                </div>
                <div class="form-group col-md-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" value="{{$data['row']->quantity}}" name="quantity">
                </div>
                <div class="form-group col-md-3">
                    <label for="sale_price">Sale Price</label>
                    <input type="number" class="form-control" id="sale_price" value="{{$data['row']->getRawOriginal('sale_price')}}" name="sale_price">
                </div>
                <div class="form-group col-md-3">
                    <label for="date-input">Sale Expiry Date</label>
                    <input class="form-control" name="sale_expiry_date" type="date" value="{{$data['row']->sale_expiry_date}}" value="" id="date-input">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10">
                    <label for="description">Description</label>
                    <textarea name="description" id="description">
                        {{$data['row']->description}}
                    </textarea>
                </div>
                <div class="form-group col-md-2 pl-0">
                    <h6>Categories</h6>
                    
                    <div class="overflow-scroll">
                        @foreach ($data['categories'] as $row )
                        <div class="form-check">
                            <input @if(in_array($row->id,$data['inCategories'])) checked="checked" @endif class="form-check-input position-static" type="checkbox" name="categories[]" id="blankCheckbox" value="{{$row->id}}">
                            <label for="blankCheckbox">{{$row->name}}</label>
                        </div>
                        @endforeach
                        
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{$data['row']->meta_title}}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="5">{{$data['row']->meta_description}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="status" class="required">Status</label>
                    <select name="status" class="custom-select" id="status">
                        <option value="active" {{ $data['row']->status=='active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ $data['row']->status=='inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="logo">Product Thumbnail</label>
                    <input type="file" class="dropify" name="file[]" data-height="100" multiple data-default-file="{{$data['row']->getFirstMediaUrl('product','preview')}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
                price: 'required',
                status: 'required',
            },
            messages: {
                name: 'Please enter a Name',
                price: 'Please enter a Discount Price',
                status: 'Please select a Status',

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
        .overflow-scroll{
            overflow-x: scroll;
            width: 100%;
            height: 345px;
            border: 1px solid #CCCCCC;
            border-radius: 2px;
            padding: 5px;
        }
        .overflow-scroll label{
            display:inline-flex !important;
        }

    </style>
    @endsection
</x-back-end.master>
