<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CloudderController extends Controller
{
    public function getFile()
    {
        return view('cloudder');
    }

    public function uploadFile(Request $request)
    {
        $response = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        dd($response);

        return back()
            ->with('success', 'File uploaded successfully');

    }
}
