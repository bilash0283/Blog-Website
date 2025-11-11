<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pages.socialmedia.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.socialmedia.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        SocialMedia::create([
            'title' => $request->title,
            'link' => $request->link,
            'status' => $request->status,
            'icon' => $request->icon
        ]);

        flash()->success('Social Media Add Successfull');
        return redirect()->route('Social-Media.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
