@extends('frontlayout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-6 offset-3">
            <div class="card border border-success">
                <div class="card-body">
                    @if($checkoutSession['payment_status'] === 'paid')
                        <p class="card-text text-success text-center">Your Payment has been successful.</p>
                    @else
                        <p class="card-text text-danger text-center">Your Payment has been unsuccessful.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
