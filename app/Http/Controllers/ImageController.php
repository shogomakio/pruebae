<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    public function postUpload(){
        $form_data = Input::all();

        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ($validator->fails()) {

            return Response::json([
                'status' => 'error',
                'message' => $validator->messages()->first(),
            ], 200);

        }

        $photo = $form_data['img'];

        $original_name = $photo->getClientOriginalName();
        $original_name_without_ext = substr($original_name, 0, strlen($original_name) - 4);

        $filename = $this->sanitize($original_name_without_ext);
        $allowed_filename = $this->createUniqueFilename( $filename );

        $filename_ext = $allowed_filename .'.jpg';

        $manager = new ImageManager();
        $image = $manager->make( $photo )->encode('jpg')->save(env('UPLOAD_PATH') . $filename_ext );

        if( !$image) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }

        $database_image = new Image;
        $database_image->filename      = $allowed_filename;
        $database_image->original_name = $original_name;
        $database_image->save();

        return Response::json([
            'status'    => 'success',
            'url'       => env('URL') . 'uploads/' . $filename_ext,
            'width'     => $image->width(),
            'height'    => $image->height()
        ], 200);
    }

    public function postCrop(){
        $form_data = Input::all();
        $image_url = $form_data['imgUrl'];

        // resized sizes
        $imgW = $form_data['imgW'];
        $imgH = $form_data['imgH'];
        // offsets
        $imgY1 = $form_data['imgY1'];
        $imgX1 = $form_data['imgX1'];
        // crop box
        $cropW = $form_data['width'];
        $cropH = $form_data['height'];
        // rotation angle
        $angle = $form_data['rotation'];

        $filename_array = explode('/', $image_url);
        $filename = $filename_array[sizeof($filename_array)-1];

        $manager = new ImageManager();
        $image = $manager->make( $image_url );
        $image->resize($imgW, $imgH)
            ->rotate(-$angle)
            ->crop($cropW, $cropH, $imgX1, $imgY1)
            ->save(env('UPLOAD_PATH') . 'cropped-' . $filename);

        if( !$image) {

            return Response::json([
                'status' => 'error',
                'message' => 'Server error while uploading',
            ], 200);

        }

        return Response::json([
            'status' => 'success',
            'url' => env('URL') . 'uploads/cropped-' . $filename
        ], 200);
    }

    public function getHome(){
        return view ('user.thumbnail');
    }

}
