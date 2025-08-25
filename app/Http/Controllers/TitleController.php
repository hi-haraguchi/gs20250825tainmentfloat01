<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 全取得
        // $titles = Title::with('user')->latest()->get();

        $titles = Auth::user()
        ->titles()
        ->with('thoughts')
        ->latest()
        ->get();

        return view('titles.index', compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('titles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'title' => 'required|max:255',
        ]);

        $request->user()->titles()->create($request->only('title'));

        return redirect()->route('titles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        //
        return view('titles.show', compact('title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Title $title)
    {
        //
        return view('titles.edit', compact('title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Title $title)
    {
        //
        $request->validate([
        'title' => 'required|max:255',
        ]);

        $title->update($request->only('title'));

        return redirect()->route('titles.show', $title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        //
        $title->delete();

        return redirect()->route('titles.index');
    }
}
