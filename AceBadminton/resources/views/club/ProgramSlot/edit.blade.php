@extends('club')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update {{$data->title}}
                    <a href="{{url('admin/ProgramSlot')}}" class ="float-right btn btn-success btn-sm">View All</a></h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                @endif
                <div class="table-responsive">
                    <form method="post" action="{{url('admin/ProgramSlot/'.$data->id)}}">
                        @csrf
                        @method('put')
                        <table class="table table-bordered" >
                            <tr>
                                <th>Select Program Type</th>
                                <td>
                                    <select name="pt_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                        @foreach($programtypes as $pt)
                                            <option @if($data->program_types_id==$pt->id) selected @endif
                                                {{$pt->club}}
                                                    value="{{$pt->id}}">{{$pt->title}} By {{$pt->club->club_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td><input value="{{$data->title}}" name="title"  type="text" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <th>Select Date</th>
                                <td><input value="{{$data->date}}" name="select_date" type="text" class="form-control" id="select_date" />
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Date</th>--}}
{{--                                <td><input value="{{$data->select_date}}" name="select_date"  type="text" class="form-control" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>Select day</th>--}}
{{--                                <td>--}}
{{--                                    <select name="day" class="form-control">--}}
{{--                                        <option value="{{null}}" @if($data-> day== null) selected @endif>--- Select ---</option>--}}
{{--                                        <option value="Sunday" @if($data->day == 'Sunday') selected @endif>Sunday</option>--}}
{{--                                        <option value="Monday " @if($data->day == ' Monday') selected @endif> Monday</option>--}}
{{--                                        <option value="Tuesday" @if($data->day == 'Tuesday') selected @endif>Tuesday</option>--}}
{{--                                        <option value="Wednesday" @if($data->day == 'Wednesday') selected @endif>Wednesday</option>--}}
{{--                                        <option value="Thursday" @if($data->day == 'Thursday') selected @endif>Thursday</option>--}}
{{--                                        <option value="Friday" @if($data->day == 'Friday') selected @endif>Friday</option>--}}
{{--                                        <option value="Saturday" @if($data->day == 'Saturday') selected @endif>Saturday</option>--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                            </tr>--}}


                            <tr>
                                <th>Start date & time</th>
                                <td><input value="{{$data->start_time}}" name="start_time"  type="time" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <th>End date & time</th>
                                <td><input value="{{$data->end_time}}" name="end_time"  type="time" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <th>No of slot availability</th>
                                <td><input value="{{$data->no_slot}}" name="no_slot"  type="number" class="form-control" />
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
