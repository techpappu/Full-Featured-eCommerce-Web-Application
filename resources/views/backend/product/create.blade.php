<x-back-end.master>
    @section('page-title')
    Create New product
    @endsection
    @section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
    <li class="breadcrumb-item"><a href="javascript: void(0);">Create New product</a></li>
    @endsection
    @section('content')
    <div class="card-box overflow-hidden">

        <x-back-end.validationAlert></x-back-end.validationAlert>

        <form action="{{route('admin.product.post.create')}}" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="name" class="required">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="d-flex">
                <div class="form-group col-3">
                    <label for="price" class="required" >Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                </div>
                <div class="form-group col-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
                </div>
                <div class="form-group col-3">
                    <label for="sale_price">Sale Price</label>
                    <input type="number" class="form-control" id="sale_price" name="sale_price">
                </div>
                <div class="form-group col-3">
                    <label for="date-input">Sale Expiry Date</label>
                    <input class="form-control" name="sale_expiry_date" type="date" value="" id="date-input">
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" ></textarea>
            </div>
            <div class="form-group col-3">
                <label for="status" class="required">Status</label>
                <select name="status" class="custom-select" id="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
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
