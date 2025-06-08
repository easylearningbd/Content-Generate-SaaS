<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Template;
use App\Models\TemplateInputFields;
use App\Models\GeneratedContent;
use OpenAI\Laravel\Facades\OpenAI;

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


    public function DetailsTemplate($id){
        $template = Template::with('inputFields')->findOrFail($id);
        $user = Auth::user();
        return view('admin.backend.template.details_template',compact('template','user')); 
    }
     //End Method 

    public function AdminContentGenerate(Request $request, $id){

        // Fetch the template with its input fields
        $template = Template::with('inputFields')->findOrFail($id);
        $user = auth()->user();

        /// Validate request 
        $validateData = $request->validate([
            'language' => 'required|string|in:English (USA),Bangla (Bangladesh),Hindi (India),French (France),Turkish (Turkey)',
            'ai_model' => 'required|string|in:gpt-4,gpt-3.5-turbo',
            'result_length' => 'required|integer|min:50|max:1000',
        ]);

        /// Validate daynamic input fields 
        foreach($template->inputFields as $field) {
            $fieldName = str_replace(' ','_',$field->title);
            $request->validate([
                $fieldName => 'required|string',
            ]);
        }

    // Get user input for dynamic fields
    $inputData = $request->except(['_token','language','ai_model','result_length']);
    \Log::info('Input Data', ['inputData' => $inputData]); // Debug input data

    $prompt = $template->prompt;

    /// Replace placeholders with user input 
    foreach($template->inputFields as $field) {
         $fieldName = str_replace(' ','_',$field->title);
         $fieldValue = $inputData[$fieldName] ?? '';
         $prompt = str_replace('{' . str_replace(' ','_',$field->title ) . '}' , $fieldValue, $prompt);
         $prompt = str_replace('{' . $field->title .  '}', $fieldValue, $prompt);
    }

    /// Replace result_lenght placeholder 
    $prompt = str_replace('{result_length}', $validateData['result_length'], $prompt);


    $prompt = "In {$validateData['language']}, {$prompt} Aim for approximately {$validateData['result_length']} words.";

    \Log::info('Final Prompt', ['prompt' => $prompt]);

    /// Check word limit

    $estimatedWordCount = $validateData['result_length'];
    if ($user->words_used + $estimatedWordCount > $user->current_word_usage) {
        return response()->json([
            'success' => false,
            'message' => 'Word limit exceeded',
        ],400);
    }

    try {
        //Generate content with OpenAI

        $response = OpenAI::chat()->create([
            'model'=> $validateData['ai_model'],
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $output = $response->choices[0]->message->content;
        $wordCount = str_word_count($output);

        /// Update user word usage
        $user->words_used += $wordCount;
        $user->save();

        // SAVE DATA TO GENERATED CONTENT TABLE 




    } catch (\Throwable $th) {
        //throw $th;
    }



    }
      //End Method 



}
