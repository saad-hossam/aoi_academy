<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\CourseImage;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    use SaveFile;

    private const MAIN_DIR    = 'images/courses';
    private const GALLERY_DIR = 'images/courses/gallery';

    function __construct()
    {
        $this->middleware('permission:course-list', ['only' => ['index']]);
        $this->middleware('permission:course-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:course-edit', ['only' => ['edit', 'update', 'destroyImage']]);
        $this->middleware('permission:course-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $courses = Course::withTranslation()->orderBy('order')->get();

        return view('dashboard.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('dashboard.courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $data = $request->only(['status', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $this->SaveImage(self::MAIN_DIR, $request->file('image'));
        }

        $course = Course::create($data);

        $this->saveTranslations($course, $request);
        $this->saveGallery($course, $request);

        return redirect()->route('courses.index')->with('add', 'تم إضافة الدورة بنجاح');
    }

    public function edit(Course $course)
    {
        $course->load('images');

        return view('dashboard.courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->only(['status', 'order']);
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('image')) {
            $this->deleteFile(self::MAIN_DIR, $course->image);
            $data['image'] = $this->SaveImage(self::MAIN_DIR, $request->file('image'));
        }

        $course->update($data);

        $this->saveTranslations($course, $request);
        $this->saveGallery($course, $request);

        return redirect()->route('courses.index')->with('edit', 'تم تعديل الدورة بنجاح');
    }

    public function destroy(Course $course)
    {
        $this->deleteFile(self::MAIN_DIR, $course->image);

        foreach ($course->images as $image) {
            $this->deleteFile(self::GALLERY_DIR, $image->path);
        }

        // course_images and course_translations rows are removed by cascadeOnDelete
        $course->delete();

        return redirect()->route('courses.index')->with('delete', 'تم حذف الدورة بنجاح');
    }

    // Delete a single gallery image from the edit page
    public function destroyImage(CourseImage $image)
    {
        $this->deleteFile(self::GALLERY_DIR, $image->path);
        $image->delete();

        return back()->with('delete', 'تم حذف الصورة');
    }

    /* ---------------- helpers ---------------- */

    private function saveTranslations(Course $course, StoreCourseRequest $request): void
    {
        $validated = $request->validated();

        foreach (array_keys(config('app.languages')) as $locale) {
            if (isset($validated[$locale])) {
                $course->translateOrNew($locale)->fill($validated[$locale]);
            }
        }

        $course->save(); // saves the translations too
    }

    private function saveGallery(Course $course, StoreCourseRequest $request): void
    {
        if (!$request->hasFile('images')) {
            return;
        }

        $next = (int) CourseImage::where('course_id', $course->id)->max('order') + 1;

        foreach ($request->file('images') as $file) {
            $course->images()->create([
                'path'  => $this->SaveImage(self::GALLERY_DIR, $file),
                'order' => $next++,
            ]);
        }
    }

    private function deleteFile(string $dir, ?string $filename): void
    {
        if ($filename) {
            File::delete(public_path($dir . '/' . $filename));
        }
    }
}
