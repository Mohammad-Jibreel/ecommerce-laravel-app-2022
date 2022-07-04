<?php

namespace App\Traits;

Trait  SaveImageTrait
{
     function saveImage($photo,$folder){


        if(isset($photo)) {
        $file_extension = $photo -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;

        $photo->move(public_path('uploads/'.$folder), $file_name);

        return $file_name;
        }
        else {
            return null;
        }
    }


}
