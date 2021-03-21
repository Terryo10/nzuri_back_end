<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Auth;
use Illuminate\Support\Facades\Route;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|alpha_num|min:5',
                'confirm_password' => 'required|same:password',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['Validation errors' => $validator->errors()]);
        }

        $input = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        );

        // check if email already registered
        $user = User::where('email', $request->email)->first();
        if (!is_null($user)) {
            return response()->json(['success' => false, 'message' => 'Sorry! this email is already registered'],422);
        }

        // create and return data
        $user = User::create($input);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response([ 'user' => $user, 'token' => $accessToken]);


    }
}
