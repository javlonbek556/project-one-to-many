<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CommentStoreRequest;

class CommentController extends Controller
{
    public function storePost(CommentStoreRequest $request, Post $post)
{
    $post = Post::findOrFail($request->post_id); // post_id kelishi shart

    $post->comments()->create([
        'name' => $request->name,
        'comment' => $request->comment,
    ]);

    return back()->with('success', 'Comment added!');


}
public function storeVideo(CommentStoreRequest $request, $videoId)
{
    $video = Video::findOrFail($videoId);

    $comment = new Comment();
    $comment->name = $request->name;  
    $comment->comment = $request->comment;  
    $comment->commentable_id = $video->id;  
    $comment->commentable_type = get_class($video);  
    $comment->save();

    // Video sahifasiga qaytish
    return redirect()->route("videos.show", $video->id)->with("success",);
}
 

public function destroy(Comment $comment)
{
 
    $comment->delete();
    return back();

}
}