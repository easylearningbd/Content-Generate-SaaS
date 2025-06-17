@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Add Chat Assistant  </h2>
                 
            </div>
        </div>
    </div><!-- .nk-page-head -->
    <div class="nk-block">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-head-content">
               
            </div>
        </div><!-- .nk-block-head -->
        <div class="card shadown-none">
            <div class="card-body">
     
     <form action="{{ route('chat-assistants.store') }}" method="post" enctype="multipart/form-data">
        @csrf   

     <div class="row g-3 gx-gs">
                    
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Select Chat Assistants Avater </label>
            <div class="form-control-wrap">
                <input type="file" name="avatar" class="form-control"  >
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Active Chat Assistant </label>
            <div class="form-control-wrap">
                <input type="checkbox" name="is_active" value="1" >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Chat Assistant Name </label>
            <div class="form-control-wrap">
                <input type="text" name="name" class="form-control"  >
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Chat Assistant Role Description </label>
            <div class="form-control-wrap">
                <input type="text" name="role_description" class="form-control"  >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Chat Assistant Welcome Message </label>
            <div class="form-control-wrap">
                <input type="text" name="welcome_message" class="form-control"  >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
       <label for="category" class="form-label">Chat Assistant Group </label>
            <div class="form-control-wrap">
          <select name="category" class="form-select" id="category" aria-label="Default select example">
            <option selected="">Open this select menu</option>
            <option value="Business">Business</option>
            <option value="Education">Education</option>
            <option value="Health">Health</option>
        </select>
            </div>
        </div>
    </div>

     <div class="col-md-12">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Chat Instructions </label>
            <div class="form-control-wrap">
               <textarea name="instructions" placeholder="Explain in details what AI Chat Assistant Needs to do.." class="form-control"   rows="3"></textarea>
            </div>
        </div>
    </div> 
 
               
    <div class="col-lg-12 col-xl-12">
<button type="submit" class="btn btn-secondary">Save Changes</button> 
    </div>
            
                    
    </div>
    </form> 



            </div><!-- .card-body -->
        </div><!-- .card -->
    </div><!-- .nk-block -->
     


</div>
</div>


 


@endsection