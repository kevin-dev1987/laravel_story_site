<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kudos;
use Illuminate\Http\Request;

class KudosController extends Controller
{
    public function kudosUser(Request $request)
    {
        $response = [];
        //First make sure the kudos giver is logged in
        if (auth()->user()) {
            $response['auth'] = 'not_auth';
            echo json_encode($response);
            exit();
        } else {

            $id = $request->kudos_id;
            $user = User::find($id);
            if (!$user) {
                $response['user_check'] = 'user_not_found';
                echo json_encode($response);
                exit();
            } else{
                
                Kudos::create([
                    'kudos_from' => 777,
                    'kudos_to' => $id,
                ]);

                $response['user_kudos'] = 'success';
                echo json_encode($response);
                exit();
            }
            
        }
    }
}
