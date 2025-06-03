<?php

namespace App\Http\Controllers;

use App\Mail\PasswordReset;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'contact_number' => 'required|string|max:255',
                'company' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Create user
            $user = User::create([
                'name' => $request->name,
                'email' => Str::lower($request->email),
                'password' => bcrypt($request->password),
                'contact_number' => $request->contact_number,
                'company' => $request->company,
                'address' => $request->address,
            ]);

            // Assign default role
            $user->attachRole(config('roles.models.role')::where('name', '=', 'User')->first());
            
            // Create Stripe customer
            $user->createOrGetStripeCustomer();

            // Generate JWT token
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'success' => true,
                'message' => 'User successfully registered',
                'token' => $token,
                'user' => $user
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {

        $input = $request->only('email', 'password');
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }
        // get the user
        $user = Auth::user();
        $fcmtoken = $request->input('fcm_token');
        if ($fcmtoken) {
            $user->fcm_token = $fcmtoken;
            $user->save();
        }

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' => $user
        ]);
    }

    public function logout(Request $request)
    {
        if (!User::checkToken($request)) {
            return response()->json([
                'message' => 'Token is required',
                'success' => false,
            ]);
        }

        try {
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ]);
        }
    }

    public function updatePortal(Request $request)
    {
        $user = Auth::user();


        if ($request->password) {
            $password = bcrypt($request->password);
            $request->request->add(['password' => $password]);
        } else {
            unset($request['password']);
        }


        if ($request->image) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            try {
                $filePath = $this->UserImageUpload($request->image); //Passing $data->image as parameter to our created method
                $request->request->add(['photo' => $filePath]);
            } catch (\Exception $e) {
            }
        }

        if ($request->phone) {
            $request->request->add(['contact_number' => $request->phone]);
        }

        if ($request->address) {
            $request->request->add(['address' => $request->address]);
        }

        if ($request->company) {
            $request->request->add(['company' => $request->company]);
        }

        if ($request->email) {
            $request->validate([
                'email' => 'email',
            ]);
        }

        $user->update($request->only(['email', 'password', 'photo', 'contact_number', 'address', 'company']));

        return Auth::user();

    }

    public function UserImageUpload($query) // Taking input image as parameter
    {
        $image_name = str_random(20);
        $ext = strtolower($query->getClientOriginalExtension()); // You can use also getClientOriginalName()
        $image_full_name = $image_name . '.' . $ext;
        $upload_path = 'photos/';    //Creating Sub directory in Public folder to put image
        $image_url = $upload_path . $image_full_name;
        $success = $query->move($upload_path, $image_full_name);

        return '/' . $image_url; // Just return image
    }

    public function update(Request $request)
    {
        $user = $this->getCurrentUser($request);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User is not found'
            ]);
        }

        $plainPassword = $request->password;
        if ($plainPassword) {
            $password = bcrypt($request->password);
            $request->request->add(['password' => $password]);
        } else {
            unset($request['password']);
        }

        $token = $request['token'];

        unset($request['token']);

        $updatedUser = User::where('id', $user->id)->update($request->except('token'));
        $user = User::find($user->id);

        return response()->json([
            'success' => true,
            'message' => 'Information has been updated successfully!',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function getCurrentUser(Request $request)
    {
//        return User::whereId(28)->with('properties')->first();
        if (!User::checkToken($request)) {
            return response()->json([
                'success' => false,
                'message' => 'Token is required'
            ]);
        }

        $user = \Tymon\JWTAuth\Facades\JWTAuth::parseToken()->authenticate();
        // add isProfileUpdated....
        $isProfileUpdated = false;
        if ($user->isPicUpdated == 1 && $user->isEmailUpdated) {
            $isProfileUpdated = true;

        }
        $user->isProfileUpdated = $isProfileUpdated;

        return $user;
    }
}
