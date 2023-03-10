<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function followUser(Request $request)
    {
        $response = [];
        //First make sure the follower is logged in
        if (auth()->user()) {
            $response['auth'] = 'not_auth';
            echo json_encode($response);
            exit();
        } else {

            $id = $request->follow_id;
            $user = User::find($id);
            if (!$user) {
                $response['user_check'] = 'user_not_found';
                echo json_encode($response);
                exit();
            } else{
                
                Follow::create([
                    'follow_from' => 777,
                    'follow_to' => $id,
                ]);

                $response['user_follow'] = 'success';
                echo json_encode($response);
                exit();
            }
            
        }
    }
}
