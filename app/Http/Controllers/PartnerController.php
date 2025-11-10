<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Traits\SaveFile;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;

class PartnerController extends Controller
{
     use SaveFile;

    function __construct()
    {
         $this->middleware('permission:partner-list|partner-create|partner-edit|partner-delete', ['only' => ['index','store']]);
         $this->middleware('permission:partner-create', ['only' => ['create','store']]);
         $this->middleware('permission:partner-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:partner-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $partners=Partner::all();
        return view('dashboard.partners.index',['partners'=>$partners]);
    }

    public function create()
    {
        return view('dashboard.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
             // Step 1: Save the partners main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/partners', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $partner = Partner::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $partner->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the partner along with its translations
          $partner->save();
          return redirect()->route('partners.index');
    }

    public function show(Partner $partners)
    {
        //
    }

    public function edit( $id)
    {
        $partner=Partner::find($id);
        return view('dashboard.partners.edit',['partner' => $partner]);
    }

    public function update(UpdatePartnerRequest $request, $id)
    {

    // Find the record and check for existence
    $partner = Partner::find($id);
    if (!$partner) {
        return redirect()->route('partners.index')->withErrors(['error' => 'partner record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $partner->image && file_exists(public_path('images/partners/'.$partner->image))) {
        unlink(public_path('images/partners/'.$partner->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/partners', $request->file('image'));
        $partner->image = $finalImagePathName; // Save the new image path
    }
    $partner->status = $request->input('status');

    // Save the base model
    $partner->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $partner->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $partner->save();
    return redirect()->route('partners.index')->with('success', 'partner updated successfully.');
}

public function destroy(Request $request)
{

    $partner = Partner::find($request->partner_id);
    if (!$partner) {
        return redirect()->route('partners.index')->with('error', 'partner not found.');
    }
    // Unlink the associated image if it exists
    if ($partner->image && file_exists(public_path('images/partners/' . $partner->image))) {
        unlink(public_path('images/partners/' . $partner->image));
    }
    // Delete translations and the partner record
    $partner->translations()->delete();
    $partner->delete();
    return redirect()->route('partners.index')->with('success', 'partner deleted successfully.');

}
}
