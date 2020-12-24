<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Validator;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public $toke = true;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */

    public function __construct()
    {
    $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function register(Request $request)
        {

         $validator=Validator::make($request->all(), [
                        'name' => 'required',
                        'email' => 'required|unique:users',
                        'phone' => 'required|unique:users|regex:/(01)[0-9]{9}/',
                        'password' => 'required|confirmed',
                     ]);
         if ($validator->fails()) {

               return response()->json(['error'=>$validator->errors()], 401);

            }

            $customer=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,

            ]);
            $customerRole=Role::where('name','customer')->first();
            $customer->attachRole($customerRole->id);
            $credentials = $request -> only(['email','password']) ;

            $token=auth('api_customer')->attempt($credentials);
            if (!$token) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

          return  $this->respondWithToken($token,$customer);


        }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
         ]);
        if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);
        }
        $credentials = request(['email', 'password']);
        if (!  $token=auth()->guard('api_customer')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $customer=User::where('id',auth('api_customer')->user()->id)->first();
        return $this->respondWithToken($token,$customer);
    }

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
        auth('api_customer')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $customer=User::where('id',auth('api_customer')->user()->id)->first();

        return $this->respondWithToken(auth()->refresh(),$customer);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token,$customer)
    {
        return response()->json([
            'customer'=>$customer,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api_customer')->factory()->getTTL() * 60,
        ]);
    }
}
