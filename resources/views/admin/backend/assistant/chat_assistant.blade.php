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

    <div class="col-md-9">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-light">
                <h5 class="mb-0">{{ $selectedConversation ? 'Conversation' : 'Select a Conversation' }}</h5> 
            </div>

        <div class="card-body p-0">
            <div class="chat-container" style="height: 500px; overflow-y:auto; padding: 15px;">
                @if ($selectedConversation)
                  @foreach ($messages as $msg)
                  <div class="chat-message {{ $msg->user_id == Auth::id() ? 'user-message' : 'assistant-message' }} mb-4 ">
                    <div class="d-flex {{ $msg->user_id == Auth::id() ? 'justify-content-end' : 'justifuy-content-start'}} ">
                        <div class="p-2 rounded" style="max-width: 70%">
                            <strong class="d-block mb-1">
                                {{ $msg->user_id == Auth::id() ? 'You' : $$assistant->name }}
                            </strong>
                    <p class="mb-1">
                        {{ $msg->message }}
                    </p>
                    @if ($msg->response)
                        <p class="text-muted mb-0"><em>{{ $msg->response }}</em> </p>
                    @endif 
                        </div> 
                    </div> 
                  </div> 
                  @endforeach 
                  @else 
                   <div class="text-center py-5 text-muted">
                    <p>Select a conversation or start a new one to begin chatting.</p>

                   </div>
                @endif 
            </div>

        <div class="card-footer bg-white border-top">
            <form action="" method="post" class="input-group">
                @csrf
            <input type="text" name="message" class="form-control border-secondary" placeholder="Type your message.." required>
            <button type="submit" class="btn btn-primary">Send</button>
            </form> 
        </div> 

        </div> 
        </div> 
    </div> 

    </div> 
</div>

<style>
    .chat-container {
        background-color: #f8f9fa;
    }
    .chat-message .user-message {
        background-color:#c3ddf9;
        color: white;
        border-radius: 10px;
    }
    .chat-message .assistant-message {
        background-color: #e9ecef;
        border-radius: 10px;
    }
    .chat-message .rounded {
        border-radius: 10px !important;
    }
    .list-group-item {
        border-left: none;
        border-right: none;
    }
    .list-group-item.active {
        background-color: #c3ddf9;
        color: white;
        border-color:#68aaf1;
    }
    .list-group-item:hover {
        background-color: #f8f9fa;
        color:rgb(159, 205, 254);
    }
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
 

@endsection