<?php

namespace App\Traits;
use Intervention\Image\File;
use Intervention\Image\Facades\Image;


trait Media{

    function uploadImage($image, $url){

       if(!file_exists($url)){
            mkdir($url, $mode = 0777, true);
        }

        $imageExt = $image->extension();

        $imageName = time().'.'.$imageExt;
        $thumbName = 'thumnail-'.time().'.'.$imageExt;

        $imageFunc = Image::make($image);

        $thumbNailHeight = 100;
        $thumbNailWidth  = 100;

        $imageFunc->fit($thumbNailWidth, $thumbNailHeight, function ($constraint) {
            $constraint->aspectRatio();
        });


        $save = $imageFunc->save($url.$thumbName);

        if($save){
            $image->move($url, $imageName);
            $thumbUrl = \URL::to('/images/'.$thumbName);
            $imageUrl = \URL::to('/images/'.$imageName);
            return ['image'=>$imageUrl, 'thumbnail'=>$thumbUrl];
        }
    }

}
