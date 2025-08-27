<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::with(['thoughts.title'])->get();
        return view('tags.index', compact('tags'));
    }


    public function show(Tag $tag)
    {
        $thoughts = $tag->thoughts()->with('title')->latest()->get();

        return view('tags.show', compact('tag', 'thoughts'));
    }
}