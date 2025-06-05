@extends('admin.dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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

            </div>

        </div>

    </div>

 

</div>
</div> 

@endsection