<div>


    <input wire:model="query" type="search" class="form-control rounded"/>
    <label class="form-label" for="form1">Search</label>
<div class="container">
    <br>
    <h2 class="text-center border-bottom py-4" id="gallery">Badminton Club Programs in Malaysia</h2>
    </br>
    <div class="row">
        @foreach ($this->programs as $program)
            <div class="col-4">
                <div class="event-card-wrapper">
                    <div class="thumbnail">
                        <br>
                        @foreach($program->programtypeimgs as $index => $img)
                            <a href="#" data-lightbox="pgallery{{$program->id}}">
                                @if($index > 0)
                                    <img class="img-fluid hide" src="{{'/storage/' . $img->img_src}}" />
                                @else
                                    <img class="img-fluid" src="{{'/storage/' . $img->img_src}}" />
                                @endif
                            </a>
                        @endforeach
                    </div></br>
                    <h4 class="title">{{ $program->title }}</h4>
                    <h6><strong>Badminton Club: </strong></h6><p> {{$program->club->club_name}}</p>
                    <h6><strong>Description: </strong></h6><p>{{$program->detail}}</p>
                    <h6><strong>Location: </strong></h6><p>{{ $program->location }}</p>
                    <h6><strong>Price: </strong></h6><p>RM{{ $program->price }} per session</p>
                    <br>
                    <button type="button" data-bs-toggle="modal" data-program-types-id="{{ $program->id }}" data-title="{{ $program->title }}"  data-bs-target="#exampleModalview" class="btn btn-outline-primary float-right">Info</button>

                    <a class="btn btn-info" href="{{url('customer/book-program') . '?program_id=' . $program->id}}">Book</a>

                    </br>
                    @if(isset(\Illuminate\Support\Facades\Auth::guard('customer')->user()->email))
                    @endif
                </div>
            </div>
        @endforeach
    </div>
        <div class="modal fade" id="exampleModalview" tabindex="-1" aria-labelledby="exampleModalLabelview" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelview">About {{$program->club->club_name}} </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <label for="event_id" class="col-form-label"></label>
                            <input type="hidden" id="event_id" class="form-control" name="event_id">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>Club</th>
                                            <td>{{$program->club->club_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Level of Club Program</th>
                                            <td>{{$program->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Price</th>
                                            <td>RM {{$program->price}}</td>
                                        </tr>
                                        <tr>
                                            <th>Detail</th>
                                            <td>{{$program->detail}}</td>
                                        </tr>
                                        <tr>
                                            <th>Contact Details</th>
                                            <td> {{$program->club->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <th>Gallery</th>
                                            <td>
                                                <table class="table table-bordered mt-3">
                                                    <tr>
                                                        @foreach($program->programtypeimgs as $img)
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Program Section End -->
</div>

</div>



{{--<div>--}}
{{--    <input wire:model="search" type="text" placeholder="Search users..."/>--}}

{{--    <ul>--}}
{{--        @foreach($clubs as $club)--}}
{{--            <li>{{ $club->club_name }}</li>--}}
{{--        @endforeach--}}
{{--                <button wire:click="doSomething">Do Something</button>--}}
{{--    </ul>--}}
{{--</div>--}}

{{----}}<!-- Sidenav-->
{{--<div--}}
{{--    id="sidenav-3"--}}
{{--    data-mdb-close-on-esc="false"--}}
{{--    class="sidenav"--}}
{{--    data-mdb-hidden="false"--}}
{{--    data-mdb-position="absolute"--}}
{{--    data-mdb-focus-trap="false"--}}
{{--    data-mdb-scroll-container="#scroll-container"--}}
{{--    role="navigation"--}}
{{-->--}}
{{--    <div class="text-center">--}}
{{--        <h3 class="py-4">Search Badminton Programs</h3>--}}
{{--        <hr class="m-0" />--}}
{{--    </div>--}}
{{--    <ul id="scroll-container" class="sidenav-menu">--}}
{{--        <li class="sidenav-item">--}}
{{--            <div class="input-group rounded my-2">--}}
{{--                <div class="form-outline w-auto">--}}
{{--                    <input id="search-input-sidenav" type="search" id="form1" class="form-control" />--}}
{{--                    <label class="form-label" for="form1">Search</label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--    </ul>--}}
{{--</div>--}}


{{--<label class="form-label" for="form1">Filter</label><br>--}}
{{--<div class="dropdown">--}}
{{--    <ul id="scroll-container" class="sidenav-menu">--}}
{{--        --}}{{--        <li class="sidenav-item">--}}
{{--        <div class="input-group rounded my-2">--}}
{{--            <div class="form-outline w-auto">--}}
{{--                <input id="search-input-sidenav" type="search" id="form1" class="form-control" />--}}
{{--                <label class="form-label" for="form1">Search</label>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </ul>--}}
{{--    <button wire:model="program_id" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--        Select Location--}}
{{--    </button>--}}
{{--    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--        <a class="dropdown-item" href="#">Action</a>--}}
{{--        <a class="dropdown-item" href="#">Another action</a>--}}
{{--        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--    </div>--}}

{{--    <button wire:model="program_id" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--        Select Price Range--}}
{{--    </button>--}}
{{--    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--        <a class="dropdown-item" href="#">Action</a>--}}
{{--        <a class="dropdown-item" href="#">Another action</a>--}}
{{--        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="dropdown">--}}
{{--                Select Location--}}
{{--                    <select wire:model="program_id" class="form-control" name="program_id">--}}
{{--                        <option>--- Select Location ---</option>--}}
{{--                        @foreach( as $programs)--}}
{{--                            <option value="{{$programs->id}}">{{$programs->location}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--</div>--}}
{{--                Select Price--}}
{{--                    <select wire:model="program_id" class="form-control" name="program_id">--}}
{{--                        <option>--- Select Price Range ---</option>--}}
{{--                        @foreach($programs as $program)--}}
{{--                            <option value="{{$program->id}}">{{$program->title}}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}


{{--        </table>--}}
{{--    </form>--}}
{{--</div>--}}
