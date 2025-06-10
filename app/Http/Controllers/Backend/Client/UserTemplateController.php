<?php

namespace App\Http\Controllers\Backend\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\TemplateInputFields;
use App\Models\GeneratedContent;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;

class UserTemplateController extends Controller
{
    public function UserTemplate(){
        $user = Auth::user();
        $userPlan = $user->plan;
        $templateLimit = $userPlan ? $userPlan->templates : 3;
        
        $templates = Template::latest()->take($templateLimit)->get();
        return view('client.backend.template.all_template',compact('user','templates'));
    }
    // End Method 
}
