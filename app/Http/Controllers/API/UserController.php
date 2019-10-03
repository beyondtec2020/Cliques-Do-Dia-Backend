<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Support\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function userDetail(Request $request){

        if (! $user = JWTAuth::parseToken()->authenticate()) {
            return response()->json(['user_not_found'], 404);
        }

        return response()->json(compact('user'));

    }   

    public function updateProfile(Request $request){
        
        if(!Sentinel::check()){
            return response()->json(['success'=>'false','message'=>'Unaunthicated'],403);
        }

        $id = $request->user_id;

        if(Sentinel::getUser()->id == $id){
            $first_name = $request->first_name;
            $last_name = $request->last_name;
            $phone = $request->phone;
            
            $user = Sentinel::findUserById($id);

            Sentinel::update($user, array('first_name'=>$first_name, 'last_name'=>$last_name, 'phone'=> $phone));
            
            $updated_user = Sentinel::findUserById($id);
            
            return response()->json(['status'=>true,'user'=>$updated_user]);
        }else{
            return response()->json(['status'=>false]);
        }
    }

    public function updatePass(Request $request){

        if(!Sentinel::check()){
            return response()->json(['success'=>'false','message'=>'Unaunthicated'],403);
        }

        $validator = Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',                
        ]);
        
        if ($validator->fails()) {
            return response()->json(['status'=>false,'message'=>$validator->errors()],422);
        }

        $hasher = Sentinel::getHasher();
        $oldPassword = $request->old_password;
        $password = $request->password;
        $passwordConf = $request->password_confirmation;
        $user = Sentinel::getUser();

        if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {          
            return response()->json(['status'=>false,'message'=>'Password Donot match !!.']);
        }

        Sentinel::update($user, array('password' => $password));
        return response()->json(['status'=>true,'message'=>'Password Updated !!.']);
    }
}
