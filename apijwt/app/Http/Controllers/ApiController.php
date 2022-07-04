<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request) {
        $data = $request->only('name','email','password');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'Password' => 'required|string|min:6|max:50'
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->messages()], 200);
        }

        //apabila valid
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Password' => bcrypt ($request->password)
        ]);

        return response()->json([
            'success' => true,
            'messages' => 'User create succesfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

    public function authenticate(Request $request) {
        $credentials = $request->only('email','password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'Password' => 'required|string|min:6|max:50'
        ]);
        if($validator->fails()) {
            return response()->json(['error'=>$validator->messages()], 200);
        }

        try {
            if(! $token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'messages' => 'Login credentials are invalid'
                ], 400);
            }
        } catch (JWTException $e) {
            return $credentials;
            return response()->json([
                'success' => false,
                'messages' => 'Could not create token'
            ], 500);
        }
        return response()->json([
            'success' => true,
            'token' => $token
        ], 200);
    }
    
    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is validated, do logout
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'messages'=> 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'messages' => 'Sorry, user cannot be logout'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }
}
