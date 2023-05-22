@extends('frontlayout')
@section('content')
    hi your logged in as {{\Illuminate\Support\Facades\Auth::guard('customer')->user()['full_name']}}
<div class="container my-4">
	<h3 class="mb-3">Login</h3>
	@if(Session::has('error'))
	<p class="text-danger">{{session('error')}}</p>
	@endif
	<form method="post" action="{{url('/login')}}">
		@csrf
        hi your logged in as {{\Illuminate\Support\Facades\Auth::guard('customer')->user()['full_name']}}
		<table class="table table-bordered">
			<tr>
				<th>Email<span class="text-danger">*</span></th>
				<td><input required type="email" class="form-control" name="email"></td>
			</tr>
			<tr>
				<th>Password<span class="text-danger">*</span></th>
				<td><input required type="password" class="form-control" name="password"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="btn btn-primary" value="Login"/></td>
			</tr>
		</table>
	</form>
</div>
@endsection
