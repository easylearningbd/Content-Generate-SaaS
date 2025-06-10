<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //End Method 

     public function UserProfile(){
     $id = Auth::user()->id;
     $profileData = User::find($id);
     return view('client.user_profile',compact('profileData'));

  }
   //End Method 


   public function UserProfileStore(Request $request){
     $id = Auth::user()->id;
     $data = User::find($id);

     $data->name = $request->name;
     $data->email = $request->email;
     $data->phone = $request->phone;
     $data->address = $request->address;

     $oldPhotoPath = $data->photo;

     if ($request->hasFile('photo')) {
        $file = $request->file('photo');     
        $filename = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('upload/user_images'),$filename);
        $data->photo = $filename;

        if ($oldPhotoPath && $oldPhotoPath !== $filename) {
           $this->deleteOldImage($oldPhotoPath);
        } 
     }

     $data->save();

     $notification = array(
        'message' => 'User Profile Updated Successfully',
        'alert-type' => 'success'
     );

     return redirect()->back()->with($notification);
   }
   //End Method 

    private function deleteOldImage(string $oldPhotoPath) : void {
    $fullPath = public_path('upload/user_images/'.$oldPhotoPath);
    if (file_exists($fullPath)) {
       unlink($fullPath);
    }
  }
   //End private Method 




}
