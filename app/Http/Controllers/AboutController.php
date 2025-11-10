<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Traits\SaveFile;


use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use SaveFile;

    // function __construct()
    // {
    //      $this->middleware('permission:about-list|about-create|about-edit|about-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:about-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:about-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:about-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $abouts=About::all();
        return view('dashboard.about.index',['abouts'=>$abouts]);
    }

    public function create()
    {
        return view('dashboard.about.create');
    }

    public function store(StoreAboutRequest $request)
    {
             // Step 1: Save the about main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/about', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $about = About::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $about->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
                 $about->translateOrNew($locale)->desc = $request->input("$locale.desc");
             }
          }
          $about->status =$request->status;
          $about->order =$request->order;
          // Save the about along with its translations
          $about->save();
          return redirect()->route('abouts.index');
    }

    // public function show(History $about)
    // {
    //     //
    // }

    public function edit( $id)
    {
        $about=About::find($id);
        return view('dashboard.about.edit',['about' => $about]);
    }

    public function update(UpdateAboutRequest $request, $id)
    {

    // Find the record and check for existence
    $about = About::find($id);
    if (!$about) {
        return redirect()->route('about.index')->withErrors(['error' => 'about record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $about->image && file_exists(public_path('images/about/'.$about->image))) {
        unlink(public_path('images/about/'.$about->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/about', $request->file('image'));
        $about->image = $finalImagePathName; // Save the new image path
    }
     $about->order = $request->input('order');
    $about->status = $request->input('status');

    // Save the base model
    $about->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $about->translateOrNew($locale)->title = $request->input("$locale.title");
            $about->translateOrNew($locale)->desc = $request->input("$locale.desc");
        }
    }
    // Save translations
    $about->save();
    return redirect()->route('abouts.index')->with('success', 'about updated successfully.');
}

public function destroy(Request $request)
{

    $about = About::find($request->about_id);
    if (!$about) {
        return redirect()->route('abouts.index')->with('error', 'about not found.');
    }
    // Unlink the associated image if it exists
    if ($about->image && file_exists(public_path('images/about/' . $about->image))) {
        unlink(public_path('images/about/' . $about->image));
    }
    // Delete translations and the about record
    $about->translations()->delete();
    $about->delete();
    return redirect()->route('abouts.index')->with('success', 'about deleted successfully.');

}
}
