@extends('club')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update {{$data->title}}
                    <a href="{{url('admin/ProgramTypes')}}" class ="float-right btn btn-success btn-sm">View All</a></h6>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="text-success">{{session('success')}}</p>
                @endif
                <div class="table-responsive">
                    <form enctype="multipart/form-data" method="post" action="{{url('admin/ProgramTypes/'.$data->id)}}">
                        @csrf
                        @method('put')
                        <table class="table table-bordered" >

                            <tr>
                                <th>Select Club</th>
                                <td>
                                    <select name="club_id" class="form-control">
                                        <option value="0">--- Select ---</option>
                                        @foreach($club as $club)
                                            <option @if($data->club_id==$club->id) selected @endif
                                            value="{{$club->id}}">{{$club->club_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Title</th>
                                <td><input value="{{$data->title}}" name="title"  type="text" class="form-control" />
                                </td>
                            </tr>
                            <tr>
                                <th>Select Location</th>
                                <td>
                                    <select name="location" class="form-control">
                                        <option value="{{null}}" @if($data->location == null) selected @endif>--- Select ---</option>
                                        <option value="Selangor" @if($data->location == 'Selangor') selected @endif>Selangor</option>
                                        <option value="Kuala Lumpur" @if($data->location == 'Kuala Lumpur') selected @endif>Kuala Lumpur</option>
                                        <option value="Perak" @if($data->location == 'Perak') selected @endif>Perak</option>
                                    </select>
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <th>Select Duration</th>--}}
{{--                                <td>--}}
{{--                                    <select name="duration" class="form-control">--}}
{{--                                        <option value="{{null}}" @if($data->duration == null) selected @endif>--- Select ---</option>--}}
{{--                                        <option value="1" @if($data->duration == '1') selected @endif>1 Month</option>--}}
{{--                                        <option value="2" @if($data->duration == '2') selected @endif>2 Month</option>--}}
{{--                                        <option value="3" @if($data->duration == '3') selected @endif>3 Month</option>--}}
{{--                                    </select>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <th>Start date</th>--}}
{{--                                <td><input value="{{$data->start_date}}" name="start_date"  type="date" class="form-control" />--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <th>Price</th>
                                <td><input value="{{$data->price}}" name="price" type="number" class="form-control" />
                                </td>
                            </tr>

                            <tr>
                                <th>Details</th>
{{--                                <td>--}}
{{--                                    <table class="table table-bordered">--}}
                                      <td>
                                        <textarea name="detail" class="form-control">{{$data->detail}}</textarea></td>

{{--                                    </table>--}}
                            </tr>
                            <th>Gallery Images</th>
                            <td>
                                <table class="table table-bordered mt-3">
                                    <tr>
                                        <input type="file" multiple name="imgs[]" />
                                        @foreach($data->programtypeimgs as $img)
                                            <td class="imgcol{{$img->id}}">
                                                <img width="150" src="{{'/storage/' . $img->img_src}}" />
                                                <p class="mt-2">
                                                    <button type="button" onclick="return confirm('Are you sure you want to delete this image??')" class="btn btn-danger btn-sm delete-image" data-image-id="{{$img->id}}"><i class="fa fa-trash"></i></button>
                                                </p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
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
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $(".delete-image").on('click',function(){
                var _img_id=$(this).attr('data-image-id');
                var _vm=$(this);
                $.ajax({
                    url:"{{url('admin/programtypeimage/delete')}}/"+_img_id,
                    dataType:'json',
                    beforeSend:function(){
                        _vm.addClass('disabled');
                    },
                    success:function(res){
                        if(res.bool==true){
                            $(".imgcol"+_img_id).remove();
                        }
                        _vm.removeClass('disabled');
                    }
                });
            });
        });
    </script>
@endsection

@endsection
