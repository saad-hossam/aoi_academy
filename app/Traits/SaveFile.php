<?php

namespace App\Traits;
  use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
Trait  SaveFile
{

 

public function SaveImage(string $relativeDir, \Illuminate\Http\UploadedFile $image): string
{
    // هنا هيبقى فولدر جوه public
    $dir = $relativeDir;

    // لو الفولدر مش موجود اعمله
    if (!File::exists($dir)) {
        File::makeDirectory($dir, 0755, true);
    }

    // اسم فريد للفايل
    $ext      = strtolower($image->getClientOriginalExtension() ?: 'jpg');
    $filename = Str::random(10) . '.' . $ext;

    // انقل الصورة جوه public/images/news/more
    $image->move($dir, $filename);

    // رجع الاسم بس (مش الباث كامل)
    return $filename;
}
    public function SaveImageCustomWidthandCustomHieght($path,$image,$width,$hieght){
        $uploadpath = $path;
        $new_image = Image::make($image->getRealPath());
        if($new_image != null){
            $new_width= $width;
            $new_height= $hieght;
            $new_image->resize($new_width, $new_height);
            // $new_image->resize($new_width, $new_height, function    ($constraint) {
            //        $constraint->aspectRatio();
            // });
        }
        $extension = $image->getClientOriginalExtension();
        $filename = time().$image->getClientOriginalName(). '.' . $extension;

        $new_image->save($uploadpath. $filename);

        return $filename;
    }
    public function SaveFile($path,$file){
        $uploadpath = $path;
        $fileimage=$file;
        $extension = $fileimage->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $fileimage->move($uploadpath, $filename);
        return $filename;
    }

}
