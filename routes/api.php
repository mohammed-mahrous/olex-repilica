<?php

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Advertisement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\Sanctum;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'username' => 'required',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'username' => ['The provided credentials are incorrect.'],
        ]);
    }
    $token = $user->createToken($request->device_name);

    return ['token' => $token->plainTextToken];
});

Route::middleware('auth:sanctum')->delete('sanctum/logout',function (Request $request){
    $request->user()->tokens()->delete();
    return response()->json(['meassage'=> 'token revoked'],200,);
});

Route::middleware('auth:sanctum')->get('sanctum/user', function (Request $request) {
    return response()->json([
        'user' => $request->user(),
        'tokens' => $request->user()->tokens()->get()->pluck('token'),
    ]);
});
