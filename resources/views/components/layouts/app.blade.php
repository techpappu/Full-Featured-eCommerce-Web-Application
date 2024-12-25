<x-back-end.master>
    @section('page-title')
        Orders
    @endsection
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
        <li class="breadcrumb-item"><a href="javascript: void(0);">All Orders</a></li>
    @endsection
    @section('content')
        {{$slot}}
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

