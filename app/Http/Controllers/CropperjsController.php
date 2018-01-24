<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CropperjsController extends Controller
{
    public function update_photo_crop(Request $request) {
        $cropped_value = $request->input("cropped_value"); //// Width,height,x,y,rotate for cropping
        $cp_v = explode("," ,$cropped_value); /// Explode width,height,x etc
        $file = Input::file('file'); 
        $file_name ="image.jpg";
        if (Input::hasFile('file')) {
           $path = $file->storeAs("original/path/" , $file_name); // Original Image Path 
           $img = Image::make($file->getRealPath());
           $path2 = public_path("file/path/$file_name"); ///  Cropped Image Path
           $img->rotate($cp_v[4] * -1);  /// Rotate Image
           $img->crop($cp_v[0],$cp_v[1],$cp_v[2],$cp_v[3])->save($path2); // Crop and Save
           echo "success";
        }
    }

    public function index(){
        return view('user.cropperjs');
    }
}
