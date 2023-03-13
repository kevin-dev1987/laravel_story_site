<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Story;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function favouriteStory(Request $request){
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
                Favourite::create([
                    'user_id' => 777,
                    'story_id' => $story_id,
                ]);
                $response['favourite'] = 'favourited';
                echo json_encode($response);
                exit();

            }
        }

    }
}
