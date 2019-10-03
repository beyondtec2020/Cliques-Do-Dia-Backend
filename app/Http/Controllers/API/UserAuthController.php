<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

use Validator;
use Activation;
use Reminder;

class UserAuthController extends Controller {
  protected $apiGuard = 'api';

  public function login(Request $request) {
    $validator = Validator::make(request(['email', 'password']), [
      'email' => 'required',
      'password' => 'required|min:numeric',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => false,
        'message' => 'Password and Email is required'
      ],403);
    }

    $credentials = request(['email', 'password']);

    if (!$token = auth($this->apiGuard)->attempt($credentials)) {
      return response()->json([
        'status' => false,
        'error' => 'Unauthorized'
      ], 401);
    }

    $user = auth($this->apiGuard)->user();

    if (Sentinel::findUserById($user->id)->roles()->first()->slug == 'user') {
      return $this->respondWithToken($token);
    } else {
      auth($this->apiGuard)->logout();
      return response()->json([
        'status' => false,
        'error' => 'Unauthorized'
      ], 401);
    }
  }

  protected function respondWithToken($token) {
    return response()->json([
      'status' => true,
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => auth($this->apiGuard)->factory()->getTTL() * 60
    ]);
  }
}
