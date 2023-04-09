<x-back-end.master>
    @section('page-title')
        Roles <a href="{{route('admin.role.create')}}" class="btn btn-outline-primary waves-effect waves-light">Add New</a>
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">All Roles</a></li>
    @endsection
    @section('content')
    <div class="card-box pb-0 overflow-hidden">
        <x-back-end.message></x-back-end.message>
        <form action="">
        <div class="table-responsive">
            <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        <th>Permission Name</th>
                        <th>Allow</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['rows'] as $row)
                        <tr>
                            <td>{{$row->name}}</td>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$row->id}}" @if(in_array($row->id,$data['allowedpermissions'])) checked="checked" @endif/>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group text-right">
            <button class="btn btn-success btn-lg">Save</button>
        </div>
        </form>
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
            title: 'Are you sure, You want to delete this shipping?',
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