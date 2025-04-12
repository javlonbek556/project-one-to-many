@extends('layouts.posts')

@section('title', 'Post Tafsilotlari')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $post->title }}</h1>

    <div class="card mb-5">
        <div class="card-header">
            Birinchi Post
        </div>
        <div class="card-body">
            <h5 class="card-title">Post sarlavhasi: {{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>

            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Tahrirlash</a>

            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">O'chirish</button>
            </form>
        </div>
    </div>

    <!-- Izohlar qismi -->
    <div class="comments-section">
        <h4 class="mt-4">Izoh qoldirish</h4>
        <form action="{{ route('storePost',$post->id) }}" method="POST">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="mb-3">
                <label for="user_name" class="form-label">Ismingiz</label>
                <input type="text" class="form-control" id="user_name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Izohingiz</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
                
            <button type="submit" class="btn btn-primary">Izoh qoldirish</button>
        </form>

        <br>
        <h2>Izohlar</h2>

        @if($post->comments->count())
            @foreach($post->comments as $comment)
            <div class="comment mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->name }}</h5>
                        <p class="card-text">{{ $comment->comment }}</p>
                        <small class="text-muted">{{ $comment->created_at }}</small>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>Hozircha izoh yo'q.</p>
        @endif
    </div>
</div>
@endsection
