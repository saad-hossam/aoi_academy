<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

use Illuminate\Http\Request;
use App\Traits\SaveFile;
use App\Models\Video;
class VideoController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:video-list|partner-create|video-edit|video-delete', ['only' => ['index','store']]);
         $this->middleware('permission:video-create', ['only' => ['create','store']]);
         $this->middleware('permission:video-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:video-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $videos=Video::all();
        return view('dashboard.videos.index',['videos'=>$videos]);
    }

    public function create()
    {
        return view('dashboard.videos.create');
    }

    public function store(StoreVideoRequest $request)
    {
             // Step 1: Save the videos main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
           

        // Create the slider entry
        $video = Video::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $video->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the video along with its translations
          $video->save();
          return redirect()->route('videos.index');
    }

    public function show(Video $videos)
    {
        //
    }

    public function edit( $id)
    {
        $video=Video::find($id);
        return view('dashboard.videos.edit',['video' => $video]);
    }

    public function update(UpdateVideoRequest $request, $id)
    {

    // Find the record and check for existence
    $video = Video::find($id);
    if (!$video) {
        return redirect()->route('videos.index')->withErrors(['error' => 'video record not found.']);
    }
  
   
    $video->status = $request->input('status');
 $video->link   = $request->input('link');   
    $video->order  = $request->input('order');

    $video->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $video->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $video->save();
    return redirect()->route('videos.index')->with('success', 'video updated successfully.');
}

public function destroy(Request $request)
{

    $video = Video::find($request->video_id);
    if (!$video) {
        return redirect()->route('videos.index')->with('error', 'video not found.');
    }
    // Unlink the associated image if it exists
    if ($video->image && file_exists(public_path('images/videos/' . $video->image))) {
        unlink(public_path('images/videos/' . $video->image));
    }
    // Delete translations and the video record
    $video->translations()->delete();
    $video->delete();
    return redirect()->route('videos.index')->with('success', 'video deleted successfully.');

}
}
