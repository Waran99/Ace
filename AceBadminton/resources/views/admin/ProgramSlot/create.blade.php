

@extends('layout')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Program Slot
                    <a href="{{url('admin/ProgramSlot')}}" class ="float-right btn btn-success btn-sm">View All</a></h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                    @endif
                <div class="table-responsive">

                    <form method="post" action="{{url('admin/ProgramSlot')}}">
                        @csrf
                        <table class="table table-bordered" >

                            <tr>
                                <th>Select Club Program </th>
                                <td>
                                    <select name="pt_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                        @foreach($programtypes as $pt)
                                            <option value="{{$pt->id}}">{{$pt->title}} by {{$pt->club->club_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>


                        <tr>
                            <th>Title</th>
                            <td><input name="title" class="form-control" />
                            </td>
                        </tr>
{{--                            <tr>--}}
{{--                                <th>Select Date</th>--}}
{{--                                <td><input name="select_date" type="date" class="form-control" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}

                            <tr>
                                <th>Select Date</th>
                                <td><input name="select_date" type="text" class="form-control" id="select_date" />
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Select day of the week</th>--}}
{{--                                <td>--}}
{{--                                    <select name="day" class="form-control" method="post">--}}
{{--                                        <option value="0">--- Select ---</option>--}}
{{--                                        <option value="Selangor">Sunday</option>--}}
{{--                                        <option value="Monday">Monday</option>--}}
{{--                                        <option value="Tuesday">Tuesday</option>--}}
{{--                                        <option value="Wednesday">Wednesday</option>--}}
{{--                                        <option value="Thursday">Thursday</option>--}}
{{--                                        <option value="Friday">Friday</option>--}}
{{--                                        <option value="Saturday">Saturday</option>--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th>Start Time</th>
                                <td><input name="start_time" type="time" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <th>End Time</th>
                                <td><input name="end_time" type="time" class="form-control" />
                                </td>
                            </tr>


                            <tr>
                                <th>Number of slot availability</th>
                                <td><input name="no_slot" type="number" class="form-control" />
                                </td>
                            </tr>


                        <tr>
                          <td colspan="2">
                              <input type="submit" class="btn btn-primary" />
                          </td>

                        </tr>
                    </table>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    @once('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr("#select_date", {
    altInput: true,
    altFormat: "F j, Y",
    dateFormat: "Y-m-d",
});
        </script>
    @endonce

@endsection
