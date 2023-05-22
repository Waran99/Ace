<div>
<div></div>
    <!-- Begin Page Content -->
{{--    <div class="container-fluid">--}}
{{--            <form url="stripe/checkout" >--}}
{{--                <button type="submit">Checkout</button>--}}
{{--            </form>--}}
    <div class="container">
        <h3 class="mb-3 mt-3">
            My Bookings
        </h3>
        <div class="d-flex flex-column">
            @foreach($this->bookings as $booking)
                <div class="card my-3">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <div class="d-flex">
                                <h5 class="card-title mx-3">#{{$booking->id}}</h5>
                                <p class="mx-3">
                                    Booked at {{\Carbon\Carbon::parse($booking->updated_at)->format('d M Y')}}
                                </p>
                                @if($booking['payment_status'] === 'PAID')
                                    <p class="text-success">{{$booking['payment_status']}}</p>
                                @else
                                    <form action="{{route('customer.checkout.')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="booking_id" value="{{$booking->id}}">
                                        <button type="submit" class="btn btn-primary mx-3">
                                            Pay
                                        </button>
                                    </form>
                                @endif

                            </div>
                            <div class="d-flex">
                                @foreach($booking->bookingSlots as $slot)
                                    <div class="w-100">
                                        <p class="pl-5">
                                            {{\Carbon\Carbon::parse($slot->date)->format('d M Y')}}
                                            {{\Carbon\Carbon::parse($slot->start_time)->format('h:m A')}}
                                            -
                                            {{\Carbon\Carbon::parse($slot->end_time)->format('h:m A')}}
                                        </p>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

{{--        <!-- DataTales Example -->--}}
{{--        <div class="card shadow mb-4">--}}
{{--            <div class="card-header py-3">--}}
{{--            </div>--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Booking ID</th>--}}
{{--                            <th>Program Title</th>--}}
{{--                            <th>Price</th>--}}
{{--                            <th>Date of program</th>--}}
{{--                            <th>Start time of program</th>--}}
{{--                            <th>End time of program</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tfoot>--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Booking ID</th>--}}
{{--                            <th>Program Title</th>--}}
{{--                            <th>Price</th>--}}
{{--                            <th>Date of program</th>--}}
{{--                            <th>Start time of program</th>--}}
{{--                            <th>End time of program</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </tfoot>--}}
{{--                        <tbody>--}}
{{--                        --}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    <!-- /.container-fluid -->


@section('scripts')
    <!-- Custom styles for this page -->
        <link href="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Page level plugins -->
        <script src="{{asset('public')}}/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('public')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('public')}}/js/demo/datatables-demo.js"></script>

    @endsection
</div>
