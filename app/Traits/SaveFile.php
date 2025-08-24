<?php

namespace App\Traits;
use Intervention\Image\Facades\Image;
Trait  SaveFile
{

    public function SaveImage($path,$image){

        $uploadpath = $path;
        $fileimage=$image;
        $extension = $fileimage->getClientOriginalExtension();
        $filename = time().$fileimage->getClientOriginalName(). '.' . $extension;
        $fileimage->move($uploadpath, $filename);
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
