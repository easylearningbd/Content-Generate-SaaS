@extends('admin.dashboard')
@section('admin') 

<div class="nk-content-body">
    <div class="nk-block-head nk-page-head">
        <div class="nk-block-head-content">
    <h2 class="title display-6">Chat with <strong>{{ $assistant->name }}</strong>  </h2>
    <p class="text-muted">{{ $assistant->role_description }}</p>  
        </div> 
    </div>

    <div class="row g-4">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-header badge text-bg-info-soft text-white">
                    <h5 class="mb-0">Conversations</h5> 
                </div>
    <div class="card-body p-0">
        <a href="#" class="btn btn-primary w-100 rounded-0"> + New Conversation </a>
        <div class="list-group list-group-flush">
            @foreach ($conversations as $conv)
            <a href="#" class="list-group-item list-group-item-action {{ $selectedConversation && ($selectedConversation->conversation_id ?? $selectedConversation->id) == ($conv->conversation_id ?? $conv->id) ? 'active' : '' }}">

            <div class="d-flex w-100 justify-content-between">
                <h6 class="mb-1 text-primary">Conversation</h6>
                <small>{{ $conv->created_at->diffForHumans() }}</small> 
            </div>
            <p class="mb-1 text-truncate">{{ $conv->message ? substr($conv->message, 0 ,20). '...' : 'No messages Yet' }}</p>
            <small>{{ $conv->messages_count }} messages</small> 
            </a> 
            @endforeach

        </div>

    </div>

            </div>

        </div>

    </div>





</div>







@endsection