<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateHttpRequest;
use App\Http\Requests;
use App\User;
use AppHttpRequests;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class AuthenticateController extends Controller {

    public function index() {
        $users = User::all();
        return $users;
    }

    public function authenticate(Request $request) {
        if (!empty($request->user_type)) {
            /* Admin Login with user_type = 3 */
            $credentials = $request->only('username', 'password', 'is_verified', 'user_type');
        } else {
            /* Normal user Login without */
            $credentials = $request->only('username', 'password', 'is_verified');
        }

        try {
            /* verify the credentials and create a token for the user */
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            /* something went wrong */
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        /* if no errors are encountered we can return a JWT */
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser() {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        /* the token is valid and we have found the user via the sub claim */
        return response()->json(compact('user'));
    }

}
