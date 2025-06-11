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

    public function UserDetailsTemplate($id){
        $template = Template::with('inputFields')->findOrFail($id);
        $user = Auth::user();
        return view('client.backend.template.details_template',compact('template','user')); 

    }
       // End Method 


    public function UserContentGenerate(Request $request, $id){

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

        GeneratedContent::create([
            'user_id' => $user->id,
            'template_id' => $template->id,
            'input' => json_encode($inputData),
            'output' => $output,
            'word_count' => $wordCount,
        ]);

    return response()->json([
        'success' => true,
        'output' => $output
    ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Failed to generate content: ' . $e->getMessage(),
        ],500);
     } 

    }
      //End Method 


   public function UserDocument(){
        $id = Auth::user()->id;
        $document = GeneratedContent::where('user_id',$id)->orderBy('id','desc')->get();
        return view('client.backend.document.all_document',compact('document'));
    }
    /// End Method 

     public function EditUserDocument($id){
        $document = GeneratedContent::findOrFail($id);
        return view('client.backend.document.edit_document',compact('document')); 
    }
    /// End Method 

    public function UserUpdateDocument(Request $request, $id){
        $document = GeneratedContent::findOrFail($id);

        $validateData = $request->validate([
            'output' => 'required|string',
        ]);

        $document->update([
            'output' => $validateData['output'],
        ]);

        $notification = array(
        'message' => 'Document Updated Successfully',
        'alert-type' => 'success'
     );

     return redirect()->route('user.document')->with($notification); 
    }
     /// End Method 

    public function DeleteUserDocument($id){

        GeneratedContent::find($id)->delete();
        $notification = array(
        'message' => 'Document Deleted Successfully',
        'alert-type' => 'success'
     );

     return redirect()->back()->with($notification); 
     }
     /// End Method 




}
