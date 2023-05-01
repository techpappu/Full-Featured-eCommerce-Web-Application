<x-back-end.master>
    @section('page-title')
        <a href="{{route('admin.product.post.update',$data['product']->id)}}">{{$data['product']->name}}</a> Images
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">Images</a></li>
    @endsection
    @section('content')
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Images
        </button>
    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.product.images.create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data['product']->id}}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="logo">Chose one or more product thumbnail</label>
                            <input type="file"  name="files[]" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Images</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    <div class="card-box pb-0 overflow-hidden mt-3">
        <x-back-end.message></x-back-end.message>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data['rows'] as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td><img src="{{$row->getUrl('preview')}}" height="200" alt=""></td>
                        <td>{{$row->created_at->diffForHumans()}}</td>
                        <td>{{$row->updated_at->diffForHumans()}}</td>
                        <td>
                            <div class="d-inline">
                                <x-back-end.button.delete :row="$row" :action="route('admin.product.images.delete',$row->id)"></x-back-end.button.delete>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                
                
                </tbody>
            </table>
        </div>

        {{-- <div class="mt-2 float-right">
            {{ $data['rows']->links() }}
        </div> --}}
    </div>
    @endsection
    @section('script')
    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
            title: 'Are you sure, You want to delete this discount?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD3333',
            cancelButtonColor: '#3085D6',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                
                Swal.fire(
                'Deleted!',
                'You Tax has been deleted.',
                'success'
                )
                form.submit();
            }
            })
        });

    </script>
    @endsection
    @section('css')
        <link rel="stylesheet" href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}">
    @endsection 
</x-back-end.master>