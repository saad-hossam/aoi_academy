<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCapabilityRequest;
use App\Http\Requests\UpdateCapabilityRequest;
use App\Models\Capability;
use App\Models\Image;
use App\Traits\SaveFile;
use Illuminate\Http\Request;

class CapabilityController extends Controller
{
     use SaveFile;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $capabilities = Capability::all();
        return view('dashboard.capabilities.index', compact('capabilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.capabilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCapabilityRequest $request)
    {
         $data = $request->except(['_token', 'ar', 'en', 'images']);

        // Handle main image
        if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/capabilities', $request->file('image'));
            $data['image'] = $finalImagePathName;
        }

        $capability = Capability::create($data);

        // Handle translations
        $locales = array_keys(config('app.languages'));
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $capability->translateOrNew($locale)->title = $request->input("$locale.title");
                $capability->translateOrNew($locale)->desc  = $request->input("$locale.desc");
                $capability->translateOrNew($locale)->{"meta_desc"} = $request->input("$locale.meta_desc");
                $capability->translateOrNew($locale)->{"meta_keyword"} = $request->input("$locale.meta_keyword");
            }
        }

        $capability->status = $request->status;
        $capability->order  = $request->order;
        $capability->save();

        // Handle multiple images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $extraImage) {
                $extraImagePath = $this->SaveImage('images/capabilities/more', $extraImage);

                $capability->images()->create([
                    'url' => $extraImagePath,
                ]);
            }
        }

        return redirect()->route('capabilities.index')->with('success', 'تمت إضافة الميزة بنجاح');
    }

    public function storeImages(Request $request, Capability $capability)
{
    $request->validate([
        'images'   => 'required|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $extraImage) {
          
            $filename = $this->SaveImage('images/capabilities/more', $extraImage);

            

            // Store just the filename in DB
            $capability->images()->create([
                'url' => $filename,
            ]);
        }
    }

    return back()->with('success', 'تم رفع الصور بنجاح');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Capability  $capability
     * @return \Illuminate\Http\Response
     */
    public function show(Capability $capability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Capability  $capability
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $capability = Capability::findOrFail($id);
        return view('dashboard.capabilities.edit', compact('capability'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Capability  $capability
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCapabilityRequest $request, $id)
    {
         $capability = Capability::find($id);
        if (!$capability) {
            return redirect()->route('capabilities.index')->withErrors(['error' => 'Capability not found.']);
        }

        // Delete old main image if new one uploaded
        if ($request->hasFile('image') && $capability->image && file_exists(public_path('images/capabilities/' . $capability->image))) {
            unlink(public_path('images/capabilities/' . $capability->image));
        }

        if ($request->hasFile('image')) {
            $finalImagePathName = $this->SaveImage('images/capabilities', $request->file('image'));
            $capability->image = $finalImagePathName;
        }

        $capability->order = $request->order;
        $capability->status = $request->status;
        $capability->save();

        // Handle translations
        $locales = array_keys(config('app.languages'));
        foreach ($locales as $locale) {
            if ($request->has($locale)) {
                $capability->translateOrNew($locale)->title = $request->input("$locale.title");
                $capability->translateOrNew($locale)->desc  = $request->input("$locale.desc");
                $capability->translateOrNew($locale)->{"meta_desc"} = $request->input("$locale.meta_desc");
                $capability->translateOrNew($locale)->{"meta_keyword"} = $request->input("$locale.meta_keyword");
            }
        }

        $capability->save();

        // Handle multiple extra images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $extraImage) {
                $extraImagePath = $this->SaveImage('images/capabilities/more', $extraImage);

                $capability->images()->create([
                    'path' => $extraImagePath,
                    'url'  => asset('images/capabilities/more/' . $extraImagePath),
                ]);
            }
        }

        return redirect()->route('capabilities.index')->with('success', 'تم تعديل الميزة بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Capability  $capability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $capability = Capability::find($request->capability_id);
        if (!$capability) {
            return redirect()->route('capabilities.index')->with('error', 'Capability not found.');
        }

        // Delete main image
        if ($capability->image && file_exists(public_path('images/capabilities/' . $capability->image))) {
            unlink(public_path('images/capabilities/' . $capability->image));
        }

        // Delete extra images
        if ($capability->images) {
            foreach ($capability->images as $extraImage) {
                $filePath = public_path('images/capabilities/more/' . $extraImage->path);
                if (is_file($filePath) && file_exists($filePath)) {
                    unlink($filePath);
                }
                $extraImage->delete();
            }
        }

        // Delete translations
        $capability->translations()->delete();

        // Delete record
        $capability->delete();

        return redirect()->route('capabilities.index')->with('success', 'Capability deleted successfully.');
    }

     public function destroyImage(Request $request, Image $image)
    {
        if ($image->path && file_exists(public_path($image->path))) {
            unlink(public_path($image->path));
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}
