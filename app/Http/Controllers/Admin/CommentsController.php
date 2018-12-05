<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function show()
    {
        $comments = Comment::all();

        return view('admin.comments.index')->with('comments', $comments);
    }

    public function allow(int $id)
    {
        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->save();

        return redirect()->route('comments.show')->with('message', 'Комментарий одобрен');
    }

    public function disallow(int $id)
    {
        $comment = Comment::find($id);
        $comment->status = 0;
        $comment->save();

        return redirect()->route('comments.show')->with('message', 'Комментарий запрещен');
    }

    public function destroy(int $id)
    {
        Comment::find($id)->delete();

        return redirect()->route('comments.show')->with('message', 'Комментарий удален');
    }
}
