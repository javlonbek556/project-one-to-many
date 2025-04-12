<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::all();
        return view("videos.index", compact("videos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("videos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Video::create([
            "title"=> $request->title,
            "url"=> $request->url,
        ]);
        return redirect()->route("videos.index")->with("success","");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $videos = Video::find($id);
        return view("videos.show", compact("videos"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $videos = Video::find($id);
        return view("videos.edit", compact("videos"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Video::find($id)->update([
            "title"=> $request->title,
            "url"=> $request->url,
        ]);
        return redirect()->route("videos.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Video::find($id)->delete();
        return redirect()->route("videos.index")->with("success","videos");
    }
}
