@extends('layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View Program Slot
                    <a href="{{url('admin/ProgramSlot/')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <tr>
                            <th>Program</th>
                            <td>{{$data->programtype->title}} by {{$data->programtype->club->club_name}} </td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{$data->date}}</td>
                        </tr>
                        <tr>
                            <th>Start time</th>
                            <td>{{$data->start_time}}</td>
                        </tr>

                        <tr>
                            <th>End Time</th>
                            <td>{{$data->end_time}}</td>
                        </tr>
                        <tr>
                            <th>Number of slot availability</th>
                            <td>{{$data->no_slot}}</td>
                        </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
