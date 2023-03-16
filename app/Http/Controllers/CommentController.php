<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentLike;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentLike(Request $request){
        $response = [];
        //Check the user is logged in
        if(auth()->user()){
            $response['auth'] = 'not_auth';
            echo json_encode($response);
            exit();
        } else{
            //Check the comment exists
            $comment_id = $request->comment_id;
            $comment = Comment::find($comment_id);
            if(!$comment){
                $response['comment'] = 'no_comment';
                echo json_encode($response);
                exit();
            } else{
                CommentLike::create([
                    'user_id' => 777,
                    'comment_id' => $comment_id,
                ]);

                $comment_like_count = CommentLike::where('comment_id', $comment_id)->count();

                $response['comment_like'] = 'comment_liked';
                $response['like_count'] = $comment_like_count;
                echo json_encode($response);
                exit();
            }
        }
    }
}
