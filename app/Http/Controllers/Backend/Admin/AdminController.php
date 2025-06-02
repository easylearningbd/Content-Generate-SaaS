<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    
   public function AdminLogout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    //End Method 

  public function AdminProfile(){
     $id = Auth::user()->id;
     $profileData = User::find($id);
     return view('admin.admin_profile',compact('profileData'));

  }
   //End Method 





}
