<?php

namespace App\Logic;
use App\Models\Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

use Log;

class ImageRepository
{
    public function upload( $form_data )
    {
        $validator = Validator::make($form_data, Image::$rules, Image::$messages);

        if ($validator->fails()) {
            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);
        }

        $photo = $form_data['file'];
        $originalName = $photo->getClientOriginalName();
        Log::info(__CLASS__."::".__METHOD__."::"."Original filename is obtained as  ".$originalName);


        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - 4);
        Log::info(__CLASS__."::".__METHOD__."::"."Original filename without ext is  ".$originalNameWithoutExt);


        $filename = $this->sanitize($originalNameWithoutExt);
        Log::info(__CLASS__."::".__METHOD__."::"."Sanitized filename is  ".$filename);

        $allowed_filename = $this->createUniqueFilename( $filename );
        Log::info(__CLASS__."::".__METHOD__."::"."Unique filename is   ".$allowed_filename);

        $filenameExt = $allowed_filename .'.jpg';


        $uploadSuccess1 = $this->original( $photo, $filenameExt );

        if( !$uploadSuccess1 ) {
            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);
        }

        $sessionImage = new Image;
    //    $sessionImage->filename      = $allowed_filename;
        $sessionImage->path = $filenameExt;
        $sessionImage->save();
        return Response::json([
            'error' => false,
            'code'  => 200,
            'message' => $filenameExt
        ], 200);
    }

    public function createUniqueFilename( $filename )
    {
        $full_size_dir = Config::get('images.path');
        $full_image_path = $full_size_dir . $filename . '.jpg';
        if ( File::exists( $full_image_path ) )
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken;
        }
        return $filename;
    }
    /**
     * Optimize Original Image
     */
    public function original( $photo, $filename )
    {
        $manager = new ImageManager();
    //    $image = $manager->make( $photo )->encode('jpg')->save(Config::get('images.full_size') . $filename );

        //Get the current dimension of the image
        $image = $manager->make( $photo );

        $orig_width = $image-> width();
        $orig_height = $image->height();

        Log::info(__CLASS__."::".__METHOD__."::"."WIdth and height is    ".$orig_width." ".$orig_height );
        $new_width = $orig_width < 600 ? $orig_width : 600;
        $new_height = $orig_height < 450 ? $orig_height : 450;

        Log::info(__CLASS__."::".__METHOD__."::"."New WIdth and height is    ".$new_width." ".$new_height );
        // Now resize the image

       
        Log::info(__CLASS__."::".__METHOD__."::"."Made new_image" );

        $image->encode('jpg');
        Log::info(__CLASS__."::".__METHOD__."::"."Encoded new_image" );

        $image->resize($new_width, null, function($constraint){
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        Log::info(__CLASS__."::".__METHOD__."::"."Done resizing" );

        $image->save( Config::get('images.path'). $filename);
        Log::info(__CLASS__."::".__METHOD__."::"."New image saved as     ".Config::get('images.path').$filename);

        return $image;
    }

    /**
     * Create Icon From Original
     */
    public function icon( $photo, $filename )
    {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->encode('jpg')->resize(200, null, function($constraint){$constraint->aspectRatio();})->save( Config::get('images.icon_size')  . $filename );
        return $image;
    }
    /**
     * Delete Image From Session folder, based on original filename
     */
    public function delete( $originalFilename)
    {
        Log::info(__CLASS__."::".__METHOD__."::"."Original filename is      ".$originalFilename);
        $full_size_dir = Config::get('images.path');
        Log::info(__CLASS__."::".__METHOD__."::"."Full size dir is     ".$full_size_dir);
       
        $sessionImage = Image::where('path', 'like', $originalFilename)->first();
        if(empty($sessionImage))
        {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);
        }
        $full_path1 = $full_size_dir . $sessionImage->path . '.jpg';
        Log::info(__CLASS__."::".__METHOD__."::"."session image filename is ".$sessionImage->path
                    ." full path is ".$full_path1);

        if ( File::exists( $full_path1 ) )
        {
            File::delete( $full_path1 );
            Log::info(__CLASS__."::".__METHOD__."::"."Deleted file    ".$full_path1);
        }
        if( !empty($sessionImage))
        {
            $sessionImage->delete();
            Log::info(__CLASS__."::".__METHOD__."::"."Deleted session image    ".$full_path1);
        }
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false)
    {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }
}