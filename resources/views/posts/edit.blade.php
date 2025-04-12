@extends('layouts.posts')
@section('content')
@section ('title', 'Postni tahrirlash')
    <title>Postni Tahrirlash</title>
    
    <div class="container mt-5">
        <h1 class="text-center">Postni Tahrirlash</h1>
        <form action="{{ route('posts.update',$post->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- PUT metodini ishlatish uchun -->
            <input type="hidden" name="_method" value="PUT"> <!-- PUT metodini ishlatish uchun -->
            <div class="mb-3">
                <label for="title" class="form-label">Sarlavha</label>
                <input type="text" class="form-control" id="title" name="title" value="Birinchi Post" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Mazmun</label>
                <textarea class="form-control" id="content" name="content" rows="3" required>Bu postning mazmuni bu yerda joylashgan.</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route("posts.index") }}" class="btn btn-secondary">Orqaga</a>
        </form>
    </div>

   
@endsection
