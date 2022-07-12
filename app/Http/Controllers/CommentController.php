<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    //
    public function __construct(){
        $this->middleware("auth");
    }

    public function create(){
        $comment = new Comment;
        $comment->article_id = request()->article_id;
        $comment->comment = request()->comment;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back();

        // return "ok";
    }

    public function delete($id){
        $comment = Comment::find($id);
        if(Gate::allows('delete-comment', $comment)){
            $comment->delete();
            return back()->with('info', "A comment deleted");
        }else{
            return back()->with('info', "unauthorize to delete");
        }
      

      
    }
}
