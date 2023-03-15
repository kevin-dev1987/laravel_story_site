<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportStory(Request $request){
        $response = [];
        // check if story user is logged in
        if(!isset($request->reason)){
            $response['required'] = 'empty';
            echo json_encode($response);
            exit();
        }
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
                Report::create([
                    'user_id' => null,
                    'story_id' => $story_id,
                    'reason' => $request->reason,
                    'reporter_id' => 777,
                ]);

                $response['report'] = 'story_reported';
                echo json_encode($response);
                exit();
            }
        }
    }
}
