<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    use HttpResponses;
    public function register(StoreUserRequest $request)
    {
        try {
            $validateUser = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required'
            ]);
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation errror',
                    'errors' => $validateUser->errors()

                ], 401);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            return response()->json([
                'status' => true,
                'message' => 'User Created Succeesfully',
                'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),

            ], 500);
        }
    }
    public function login(LoginUserRequest $request)
    {

        try {
            $validateUser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required'
            ]);
            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation errror',
                    'errors' => $validateUser->errors()

                ], 401);
            }
            if (!Auth::attempt($request->only('email', 'password'))) {
                return $this->error("", "Credentials do not match", 401);
            }
            $user = User::where('email', $request->email)->first();
            return response()->json([
                'status' => true,
                'message' => 'User Logged In Succeesfully',
                'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),

            ], 500);
        }
    }
    public function logout()
    {
        Auth::user()->currentAccessToken->delete();
        $this->success([
            'message' => 'You have successfully been looged out and your token has been deleted'
        ]);
    }
}
