<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MultiFileUploadController extends Controller
{
    public function index()
    {
        return view('multiple-files-upload');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'files' => 'required',
            'files.*' => 'image|mimes:jpeg,png,jpg'
        ]);

        $image = [];

        if($request->hasfile('files'))
        {
            foreach($request->file('files') as $key => $file)
            {
                $name = $file->getClientOriginalName();
                $file->storeAs('public/files', $name);
                $image[] = $name;
            }
        }
        return join(",",$image);
    }
}
