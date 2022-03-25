<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' =>'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return sendValidationError($validator->errors()->toArray());
        }

            if(Auth::attempt(['email'=>request('email'), 'password'=>request('password')]))
            {
                $user = Auth::user();
                $details = $this->getUserDetail($user);
                $details['token'] = $this->generateToken($user,$request->password);
                $message="Login Successful.";
                return sendSuccessResponse($message,$details);

            }
        return sendFailureMessage("Invalid login credentials.");

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile_no' => 'required|numeric|digits:10|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return sendValidationError($validator->errors()->toArray());
        }
        $input=$request->only('first_name','last_name','email','mobile_no');
        $input['password']=bcrypt($request->password);
        $user=User::create($input);
        if($user)
        {
            $details = $this->getUserDetail($user);
            $details['token']= $this->generateToken($user,$input['password']);
            $message="User registered successfully.";
            return sendSuccessResponse($message,$details);
        }
        return sendFailureMessage("Unable to register this user.");
    }

    private function generateToken($user, $str)
    {
        return $user->createToken($str)->plainTextToken;
    }

    private function getUserDetail($user)
    {
        return [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email'=> $user->email,
            'mobile_no' => $user->mobile_no,
        ];
    }
}
