<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120'
            ], [
                'file.max' => 'La imagen no debe superar los 5MB.'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 422);
        }

        $file = $request->file('file');

        $name = \Illuminate\Support\Str::uuid() . '.' . $file->extension();

        $path = $file->storeAs('tinymce', $name, 'public');

        return response()->json([
            'location' => asset('storage/' . $path)
        ]);

        /* $file = $request->file('file');

        $path = $file->store('tinymce', 'public');

        return response()->json([
            'location' => asset('storage/' . $path)
        ]); */
        /* $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
    
        $file = $request->file('file');
    
        $name = \Illuminate\Support\Str::uuid() . '.' . $file->extension();
    
        $path = $file->storeAs('tinymce', $name, 'public');
    
        return response()->json([
            'location' => asset('storage/' . $path)
        ]); */

    }
}
