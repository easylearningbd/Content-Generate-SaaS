@extends('client.client_dashboard')
@section('client') 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Personal Account</h2>
            </div>
        </div>
    </div><!-- .nk-page-head -->
    <div class="nk-block">
        <ul class="nav nav-tabs mb-3 nav-tabs-s1">
            <li class="nav-item">
                <button class="nav-link active" type="button" data-bs-toggle="tab" data-bs-target="#profile-tab-pane">Profile</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#payment-billing-tab-pane">Payment &amp; Billing</button>
            </li>
            <li class="nav-item">
                <button class="nav-link" type="button" data-bs-toggle="tab" data-bs-target="#payment-billing-2-tab-pane">Payment &amp; Billing v2</button>
            </li>
        </ul>
        <div class="tab-content">
    <div class="tab-pane fade show active" id="profile-tab-pane">
   
   <form action="{{ route('user.profile.store') }}" method="post" enctype="multipart/form-data">
        @csrf   

     <div class="row g-3 gx-gs">
                    
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Name </label>
            <div class="form-control-wrap">
                <input type="text" name="name" class="form-control" value="{{ $profileData->name }}"  >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Email </label>
            <div class="form-control-wrap">
                <input type="email" name="email" class="form-control" value="{{ $profileData->email }}"  >
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Phone </label>
            <div class="form-control-wrap">
                <input type="text" name="phone" class="form-control" value="{{ $profileData->phone }}"  >
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Address </label>
            <div class="form-control-wrap">
                <input type="text" name="address" class="form-control" value="{{ $profileData->address }}"  >
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Profile Image </label>
            <div class="form-control-wrap">
                <input type="file" name="photo" class="form-control" id="image" >
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">  </label>
            <div class="form-control-wrap">
                 <img id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/user_images/'.$profileData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-xl img-thumbnail float-start" style="width: 80px; height:80px;">
            </div>
        </div>
    </div>
               
    <div class="col-lg-12 col-xl-12">
<button type="submit" class="btn btn-secondary">Save Changes</button> 
    </div>
            
                    
    </div>
    </form>      
                
              
    </div><!-- .tab-pane -->
    @include('client.body.payment_billing')  
    @include('client.body.payment_billing_two')
            
        </div><!-- .tab-content -->
    </div><!-- .nk-block -->
</div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })

</script>



@endsection