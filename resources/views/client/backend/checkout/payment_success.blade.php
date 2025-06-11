@extends('client.client_dashboard')
@section('client') 
<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <h2 class="display-6">Payment Success </h2>
    </div>

    <div class="nk-block">
        <div class="card">
            <div class="card-body"> 
                <p>Your plan upgrade request has been submitted. Please allow 1-2 business days for bank transfer verification. You will be notified once confirmed.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Back to Dashboard</a> 
            </div> 
        </div> 
    </div> 

</div>
</div>

@endsection