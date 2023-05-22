@extends('frontlayout')
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<!--Slider Section Start-->
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('img/banner-7.jpg')}}" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/banner-4.jpg')}}" class="d-block w-100 " alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/banner-5.jpg')}}" class="d-block w-100 " alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!--Slider Section End-->

<!-- Show Program Section Start -->
    <livewire:counter/>

{{--    <div class="container index">--}}
{{--    <br>--}}
{{--    <h2 class="text-center border-bottom py-4" id="gallery">Programs</h2>--}}
{{--    </br>--}}

{{--    <div class="row">--}}
{{--        @foreach ($ProgramTypes as $program)--}}
{{--            <div class="col-4">--}}
{{--                <div class="event-card-wrapper">--}}
{{--                    <div class="thumbnail">--}}
{{--                        <br>--}}
{{--                        @foreach($program->programtypeimgs as $index => $img)--}}
{{--                            <a href="#" data-lightbox="pgallery{{$program->id}}">--}}
{{--                                @if($index > 0)--}}
{{--                                    <img class="img-fluid hide" src="{{'/storage/' . $img->img_src}}" />--}}
{{--                                @else--}}
{{--                                    <img class="img-fluid" src="{{'/storage/' . $img->img_src}}" />--}}
{{--                                @endif--}}
{{--                            </a>--}}
{{--                        @endforeach--}}
{{--                    </div></br>--}}
{{--                    <h4 class="title">{{ $program->title }}</h4>--}}
{{--                    <h6><strong>Badminton Club: </strong></h6><p> {{$program->club->club_name}}</p>--}}
{{--                    <h6><strong>Description: </strong></h6><p>{{$program->detail}}</p>--}}
{{--                    <h6><strong>Location: </strong></h6><p>{{ $program->location }}</p>--}}
{{--                    <h6><strong>Price: </strong></h6><p>{{ $program->price }}</p>--}}
{{--                    <br>--}}
{{--                    <button type="button" data-bs-toggle="modal" data-program-types-id="{{ $program->id }}" data-title="{{ $program->title }}"  data-bs-target="#exampleModalview" class="btn btn-outline-primary float-right">Info</button>--}}
{{--                    <button type="button" class="btn btn-light"  data-program-types-id="{{ $ptype->id }}" data-title="{{ $ptype->title }}">--}}
{{--                        Info--}}
{{--                    </button>--}}
{{--                    <a class="btn btn-info" href="{{url('customer/booking') . '?program_id=' . $program->id}}">Book</a>--}}

