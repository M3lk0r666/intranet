<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Content;

class LearningController extends Controller
{
    public function index()
    {
        /* $videos = \App\Models\Video::published()->get()->map(fn($v) => [
            'type' => 'video',
            'data' => $v
        ]);

        $contents = \App\Models\Content::published()->get()->map(fn($c) => [
            'type' => 'content',
            'data' => $c
        ]);

        $items = $videos->merge($contents);

        return view('intranet.learning.index', compact('items')); */

        $videos = Video::published()->latest()->get();
        $pdfs = Content::published()->where('type', 'pdf')->latest()->get();
        $guides = Content::published()->where('type', 'guide')->latest()->get();

        return view('intranet.learning.index', compact('videos', 'pdfs', 'guides'));
    }

    public function show($type, $id)
    {
        if ($type === 'video') {
            $item = \App\Models\Video::findOrFail($id);
        } else {
            $item = \App\Models\Content::findOrFail($id);
        }

        return view('intranet.learning.show', compact('item', 'type'));
    }
}
