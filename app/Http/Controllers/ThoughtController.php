<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\Thought;
use App\Models\Tag;
use Illuminate\Http\Request;

class ThoughtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Title $title)
{
    $validated = $request->validate([
        'part'    => 'required|string|max:255',
        'thought' => 'required|string|max:1000',
        'tag'     => 'nullable|string|max:255',
    ]);

    $tag = null;
    if (!empty($validated['tag'])) {
        $tag = Tag::firstOrCreate(['tag' => $validated['tag']]);
    }

    $title->thoughts()->create([
        'part'    => $validated['part'],
        'thought' => $validated['thought'],  
        'tag_id'  => $tag?->id,
    ]);

    return redirect()->route('titles.show', $title)
                        ->with('success', '感想を投稿しました！');
}


    /**
     * Display the specified resource.
     */
    public function show(Thought $thought)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thought $thought)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Thought $thought)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thought $thought)
    {
        //
    }
}
