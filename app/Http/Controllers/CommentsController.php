<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $result = Comment::create($request->all());

        if($result)
        {
            return redirect()->back()->with('message', 'Ваш комментарий добавлен на рассмотрение');
        }

        dd("Что то пошло не так");
    }
}
