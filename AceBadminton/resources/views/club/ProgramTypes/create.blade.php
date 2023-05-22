@extends('club')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Add Program Types
                    <a href="{{url('admin/ProgramTypes')}}" class ="float-right btn btn-success btn-sm">View All</a></h6>
            </div>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">{{$error}}</p>
                @endforeach
            @endif


            <div class="card-body">
                @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                    @endif
                <div class="table-responsive">
                        <form enctype="multipart/form-data" method="post" action="{{url('admin/ProgramTypes')}}">
                            @csrf
{{--                    <form method="post" action="{{url('admin/ProgramTypes')}}">--}}
                        @csrf
                        <table class="table table-bordered" >
                            <tr>
                                <th>Select Club</th>
                                <td>
                                    <select name="club_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                        @foreach($club as $club)
                                            <option value="{{$club->id}}">{{$club->club_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th>Title</th>
                                <td><input name="title"  class="form-control" />
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Select Location</th>
                                <td>
                                <select name="location" class="form-control" method="post">
                                    <option value="0">--- Select ---</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Perak">Perak</option>
                                    </select>
                            </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Select Duration(Months*)</th>--}}
{{--                                <td>--}}
{{--                                    <select name="duration" class="form-control" method="post">--}}
{{--                                        <option value="0">--- Select ---</option>--}}
{{--                                        <option value="1">1 Month</option>--}}
{{--                                        <option value="2">2 Month</option>--}}
{{--                                        <option value="3">3 Month</option>--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                            <tr>--}}
{{--                                <th>Start Date</th>--}}
{{--                                <td><input name="start_date" type="date" class="form-control" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th>Price</th>
                                <td><input name="price" type="number" class="form-control" />
                                </td>
                            </tr>
                        <tr>
                            <th>Details</th>
                            <td><textarea name="detail" class="form-control"> </textarea></td>
                        </tr>
                            <tr>
                                <th>Gallery</th>
                                <td><input type="file" multiple name="imgs[]" /></td>
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

@endsection
