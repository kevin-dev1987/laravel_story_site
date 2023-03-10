<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Story;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    public function likeStory(Request $request){
        $response = [];
        // Check the user is logged in
        if(auth()->user()){
            $response['auth'] = 'not_auth';
            echo json_encode($response);
            exit();
        } else{
            // Check the story exists
            $story_id = $request->story_id;
            $story = Story::find($story_id);
            if(!$story){
                $response['story'] = 'no_story';
                echo json_encode($response);
                exit();
            } else{
                Like::create([
                    'user_id' => 777,
                    'story_id' => $story_id,
                ]);
                $response['like'] = 'liked';
                echo json_encode($response);
                exit();

            }
        }

    }
}
