@extends('layouts.videos')
@section('content')
@section ('title', 'Video tahrirlash')




    <title>Video tahrirlash</title>
   
    <div class="container mt-5">
        <h1 class="text-center">Video tahrirlash</h1>
        <form action="{{ route('videos.update',$videos->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="video_id" value="1">
            <div class="mb-3">
                <label for="title" class="form-label">Video Sarlavhasi</label>
                <input type="text" class="form-control" id="title" name="title" value="Birlamchi Video" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Video URL</label>
                <input type="url" class="form-control" id="url" name="url" value="https://www.example.com" required>
            </div>
            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('videos.index') }}" class="btn btn-secondary">Orqaga</a>
        </form>
    </div>

   
