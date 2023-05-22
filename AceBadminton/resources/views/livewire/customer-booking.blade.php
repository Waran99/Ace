<div>
    <div class="card-body">
        <div class="table-responsive">
            <form method="post" enctype="multipart/form-data" action="{{url('customer/booking/create')}}">
                @csrf
                <table class="table table-bordered" >
                    <tr>
                        <th>Select Clubs</th>
                        <td>
                            @if($program !== null)
                                <p>{{$program->club->club_name}}</p>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>Select Program</th>
                        <td>
                            @if($program !== null)
                                <input type="hidden" value="{{$program->id}}" class="form-control" name="program_id"/>
                                <p> {{$program->title}}</p>
                            @endif

                        </td>
                    </tr>

                    <tr>
                        <th>Pick a Date</th>
                        <td>
                            <input wire:model="date" type="text" class="form-control" id="select_date"/>
                        </td>
                    </tr>
                    <tr>
                        <th> Available slots </th>
                        <td><p>Pick a slot:</p>
                            @foreach($slots as $index => $slot)
                                <input wire:key="{{$index}}" class="form-checkbox" type="checkbox" id="slots" name="slots[{{$index}}]" value="{{$slot->id}}" {{$slot->available_slots === 0 ? 'disabled': ''}}>

                                <label for="slots">
                                    {{\Carbon\Carbon::parse($slot->date)->format('d M Y')}}
                                    {{\Carbon\Carbon::parse($slot->start_time)->format('h:m A')}}
                                    -
                                    {{\Carbon\Carbon::parse($slot->end_time)->format('h:m A')}} :
                                    <br>
                                    Available Slots {{$slot->available_slots}} / {{$slot->no_slot}}
                                </label>
{{--                                <div class="form-group">--}}
{{--                                    <label for="slots">Select date</label>--}}
{{--                                    <select multiple class="form-control" id="exampleFormControlSelect2">--}}
{{--                                        <option></option>--}}
{{--                                        <option>2</option>--}}
{{--                                        <option>3</option>--}}
{{--                                        <option>4</option>--}}
{{--                                        <option>5</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                            @endforeach
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
@once('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#select_date", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        window.addEventListener('contentChanged', event => {
            flatpickr("#select_date", {
                altInput: true,
                altFormat: "F j, Y",
                dateFormat: "Y-m-d",
            });
        });
    </script>
@endonce

