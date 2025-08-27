<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\Image;
use App\Models\News;
use App\Traits\SaveFile;
use id;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $news = News::all();
        return view('dashboard.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->except(['_token', 'ar', 'en', 'images']); // Exclude translations and extra images

    // Handle main image upload
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/news', $request->file('image'));
        $data['image'] = $finalImagePathName;
    }

    // Create the News entry
    $news = News::create($data);

    // Step 2: Handle translations for each locale
    $locales = array_keys(config('app.languages'));  
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $news->translateOrNew($locale)->title = $request->input("$locale.title");
            $news->translateOrNew($locale)->desc  = $request->input("$locale.desc");
        }
    }

    $news->status = $request->status;
    $news->order  = $request->order;
    $news->save();

    // Step 3: Handle multiple extra images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $extraImage) {
            $extraImagePath = $this->SaveImage('images/news/more', $extraImage);

            
            $news->images()->create([
                 'url'  => $extraImagePath,
            ]);
        }
    }

    return redirect()->route('news.index')->with('success', 'تمت إضافة الخبر بنجاح');
}
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $new=News::find($id);
        return view('dashboard.news.edit',['new' => $new]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest  $request, $id)
    {
       $new = News::find($id);
    if (!$new) {
        return redirect()->route('news.index')->withErrors(['error' => 'News record not found.']);
    }


    if ($request->hasFile('image') &&$new->image && file_exists(public_path('images/news/' .$new->image))) {
        unlink(public_path('images/news/' .$new->image));
    }

    
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/news', $request->file('image'));
       $new->image = $finalImagePathName;
    }

    
   $new->order = $request->input('order');
   $new->status = $request->input('status');
   $new->save();

    
    $locales = array_keys(config('app.languages'));
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
           $new->translateOrNew($locale)->title = $request->input("$locale.title");
           $new->translateOrNew($locale)->desc  = $request->input("$locale.desc");
        }
    }
   $new->save();

    // Handle extra images
// if ($request->hasFile('images')) {
//     // Delete old extra images first
//    if ($new->images &&$new->images->count() > 0) {
//     foreach ($new->images as $oldImage) {
//         $filePath = public_path('images/news/more/' . $oldImage->path);

//         if (is_file($filePath) && file_exists($filePath)) {
//             unlink($filePath);
//         }

//         $oldImage->delete();
//     }
// }

    // Save new images
    // foreach ($request->file('images') as $extraImage) {
    //     $extraImagePath = $this->SaveImage('images/news/more', $extraImage);

    //    $new->images()->create([
    //         'path' => $extraImagePath,
    //         'url'  => asset('images/news/more/'.$extraImagePath), 
    //     ]);
    



    return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }


public function storeImages(Request $request, News $news)
{
    $request->validate([
        'images'   => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048'
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $extraImage) {
            // Save into /public/images/news/more
            $filename = $this->SaveImage('images/news/more', $extraImage);

            // Store just the filename in DB
            $news->images()->create([
                'url' => $filename,
            ]);
        }
    }

    return back()->with('success', 'تم رفع الصور بنجاح');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $news = News::find($request->news_id);
    if (!$news) {
        return redirect()->route('news.index')->with('error', 'News record not found.');
    }

    // Delete main image
    if ($news->image && file_exists(public_path('images/news/' . $news->image))) {
        unlink(public_path('images/news/' . $news->image));
    }

    // Delete extra images
    if ($news->images) {
        foreach ($news->images as $extraImage) {
            $filePath = public_path('images/news/more/' . $extraImage->path);
            if (is_file($filePath) && file_exists($filePath)) {
                unlink($filePath);
            }
            $extraImage->delete();
        }
    }

    // Delete translations
    $news->translations()->delete();

    // Delete the news record
    $news->delete();

    return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }

    public function destroyImage(Request $request, Image $image)
    {
        // delete file from disk if exists
        if ($image->path && file_exists(public_path($image->path))) {
            unlink(public_path($image->path));
        }

        // delete record from DB
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
