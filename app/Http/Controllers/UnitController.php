<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Traits\SaveFile;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
class UnitController extends Controller
{
     use SaveFile;

    function __construct()
    {
         $this->middleware('permission:unit-list|unit-create|unit-edit|unit-delete', ['only' => ['index','store']]);
         $this->middleware('permission:unit-create', ['only' => ['create','store']]);
         $this->middleware('permission:unit-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:unit-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $units=Unit::all();
        return view('dashboard.units.index',['units'=>$units]);
    }

    public function create()
    {
        return view('dashboard.units.create');
    }

    public function store(StoreUnitRequest $request)
    {
             // Step 1: Save the units main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
         

        // Create the slider entry
        $unit = Unit::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $unit->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the unit along with its translations
          $unit->save();
          return redirect()->route('units.index');
    }

    public function show(Unit $units)
    {
        //
    }

    public function edit( $id)
    {
        $unit=Unit::find($id);
        return view('dashboard.units.edit',['unit' => $unit]);
    }

    public function update(UpdateUnitRequest $request, $id)
    {

    // Find the record and check for existence
    $unit = Unit::find($id);
    if (!$unit) {
        return redirect()->route('units.index')->withErrors(['error' => 'unit record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $unit->image && file_exists(public_path('images/units/'.$unit->image))) {
        unlink(public_path('images/units/'.$unit->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/units', $request->file('image'));
        $unit->image = $finalImagePathName; // Save the new image path
    }
    $unit->status = $request->input('status');

    // Save the base model
    $unit->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $unit->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $unit->save();
    return redirect()->route('units.index')->with('success', 'unit updated successfully.');
}

public function destroy(Request $request)
{

    $unit = Unit::find($request->unit_id);
    if (!$unit) {
        return redirect()->route('units.index')->with('error', 'unit not found.');
    }
    // Unlink the associated image if it exists
    if ($unit->image && file_exists(public_path('images/units/' . $unit->image))) {
        unlink(public_path('images/units/' . $unit->image));
    }
    // Delete translations and the unit record
    $unit->translations()->delete();
    $unit->delete();
    return redirect()->route('units.index')->with('success', 'unit deleted successfully.');

}
}
