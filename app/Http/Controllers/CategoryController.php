<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\SaveFile;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
    use SaveFile;

    function __construct()
    {
         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:category-create', ['only' => ['create','store']]);
         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $categories=Category::all();
        return view('dashboard.categories.index',['categories'=>$categories]);
    }

    public function create()
    {

 $categories = Category::all(); // fetch all categories to use as possible parents
    return view('dashboard.categories.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
             // Step 1: Save the categories main fields (e.g., status)
            $data = $request->except(['_token', 'ar', 'en']); // Exclude translations
           
  // Ensure parent_id is null if not chosen
    $data['parent_id'] = $request->input('parent_id') ?: null;
        // Create the slider entry
        $category = Category::create($data);
          // Step 2: Handle translations for each locale (ar, en, fr)
          $locales = array_keys(config('app.languages'));  // List of locales to process
          foreach ($locales as $locale) {
             if ($request->has($locale)) {
                 // Create or update the translation for each locale
                 $category->translateOrNew($locale)->title = $request->input("$locale.title");
                 // Add other translatable fields, like description, if needed
             }
          }

          // Save the category along with its translations
          $category->save();
          return redirect()->route('categories.index');
    }

    public function show(Category $categories)
    {
        //
    }

    public function edit( $id)
    {
         $category = Category::find($id);

    // هات كل الفئات اللي ممكن تكون parent (باستثناء نفس الفئة)
    $categories = Category::where('id', '!=', $id)->get();

    return view('dashboard.categories.edit', [
        'category' => $category,
        'categories' => $categories
    ]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {

    // Find the record and check for existence
    $category = Category::find($id);

    if (!$category) {
        return redirect()->route('categories.index')->withErrors(['error' => 'category record not found.']);
    }
   if ($request->input('parent_id') == $id) {
        return redirect()->back()->withErrors(['error' => 'لا يمكن جعل الفئة أب لنفسها.']);
    }
   
    $category->status = $request->input('status');
    $category->order  = $request->input('order');
    $category->parent_id = $request->input('parent_id') ?: null; // Parent handling

    $category->save();
    // Update translations dynamically for all locales
    $locales = array_keys(config('app.languages')); // Get defined locales
    foreach ($locales as $locale) {
        if ($request->has($locale)) {
            $category->translateOrNew($locale)->title = $request->input("$locale.title");
        }
    }
    // Save translations
    $category->save();
    return redirect()->route('categories.index')->with('success', 'category updated successfully.');
}

public function destroy(Request $request)
{

    $category = Category::find($request->category_id);
    if (!$category) {
        return redirect()->route('categories.index')->with('error', 'category not found.');
    }
    // Unlink the associated image if it exists
    if ($category->image && file_exists(public_path('images/categories/' . $category->image))) {
        unlink(public_path('images/categories/' . $category->image));
    }
    // Delete translations and the category record
    $category->translations()->delete();
    $category->delete();
    return redirect()->route('categories.index')->with('success', 'category deleted successfully.');

}
}
