<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            $name = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads'), $name);

            return response()->json([
                "uploaded" => true,
                "url" => asset("uploads/$name")
            ]);
        }

        return response()->json([
            "error" => [
                "message" => "Upload failed"
            ]
        ], 400);
    }
}
