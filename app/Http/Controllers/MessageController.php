<?php

namespace App\Http\Controllers;
use App\Traits\SaveFile;
use App\Models\message;

use Illuminate\Http\Request;

class MessageController extends Controller
{
          use SaveFile;

 function __construct()
    {
         $this->middleware('permission:message-list|partner-create|message-edit|message-delete', ['only' => ['index','store']]);
         $this->middleware('permission:message-create', ['only' => ['create','store']]);
         $this->middleware('permission:message-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:message-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $messages=Message::all();
        return view('dashboard.messages.index',['messages'=>$messages]);
    }

    public function create()
    {
        return view('dashboard.messages.create');
    }

    public function store(StoreMessageRequest $request)
    {
             // Step 1: Save the messages main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/messages', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $message = Message::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $message->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the message along with its translations
          $message->save();
          return redirect()->route('messages.index');
    }

    public function show(message $messages)
    {
        //
    }

    public function edit( $id)
    {
        $message=Message::find($id);
        return view('dashboard.messages.edit',['message' => $message]);
    }

    public function update(UpdateMessageRequest $request, $id)
    {

    // Find the record and check for existence
    $message = Message::find($id);
    if (!$message) {
        return redirect()->route('messages.index')->withErrors(['error' => 'message record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $message->image && file_exists(public_path('images/messages/'.$message->image))) {
        unlink(public_path('images/messages/'.$message->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/messages', $request->file('image'));
        $message->image = $finalImagePathName; // Save the new image path
    }
    $message->status = $request->input('status');

    // Save the base model
    $message->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $message->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $message->save();
    return redirect()->route('messages.index')->with('success', 'message updated successfully.');
}

public function destroy(Request $request)
{

    $message = Message::find($request->message_id);
    if (!$message) {
        return redirect()->route('messages.index')->with('error', 'message not found.');
    }
    // Unlink the associated image if it exists
    if ($message->image && file_exists(public_path('images/messages/' . $message->image))) {
        unlink(public_path('images/messages/' . $message->image));
    }
    // Delete translations and the message record
    $message->translations()->delete();
    $message->delete();
    return redirect()->route('messages.index')->with('success', 'message deleted successfully.');

}}
