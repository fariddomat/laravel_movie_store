<?php

namespace App\Http\Controllers;

use App\Movie;
use App\MovieComment;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment =new MovieComment();
        // $comment = new Comment();

        $comment->comment = $request->comment;

        $comment->user()->associate($request->user());

        $movie = Movie::find($request->movie_id);

        $movie->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        $reply = new MovieComment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');
        // dd($reply->parent_id);

        $movie = Movie::find($request->get('movie_id'));

        $movie->comments()->save($reply);

        return back();

    }

    public function destroy($id)
    {
        $comment = MovieComment::find($id);
        if ($comment) {
        // dd($comment);

            $comment->delete();
            return back();
        }
        else {
            return redirect()->route('404');

        }

    }

    public function report($id)
    {
        $comment = MovieComment::find($id);
        if($comment){
            $report=Report::create([
                'user_id'=>Auth::user()->id,
                'comment_id' =>$id,
            ]);
            $report->save();
            return back();

        }else {
            return redirect()->route('404');

        }

    }
}
