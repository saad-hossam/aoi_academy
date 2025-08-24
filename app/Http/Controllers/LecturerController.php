<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SaveFile;
use App\Models\Lecturer;
use App\Http\Requests\StoreLecturerRequest;
use App\Http\Requests\UpdateLecturerRequest;
class LecturerController extends Controller
{
      use SaveFile;

    function __construct()
    {
         $this->middleware('permission:lecturer-list|partner-create|lecturer-edit|lecturer-delete', ['only' => ['index','store']]);
         $this->middleware('permission:lecturer-create', ['only' => ['create','store']]);
         $this->middleware('permission:lecturer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:lecturer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $lecturers=Lecturer::all();
        return view('dashboard.lecturers.index',['lecturers'=>$lecturers]);
    }

    public function create()
    {
        return view('dashboard.lecturers.create');
    }

    public function store(StoreLecturerRequest $request)
    {
             // Step 1: Save the lecturers main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/lecturers', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $lecturer = Lecturer::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $lecturer->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the lecturer along with its translations
          $lecturer->save();
          return redirect()->route('lecturers.index');
    }

    public function show(Lecturer $lecturers)
    {
        //
    }

    public function edit( $id)
    {
        $lecturer=Lecturer::find($id);
        return view('dashboard.lecturers.edit',['lecturer' => $lecturer]);
    }

    public function update(UpdateLecturerRequest $request, $id)
    {

    // Find the record and check for existence
    $lecturer = Lecturer::find($id);
    if (!$lecturer) {
        return redirect()->route('lecturers.index')->withErrors(['error' => 'lecturer record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $lecturer->image && file_exists(public_path('images/lecturers/'.$lecturer->image))) {
        unlink(public_path('images/lecturers/'.$lecturer->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/lecturers', $request->file('image'));
        $lecturer->image = $finalImagePathName; // Save the new image path
    }
    $lecturer->status = $request->input('status');

    // Save the base model
    $lecturer->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $lecturer->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $lecturer->save();
    return redirect()->route('lecturers.index')->with('success', 'lecturer updated successfully.');
}

public function destroy(Request $request)
{

    $lecturer = Lecturer::find($request->lecturer_id);
    if (!$lecturer) {
        return redirect()->route('lecturers.index')->with('error', 'lecturer not found.');
    }
    // Unlink the associated image if it exists
    if ($lecturer->image && file_exists(public_path('images/lecturers/' . $lecturer->image))) {
        unlink(public_path('images/lecturers/' . $lecturer->image));
    }
    // Delete translations and the lecturer record
    $lecturer->translations()->delete();
    $lecturer->delete();
    return redirect()->route('lecturers.index')->with('success', 'lecturer deleted successfully.');

}
}
