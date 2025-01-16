<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class TinyMceController extends Controller
{
    public function upload(Request $request)
    {

        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->file) {
            $path = storage_path("app/public/img/tiny-upload");
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $image = $request->file('file');
            $image = Image::make($request->file('file'));
            $image->resize(720, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image->save("$path/$file_name");
        } else {
            $file_name = null;
        }
        return response()->json(['location' => asset("storage/img/tiny-upload/$file_name")]);

        /*$imgpath = request()->file('file')->store('uploads', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);*/
    }
}
