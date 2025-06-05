@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .nk-editor {
        border: 1px solid #dee2e6;
        border-radius: 4px;
    }
</style>

<div class="nk-content-inner">
<div class="nk-content-body">
    
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-between">
            <div class="nk-block-head-content">
                <h2 class="display-6"> {{ $template->title  }}   </h2>
                 <p> {{ $template->description  }}</p>
            </div>
        </div>
    </div><!-- .nk-page-head -->

    <div class="card shadow-none">
        <div class="card-body">
            <div class="row">
                {{-- Left Sidebar  --}}
            <div class="col-md-4">
                <div class="mb-3">
                    <p><strong>Your Blanace Is {{ $user->current_word_usage - $user->words_used }} Words Left </strong></p> 
                </div>

 <form action="{{ route('store.template') }}" method="post" enctype="multipart/form-data">
     @csrf  
    <div class="form-group">
        <label for="language" class="form-label">Language  </label>
            <div class="form-control-wrap">
     <select name="language" class="form-select" id="language" > 
        <option value="English (USA)">English (USA)</option>
        <option value="Bangla (Bangladesh)">Bangla (Bangladesh)</option>
        <option value="Hindi (India)">Hindi (India)</option>
        <option value="French (France)">French (France)</option>
        <option value="Turkish (Turkey)">Turkish (Turkey)</option> 
    </select>
            </div>
    </div>  
    
    @foreach ($template->inputFields as $field)
    <div class="form-group mt-3">
        <label for="{{ $field->title }}">{{ $field->title }}</label>
       
        @if ($field->type === 'text')
        <input type="text" name="{{ str_replace(' ', '_',$field->title) }}" id="{{ $field->title }}" class="form-control" required>
        
        @elseif ($field->type === 'textarea')

        <textarea name="{{ str_replace(' ', '_',$field->title) }}" id="{{ $field->title }}"  rows="5" class="form-control" required></textarea> 
        @endif
        <small>{{ $field->description }}</small>

    </div>
        
    @endforeach

    <div class="form-group mt-3">
        <label for="ai_model" class="form-label">AI Model  </label>
            <div class="form-control-wrap">
     <select name="ai_model" class="form-select" id="ai_model" > 
        <option value="gpt-4">OpenAI | GPT 4</option>
        <option value="gpt-3.5-turbo">OpenAI | GPT-3.5-turbo</option> 
    </select>
            </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="form-group">
            <label for="result_length" class="form-label">Extimated Result Length </label>
            <div class="form-control-wrap">
                <input type="number" name="result_length" class="form-control" id="result_length" value="200" min="50" max="1000" required >
            </div>
        </div> 
        </div> 
    </div>
    
<button type="submit" class="btn btn-primary mt-3 ">Generate</button> 
     

 </form>
   </div>
     {{-- End Left Sidebar  --}}


 {{-- Right Sidebar  --}}
    <div class="col-md-8">
<div class="nk-editor">
<div class="nk-editor-header">
    <div class="nk-editor-title">
        <h4 class="me-3 mb-0 line-clamp-1">{{ $template->title  }}</h4>
        <ul class="d-inline-flex align-item-center">
             
            <li>
                <button class="btn btn-sm btn-icon btn-zoom">
                    <em class="icon ni ni-star"></em>
                </button>
            </li>
           
        </ul>
    </div>
    <div class="nk-editor-tools d-none d-xl-flex">
        <ul class="d-inline-flex gap gx-3 gx-lg-4 pe-4 pe-lg-5">
            <li>
 <span class="sub-text text-nowrap">Words <span class="text-dark" id="word-count">0</span></span>
            </li>
            <li>
                <span class="sub-text text-nowrap">Characters <span class="text-dark" id="char-count" >0</span></span>
            </li>
        </ul>
        <ul class="d-inline-flex gap gx-3">
            <li>
                <div class="dropdown">
                    <button class="btn btn-md btn-light rounded-pill" type="button" data-bs-toggle="dropdown">
                        <span>Export</span>
                        <em class="icon ni ni-chevron-down"></em>
                    </button>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                        <div class="dropdown-content">
    <ul class="link-list link-list-hover-bg-primary link-list-md">
        <li>
            <a href="#" id="copy-text"><em class="icon ni ni-file-doc"></em><span>Copy Text</span></a>
        </li>
        <li>
            <a href="#"><em class="icon ni ni-file-text"></em><span>Text</span></a>
        </li>
    </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <button class="btn btn-md btn-primary rounded-pill" type="button"> Save </button>
            </li>
        </ul>
    </div>
</div>
<div class="nk-editor-main">
     
    <div class="nk-editor-body">
        <div class="wide-md h-100">
            <div class="js-editor nk-editor-style-clean nk-editor-full" data-menubar="false" id="editor-v1"></div> <!-- .js-editor -->
        </div>
    </div><!-- .nk-editor-body -->
</div><!-- .nk-editor-main -->
</div>


         
    </div>
  {{-- End Right Sidebar  --}}

            </div> 
        </div> 
    </div>

 

</div>
</div> 

@endsection