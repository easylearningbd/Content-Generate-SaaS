@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="nk-content-inner">
<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6">Edit Template   </h2>
                 
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
     
   <form action="{{ route('store.template') }}" method="post" enctype="multipart/form-data">
     @csrf   

     <div class="row g-3 gx-gs">
                    
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Template Name </label>
            <div class="form-control-wrap">
                <input type="text" name="title" class="form-control"  value="{{ $template->title }}" >
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Template Description </label>
            <div class="form-control-wrap">
                <input type="text" name="description" class="form-control" value="{{ $template->description }}" >
            </div>
        </div>
    </div>

     <div class="col-md-6">
        <div class="form-group">
    <label for="category" class="form-label">Template Category  </label>
            <div class="form-control-wrap">
     <select name="category" class="form-select" id="category" aria-label="Default select example">
        <option selected="">Select Category</option>
        <option value="Ads" {{ $template->category == 'Ads' ? 'selected' : '' }} >Ads</option>
        <option value="Articles and Contents" {{ $template->category == 'Articles and Contents' ? 'selected' : '' }}>Articles and Contents</option>
        <option value="Blog Post" {{ $template->category == 'Blog Post' ? 'selected' : '' }}>Blog Post</option>
        <option value="Ecommerce" {{ $template->category == 'Ecommerce' ? 'selected' : '' }}>Ecommerce</option>
        <option value="Website" {{ $template->category == 'Website' ? 'selected' : '' }}>Website</option>
        <option value="Social Media" {{ $template->category == 'Social Media' ? 'selected' : '' }}>Social Media</option>
        <option value="Marketing" {{ $template->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
        <option value="Emails" {{ $template->category == 'Emails' ? 'selected' : '' }}>Emails</option>
    </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleFormControlInputText1" class="form-label">Templates Icon </label>
            <div class="form-control-wrap">
                <input type="text" name="icon" class="form-control" placeholder="(e.g., &lt;i class=&quot;fa-solid fa-book&quot;&gt;&lt;/i&gt;)" value="{{ $template->icon }}" >
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" {{ $template->is_active ? 'checked' : '' }} >
            <label class="form-check-label" for="flexCheckChecked"> Activate Template </label>
        <input type="hidden" name="is_active" value="{{ $template->is_active ? 1 : 0 }}">
        </div>
        </div>


    <div class="form-group">
        <div id="input-fields">
            <div class="row input-field-row">
    
    
    @foreach ($template->inputFields as $field)
        
        
     <div class="col-md-3">
      
        <div class="form-group">
            <label for="input_fields_0_title" class="form-label">Input Field Title * </label>
            <div class="form-control-wrap">
                <input type="text" name="input_fields[0][title]" id="input_fields_0_title" class="form-control" value="{{ $field->title }}"  required  >
            </div>
        </div> 
    </div>

    <div class="col-md-3">
      
        <div class="form-group">
            <label for="input_fields_0_description" class="form-label">Input Field Description * </label>
            <div class="form-control-wrap">
                <input type="text" name="input_fields[0][description]" id="input_fields_0_description" class="form-control"  value="{{ $field->description }}" required  >
            </div>
        </div> 
    </div>

    <div class="col-md-3">
      
        <div class="form-group">
            <label for="input_fields_0_type" class="form-label"> Field Type * </label>
            <div class="form-control-wrap">
      <select name="input_fields[0][type]" class="form-control" id="input_fields_0_type"  > 
        <option value="text" {{ $field->type == 'text' ? 'selected' : '' }}>Input Field</option>
        <option value="textarea" {{ $field->type == 'textarea' ? 'selected' : '' }}>Textarea Field</option> 
    </select>
            </div>
        </div> 
    </div>


    <div class="col-md-3">
      
        <div class="form-group">
            <label class="form-label">  </label>
            <div class="form-control-wrap">
      <input type="hidden" name="input_fields[0][is_required]"    value="1">
            </div>
        </div> 
    </div> 

     @endforeach     


            </div> 
        </div>


    <div class="form-group mt-2">
        <label for="prompt">Custom Prompt</label>
        <textarea name="prompt" placeholder="Add Your Prompt Code" class="form-control"  rows="3">{{ $template->prompt }}</textarea>
        <small>Write a 400 world aticale about {topic} with an introductions</small> 
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