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

            </div>
                {{-- End Left Sidebar  --}}

            </div>

        </div>

    </div>

 

</div>
</div> 

@endsection