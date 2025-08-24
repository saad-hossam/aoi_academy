<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;
use App\Traits\SaveFile;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
class CertificateController extends Controller
{
     use SaveFile;

    function __construct()
    {
         $this->middleware('permission:certificate-list|certificate-create|certificate-edit|certificate-delete', ['only' => ['index','store']]);
         $this->middleware('permission:certificate-create', ['only' => ['create','store']]);
         $this->middleware('permission:certificate-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:certificate-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $certificates=Certificate::all();
        return view('dashboard.certificates.index',['certificates'=>$certificates]);
    }

    public function create()
    {
        return view('dashboard.certificates.create');
    }

    public function store(StoreCertificateRequest $request)
    {
             // Step 1: Save the certificates main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
            if ($request->hasFile('image')) {
                $finalImagePathName = $this->SaveImage('images/certificates', $request->file('image'));
                $data['image'] = $finalImagePathName; // Save the image path
            }

        // Create the slider entry
        $certificate = Certificate::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $certificate->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }
          // Save the certificate along with its translations
          $certificate->save();
          return redirect()->route('certificates.index');
    }

    public function show(Certificate $partners)
    {
        //
    }

    public function edit( $id)
    {
        $certificate=Certificate::find($id);
        return view('dashboard.certificates.edit',['certificate' => $certificate]);
    }

    public function update(UpdateCertificateRequest $request, $id)
    {

    // Find the record and check for existence
    $certificate = Certificate::find($id);
    if (!$certificate) {
        return redirect()->route('certificates.index')->withErrors(['error' => 'certificate record not found.']);
    }
    // Unlink the old image if a new image is being uploaded and the old image exists
    if ($request->hasFile('image') && $certificate->image && file_exists(public_path('images/certificates/'.$certificate->image))) {
        unlink(public_path('images/certificates/'.$certificate->image)); // Delete the old image
    }
    // Update image if provided
    if ($request->hasFile('image')) {
        $finalImagePathName = $this->SaveImage('images/certificates', $request->file('image'));
        $certificate->image = $finalImagePathName; // Save the new image path
    }
    $certificate->status = $request->input('status');

    // Save the base model
    $certificate->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $certificate->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $certificate->save();
    return redirect()->route('certificates.index')->with('success', 'certificate updated successfully.');
}

public function destroy(Request $request)
{

    $certificate = Certificate::find($request->certificate_id);
    if (!$certificate) {
        return redirect()->route('certificates.index')->with('error', 'certificate not found.');
    }
    // Unlink the associated image if it exists
    if ($certificate->image && file_exists(public_path('images/certificates/' . $certificate->image))) {
        unlink(public_path('images/certificates/' . $certificate->image));
    }
    // Delete translations and the certificate record
    $certificate->translations()->delete();
    $certificate->delete();
    return redirect()->route('certificates.index')->with('success', 'certificate deleted successfully.');

}
}
