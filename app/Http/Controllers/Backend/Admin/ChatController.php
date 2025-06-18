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

    public function AddAssistants(){
     return view('admin.backend.assistant.add_assistant');
    }
    // End Method 

    public function StoreAssistants(Request $request){
   
     $data = new ChatAssistant();
     $data->name = $request->name;
     $data->role_description = $request->role_description;
     $data->welcome_message = $request->welcome_message;
     $data->instructions = $request->instructions;
     $data->category = $request->category;
     $data->is_active = $request->is_active;

     $oldPhotoPath = $data->avatar;

     if ($request->hasFile('avatar')) {
        $file = $request->file('avatar');     
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('upload/avatar'),$filename);
        $data->avatar = $filename;

        if ($oldPhotoPath && $oldPhotoPath !== $filename) {
           $this->deleteOldImage($oldPhotoPath);
        } 
     }

     $data->save();

     $notification = array(
        'message' => 'Assistant Added Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('all.assistants')->with($notification);
   }
   //End Method 

  private function deleteOldImage(string $oldPhotoPath) : void {
    $fullPath = public_path('upload/avatar/'.$oldPhotoPath);
    if (file_exists($fullPath)) {
       unlink($fullPath);
    }
  }
   //End private Method 

   public function ChatAssistants($assistantId){

    $assistant = ChatAssistant::findOrFail($assistantId);

    $conversations = ChatConversation::where('chat_conversations.assistant_id',$assistantId)
        ->where('chat_conversations.user_id', Auth::id())
        ->select('latest.conversation_id', 'latest.id','latest.created_at','latest.message')
        ->join('chat_conversations as latest', function($join) {
            $join->on('latest.conversation_id', '=' , 'chat_conversations.conversation_id')
                ->whereColumn('latest.id', '=', \DB::raw('(SELECT MAX(id) FROM chat_conversations as sub WHERE sub.conversation_id = chat_conversations.conversation_id)'));
        })
        ->groupBy('latest.conversation_id','latest.id','latest.created_at','latest.message')
        ->orderBy('latest.created_at', 'desc')
        ->get()
        ->map(function($conv){
            $conv->messages_count = ChatConversation::where('conversation_id', $conv->conversation_id ?? $conv->id)->count();
            return $conv;
        });

        $selectedConversation = $conversations->first();

        if ($selectedConversation) {
            $messages = ChatConversation::where('assistant_id',$assistantId)
                ->where('user_id', Auth::id())
                ->where('conversation_id',$selectedConversation->conversation_id ?? $selectedConversation->id)
                ->orderBy('created_at','asc')
                ->get();
        }else {
            $messages = collect(); 
        }

      return view('admin.backend.assistant.chat_assistant',compact('assistant','conversations','messages','selectedConversation'));
   }
    //End Method 

  public function ChatSendMessage(Request $request,$assistantId){

    $request->validate(['message' => 'required|string' ]);
    $assistant = ChatAssistant::findOrFail($assistantId);
    $userMessage = $request->message;

    /// Determine the latest conversation_id or start new one.
    $latestConversation = ChatConversation::where('assistant_id',$assistantId)
            ->where('user_id',Auth::id())
            ->latest('created_at')
            ->first();

    $conversationId = $latestConversation ? $latestConversation->conversation_id ?? $latestConversation->id : null;

    /// API Call to generate Response From here 

    $response = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'system', 'content' => $assistant->instructions],
            ['role' => 'user', 'content' => $userMessage ],
        ],
    ]);

    $aiResponse = $response->choices[0]->message->content;

    $conversation = ChatConversation::create([
        'assistant_id' => $assistantId,
        'user_id' => Auth::id(),
        'message' => $userMessage,
        'response' => $aiResponse,
        'conversation_id' => $conversationId ?? null,
    ]);

    if (!$conversationId) {
        $conversation->update(['conversation_id' =>  $conversation->id]);
    }
    return redirect()->route('chat-assistants.chat',['assistantId' => $assistantId]);
  }
   //End Method 

   public function StartNewConversation($assistantId){

    $assistant = ChatAssistant::findOrFail($assistantId);

    $newConversation = ChatConversation::create([
        'assistant_id' => $assistantId,
        'user_id' => Auth::id(),
        'message' => 'New Conversation Started',
        'response' => $assistant->welcome_message,
        'conversation_id' => null,
    ]);

    $newConversation->update(['conversation_id' => $newConversation->id]);

    return redirect()->route('chat-assistants.chat',['assistantId' => $assistantId]);

   }
     //End Method 

   public function SelecteConversation($assistantId, $conversationId){

    $assistant = ChatAssistant::findOrFail($assistantId);

    $conversations = ChatConversation::where('chat_conversations.assistant_id',$assistantId)
        ->where('chat_conversations.user_id', Auth::id())
        ->select('latest.conversation_id', 'latest.id','latest.created_at','latest.message')
        ->join('chat_conversations as latest', function($join) {
            $join->on('latest.conversation_id', '=' , 'chat_conversations.conversation_id')
                ->whereColumn('latest.id', '=', \DB::raw('(SELECT MAX(id) FROM chat_conversations as sub WHERE sub.conversation_id = chat_conversations.conversation_id)'));
        })
        ->groupBy('latest.conversation_id','latest.id','latest.created_at','latest.message')
        ->orderBy('latest.created_at', 'desc')
        ->get()
        ->map(function($conv){
            $conv->messages_count = ChatConversation::where('conversation_id', $conv->conversation_id ?? $conv->id)->count();
            return $conv;
        });

        $selectedConversation = ChatConversation::where('conversation_id',$conversationId)
            ->where('assistant_id',$assistantId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $messages = ChatConversation::where('assistant_id',$assistantId)
            ->where('user_id', Auth::id())
            ->where('conversation_id', $selectedConversation->conversation_id ?? $selectedConversation->id)
            ->orderBy('created_at', 'asc')
            ->get();         

      return view('admin.backend.assistant.chat_assistant',compact('assistant','conversations','messages','selectedConversation'));
   }
    //End Method 




} 
