<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('editormd-image-file')) {
            $file = $request->file('editormd-image-file');

            $fileName = (string)round((microtime(true) * 1000)) . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads'), $fileName);

            exit(json_encode(['success' => 1, 'url' => '/uploads/' . $fileName]));
        }

        return response()->json(['success' => 0]);
    }
}