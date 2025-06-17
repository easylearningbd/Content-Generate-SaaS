<?php

namespace App\Http\Controllers\Backend\Admin;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ChatAssistant;
use App\Models\ChatConversation; 
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;

class ChatController extends Controller
{
    public function AllAssistants(){
        $assistant = ChatAssistant::latest()->get();
        return view('admin.backend.assistant.all_assistant',compact('assistant'));
    }
    // End Method 




} 
