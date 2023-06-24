<x-back-end.master>
    @section('page-title')
        Orders
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">All Orders</a></li>
    @endsection
    @section('content')
    <div class="card-box pb-0 overflow-hidden">
        <x-back-end.message></x-back-end.message>
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Billing</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data['rows'] as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td><a href="{{route('admin.order.view',$row->id)}}">{{$row->user->profile->first_name}} {{$row->user->profile->last_name}}</a></td>
                        <td>
                            {{$row->created_at->diffForHumans()}}
                        </td>
                        <td>{{$row->status}}</td>
                        <td>
                            {{$row->user->profile->address}}<br>
                            {{$row->user->profile->district}}
                        </td>
                        <td>{{$settings->currency_prefix}} {{number_format((float)$row->grand_total,2,'.'.'')}}</td>
                        <td>
                            <div class="d-inline">
                                <a href="{{route('admin.page.update',$row->id)}}" class="btn d-inline-block waves-effect waves-light btn-primary ">
                                        <i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                
                
                
                </tbody>
            </table>
        </div>
        <div class="mt-2 float-right">
            {{ $data['rows']->links() }}
        </div>
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
            title: 'Are you sure, You want to delete this Page?',
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
                'You page has been deleted.',
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