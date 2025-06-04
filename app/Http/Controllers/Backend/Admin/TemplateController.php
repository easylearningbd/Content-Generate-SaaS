<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\TemplateInputFields;

class TemplateController extends Controller
{
    public function AdminTemplate(){
        $templates = Template::latest()->get();
        return view('admin.backend.template.all_template',compact('templates'));
    }
    //End Method 

    public function AddTemplate(){
        return view('admin.backend.template.add_template');
    }
    //End Method 

    public function StoreTemplate(Request $request){

        /// Validate the request data 
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',

            'icon' => 'required|string',
            'prompt' => 'required|string',
            'is_active' => 'required|in:0,1',

            'input_fields' => 'required|array|size:1',
            'input_fields.*.title' => 'required|string|max:255',
            'input_fields.*.description' => 'required|string',
            'input_fields.*.type' => 'required|in:text,textarea',  
        ]);

    // Create the template 
    $template = new Template();
    $template->title = $validateData['title']; 
    $template->description = $validateData['description'];
    $template->category = $validateData['category'];
    $template->icon = $validateData['icon'];
    $template->prompt = $validateData['prompt'];
    $template->is_active = $validateData['is_active'];

    $template->created_by = Auth::id();
    $template->save();

    // Save data in Input Filed table 
    $inputField = $validateData['input_fields'][0];
    TemplateInputFields::create([
        'template_id' => $template->id,
        'title' => $inputField['title'],
        'description' => $inputField['description'],
        'type' => $inputField['type'],
        'is_required' => true,
        'order' => 0,   
    ]);

    $notification = array(
        'message' => 'Template Created Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('admin.template')->with($notification); 
    }
    //End Method 

    public function EditTemplate($id){
        $template = Template::with('inputFields')->findOrFail($id);
        return view('admin.backend.template.edit_template',compact('template'));
    }
      //End Method 


      public function UpdateTemplate(Request $request, $id){

        /// Validate the request data 
        $validateData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',

            'icon' => 'required|string',
            'prompt' => 'required|string',
            'is_active' => 'required|in:0,1',

            'input_fields' => 'required|array|size:1',
            'input_fields.*.title' => 'required|string|max:255',
            'input_fields.*.description' => 'required|string',
            'input_fields.*.type' => 'required|in:text,textarea',  
        ]);

    // Create the template 
    $template = Template::findOrFail($id);
    $template->title = $validateData['title']; 
    $template->description = $validateData['description'];
    $template->category = $validateData['category'];
    $template->icon = $validateData['icon'];
    $template->prompt = $validateData['prompt'];
    $template->is_active = $validateData['is_active']; 
    $template->save();

    // Save data in Input Filed table 
    $inputField = $validateData['input_fields'][0];
     
    $templateInputField = TemplateInputFields::where('template_id',$template->id)->first();

    if ($templateInputField ) {
       $templateInputField->title = $inputField['title'];
       $templateInputField->description = $inputField['description']; 
       $templateInputField->type = $inputField['type']; 
       $templateInputField->is_required = true;
       $templateInputField->order = 0;
       $templateInputField->save();
    } 

    $notification = array(
        'message' => 'Template Updated Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('admin.template')->with($notification); 
    }
    //End Method 



}
