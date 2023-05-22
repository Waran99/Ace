@extends('layout')
@section('content')
<!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Booking
                    <a href="{{url('admin/booking')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>
            <livewire:admin-booking :customers="$customers" :clubs="$clubs" />
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection
