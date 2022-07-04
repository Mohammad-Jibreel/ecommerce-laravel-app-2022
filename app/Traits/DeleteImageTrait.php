<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

Trait  DeleteImageTrait
{
     function DeleteImage($photo,$folder){


        $image_path = public_path('/uploads'.'/'.$folder.'/'.$photo);

        if (file_exists($image_path)) {
                File::delete($image_path);
                return true;
        }
        else
        false;


    }


}
