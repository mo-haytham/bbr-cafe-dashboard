<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageTrait
{
    function saveImage($image_original, $width = 600, $height = 400, $has_thumbnail = true)
    {
        $img_name = time() . rand(0, 99) . '.' . $image_original->getClientOriginalExtension();
        Image::make($image_original)
            ->resize($width, $height)
            ->save('images/original/' . $img_name);
        if ($has_thumbnail) {
            Image::make($image_original)
                ->resize(100, 100)
                ->save('images/thumbnail/' . $img_name);
        }
        return $img_name;
    }

    function deleteImage($image, $path)
    {
        $flag = 0;
        if (File::exists('images/original/' . $image)) {
            File::delete('images/original/' . $image);
            $flag++;
        }
        if (File::exists('images/thumbnail/' . $image)) {
            File::delete('images/thumbnail/' . $image);
            $flag++;
        }
        return $flag;
    }
}
