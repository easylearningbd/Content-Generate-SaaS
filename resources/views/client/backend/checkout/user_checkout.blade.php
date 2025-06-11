@extends('client.client_dashboard')
@section('client') 
<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <h2 class="display-6">Upgrade Your Plan </h2>
    </div>

    <div class="nk-block">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>                            
                        @endforeach
                    </ul> 
                </div> 
                @endif

    <form action="{{ route('user.process.checkout') }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="plan_id">Select Plan</label>
        <select name="plan_id" class="form-control" required>
            <option value="">Select Plan</option>
            @foreach ($allPlans as $plan)
            <option value="{{ $plan->id }}">{{ $plan->name }} - ${{ $plan->price }}/month ({{ $plan->monthly_word_limit }}) Words</option> 
            @endforeach
        </select> 
    </div>

    <div class="form-group mb-3">
        <label for="bank_name">Bank Name</label>
        <input type="text" name="bank_name" class="form-control">
    </div>

     <div class="form-group mb-3">
        <label for="account_holder">Account Holder Name</label>
        <input type="text" name="account_holder" class="form-control">
    </div>

     <div class="form-group mb-3">
        <label for="account_number">Account Number</label>
        <input type="text" name="account_number" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submi to Bank Transfer</button>

    </form>


            </div> 
        </div> 
    </div>








</div>
</div>

@endsection