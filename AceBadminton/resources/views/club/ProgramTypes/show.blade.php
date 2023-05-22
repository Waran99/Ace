@extends('club')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View {{$data->title}}
                    <a href="{{url('admin/ProgramTypes/')}}" class="float-right btn btn-success btn-sm">View All</a>
                </h6>
            </div>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" >
                        <tr>
                            <th>Title</th>
                            <td>{{$data->title}}</td>
                        </tr>

                        <tr>
                            <th>Location</th>
                            <td>{{$data->location}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Duration</th>--}}
{{--                            <td>{{$data->duration}} month</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>Start Date</th>--}}
{{--                            <td>{{$data->start_date}}</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <th>End Date</th>--}}
{{--                            @if($data->start_date)--}}
{{--                                <td>{{$data->start_date}}</td>--}}
{{--                                <td>{{(\Carbon\Carbon::make($data->start_date))->addMonths($data->duration)}}</td>--}}
{{--                            @endif--}}
{{--                        </tr>--}}
                        <tr>
                            <th>Price</th>
                            <td>RM {{$data->price}}</td>
                        </tr>
                        <tr>
                            <th>Detail</th>
                            <td>{{$data->detail}}</td>
                        </tr>

                        <tr>
                            <th>Gallery</th>
                            <td>
                                <table class="table table-bordered mt-3">
                                    <tr>
                                        @foreach($data->programtypeimgs as $img)
                                            <td class="imgcol{{$img->id}}">
                                                <img width="150" src="{{asset('/storage/'.$img->img_src)}}" />
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
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
