<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login'] ]);
    }
    
    
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required',
         
         ]);

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or Password Invalid'], 401);
        }

        return $this->respondWithToken($token);
    }
     /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    
    // public function register(Request $request)
    // {
        // $user = User::create(array_merge(
        //     $request->validate([
        //         'first_name' => 'required|alpha|min:2',
        //         'last_name' => 'required|alpha|min:2',
        //         'primary_phone' => 'required',
        //         'email' => 'required|email',
        //         'password' => 'required|min:6|regex:/^.*[a-zA-Z].*[0-9].*[$%^&*()_+@#!"\'.?].*$/'
        //     ]),
        //     ['password' => bcrypt($request->password)]
        // ));
     
        // auth()->login($user);
        // $token = JWTAuth::fromUser($user);

        // $validateData = $request-> validate([
        //     'first_name' => 'required|string|between:2,100',
        //     'last_name' => 'required|string|between:2,100',
        //     'email' => 'required|string|email|max:100|unique:users',
        //     'primary_phone' => 'required|between:10,20|unique:users',
        //     'password' => 'required|string|confirmed|min:6',
        // ]);

        
        // $data = array();
        // $data['first_name'] = $request->first_name;
        // $data['last_name']    = $request->last_name;
        // $data['email']    = $request->email;
        // $data['primary_phone']    = $request->primary_phone;
        // $data['password']    = bcrypt($request->password);

        // DB::table('users')->insert($data);
        
        // return $this->login($request);
    // }
    
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
        ]);
    }
}