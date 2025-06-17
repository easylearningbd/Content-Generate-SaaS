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




} 
