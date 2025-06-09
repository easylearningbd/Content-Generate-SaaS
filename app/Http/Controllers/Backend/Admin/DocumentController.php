<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\TemplateInputFields;
use App\Models\GeneratedContent;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\User;
 
class DocumentController extends Controller
{
    public function AdminDocument(){
        // $id = Auth::user()->id;
        $document = GeneratedContent::orderBy('id','desc')->get();
        return view('admin.backend.document.all_document',compact('document'));
    }
    /// End Method 






}
