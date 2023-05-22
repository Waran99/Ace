<div>
    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        <div class="table-responsive">
            <form method="post" enctype="multipart/form-data" action="{{url('admin/booking')}}">
                @csrf
                <table class="table table-bordered" >
                    <tr>
                        <th>Select Customer</th>
                        <td>
                            <select wire:model="customer_id" class="form-control" name="customer_id">
                                <option>--- Select Customer ---</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <th>Select Program</th>
                        <td>
                            <select wire:model="program_id" class="form-control" name="program_id">
                                <option>--- Select Program ---</option>
                                @foreach($programs as $program)
                                    <option value="{{$program->id}}">{{$program->title}}</option>
                                @endforeach
                            </select>
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
                            @php
                                $order = 0;
                            @endphp
                            @foreach($slots as $slot)
                                <input type="checkbox" id="slots" name="slots[{{$order}}]" value="{{$slot->id}}">
                                <label for="slots">
                                    {{\Carbon\Carbon::parse($slot->date)->format('d M Y')}}
                                    {{\Carbon\Carbon::parse($slot->start_time)->format('h:m A')}}
                                    -
                                    {{\Carbon\Carbon::parse($slot->end_time)->format('h:m A')}}
                                </label>
                                <br>
                                @php
                                    $order++;
                                @endphp
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