{{--                    </br>--}}
{{--                    @if(isset(\Illuminate\Support\Facades\Auth::guard('customer')->user()->email))--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="exampleModalview" tabindex="-1" aria-labelledby="exampleModalLabelview" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabelview">About {{$program->club->club_name}} </h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="">--}}
{{--                        <label for="event_id" class="col-form-label"></label>--}}
{{--                        <input type="hidden" id="event_id" class="form-control" name="event_id">--}}

{{--                        <div class="card-body">--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table table-bordered" >--}}
{{--                                    <tr>--}}
{{--                                        <th>Club</th>--}}
{{--                                        <td>{{$program->club->club_name}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Level of Club Program</th>--}}
{{--                                        <td>{{$program->title}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Price</th>--}}
{{--                                        <td>RM {{$program->price}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Detail</th>--}}
{{--                                        <td>{{$program->detail}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Contact Details</th>--}}
{{--                                        <td> {{$program->club->mobile}}</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <th>Gallery</th>--}}
{{--                                        <td>--}}
{{--                                            <table class="table table-bordered mt-3">--}}
{{--                                                <tr>--}}
{{--                                                    @foreach($program->programtypeimgs as $img)--}}
{{--                                                        <td class="imgcol{{$img->id}}">--}}
{{--                                                            <img width="150" src="{{asset('/storage/'.$img->img_src)}}" />--}}
{{--                                                        </td>--}}
{{--                                                    @endforeach--}}
{{--                                                </tr>--}}
{{--                                            </table>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                </table>--}}
{{--                                </td>--}}
{{--                                </tr>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--<!-- End Program Section End -->--}}

{{--    <div class="modal fade" id="exampleModalbook" tabindex="-1" aria-labelledby="exampleModalLabelbook" aria-hidden="true">--}}
{{--        <div class="modal-dialog">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabelbook">Book Program</h5>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="">--}}

{{--                        <label for="event_id" class="col-form-label"></label>--}}

{{--                        <input type="hidden" id="event_id" class="form-control" name="event_id">--}}

{{--                        --}}{{--                        <label for="name" class="col-form-label">Name:</label>--}}
{{--                        --}}{{--                        <input type="text" id="name" class="form-control" name="name">--}}

{{--                        --}}{{--                        <label for="email" class="col-form-label">Email:</label>--}}
                        {{--                        <input type="text" id="email" name="email" class="form-control">--}}

                        {{--                        <label  for="phone" class="col-form-label">Phone:</label>--}}
                        {{--                        <input type="text" id="phone" name="phone" class="form-control">--}}

                        {{--                        <label for="description" class="col-form-label">Description:</label>--}}
                        {{--                        <textarea class="form-control mb-3" id="description" name="description"></textarea>--}}


{{--                        <br>  <input type="submit" value="Submit">--}}
{{--                        <input type="hidden" id="_token" value="{{ csrf_token() }}">--}}

                        {{--                        <input type=button value="Cancel">--}}
                        {{--                        <input type="hidden" id="_token" value="{{ csrf_token() }}">--}}



                        {{--                        <a href="{{ \Illuminate\Support\Facades\URL::previous() }}" class="btn btn-default">Back</a>--}}
{{--                        <button type="button"  class="btn btn-default" onclick="window.reloadPage()">--}}
{{--                            Back--}}
{{--                        </button>--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}

    <!-- Show Program Section Start -->


{{--    <div class="container index">--}}
{{--        <br>--}}
{{--        <h2 class="text-center border-bottom py-4" id="gallery"> Badminton Clubs</h2>--}}
{{--        </br>--}}
{{--        <div class="row">--}}
{{--            @foreach ($Club as $club)--}}
{{--                <div class="col-4">--}}
{{--                    <div class="event-card-wrapper">--}}
{{--                        <div class="thumbnail">--}}
{{--                            <br>--}}
{{--                            @foreach($club->programtypeimgs as $index => $img)--}}
{{--                                <a href="#" data-lightbox="pgallery{{$program->id}}">--}}
{{--                                    @if($index > 0)--}}
{{--                                        <img class="img-fluid hide" src="{{'/storage/' . $img->img_src}}" />--}}
{{--                                    @else--}}
{{--                                        <img class="img-fluid" src="{{'/storage/' . $img->img_src}}" />--}}
{{--                                    @endif--}}
{{--                                </a>--}}
{{--                            @endforeach--}}
{{--                        </div></br>--}}
{{--                        <h4 class="title">{{ $program->title }}</h4>--}}
{{--                        <h6><strong>Badminton Club: </strong></h6><p> {{$program->club->club_name}}</p>--}}
{{--                        <h6><strong>Description: </strong></h6><p>{{$program->detail}}</p>--}}
{{--                        <h6><strong>Location: </strong></h6><p>{{ $program->location }}</p>--}}
{{--                        <br>--}}
{{--                        <a href="{{url('view')}}" data-program-types-id="{{ $program->id }}" data-title="{{ $program->title }}" class="btn btn-outline-primary float-right" >Info</a>--}}
{{--                        </br>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    </div>--}}
{{--    </div>--}}


    <script>
        function reloadPage() {
            const modal = $('#exampleModal')[0]
            var modalOvarlay = $('.modal-backdrop')[0]
            modal.classList.remove('show')
            modalOvarlay.remove('show')
        }
        window.onload = () => {


            if ( sessionStorage.getItem('data') ) {
                let data = JSON.parse(sessionStorage.getItem('data'))
                console.log(data['message'])
                if(data['success']){
                    window.PNotify.alert({
                        text: data['message'],
                        type: 'success',
                        delay: 2000
                    });
                }else{
                    window.PNotify.alert({
                        text: data['message'],
                        type: 'error',
                        delay: 2000
                    });
                }
                sessionStorage.removeItem('data');
            }

            if (window.jQuery) {
                $(document).ready(function(){
                    $('#exampleModal').on('show.bs.modal', function(e) {
                        var ptypeid = $(e.relatedTarget).data('program-types-id');
                        $(e.currentTarget).find('input[name="program_types_id"]').val(ptypeid);
                    });

                    $("form").on("submit", function(event){
                        event.preventDefault();
                        var form = $(this);
                        var headers = {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                            // 'Content-type': 'application/json;charset=utf-8'
                        }
                        var data = {
                            'program_types_id': parseInt(form.find('input[name="program_types_id"]').val()),
                        };

                        var request = $.ajax({
                            url: "booking",
                            type: "post",
                            headers: headers,
                            data: data
                        });
                        request.done(function (response){
                            reloadPage()

                            sessionStorage.setItem('data', JSON.stringify(response));
                            location.reload()
                        });
                    });
                });
            } else {
                // jQuery is not loaded
                alert("Doesn't Work");
            }
        }

    </script>


    <!-- LightBox css -->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor')}}/lightbox2-2.11.3/dist/css/lightbox.min.css" />
    <!-- LightBox Js -->
    <script type="text/javascript" src="{{asset('vendor')}}/lightbox2-2.11.3/dist/js/lightbox.min.js"></script>

    <style type="text/css">
        .hide{
            display: none;
        }
    </style>
@endsection
{{--</body>--}}
{{--</html>--}}

