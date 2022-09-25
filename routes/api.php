<?php

use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('welcome/login', 'WelcomeController@login', function ($e) {
    return 'Creating a note';
});
class WelcomeController
{
    function login(Request $request)
    {
        $resp = $request->all();
        $users = DB::select('SELECT * FROM usuario WHERE correo="' . $resp['email'] . '" and contrasena="' .$resp['password'] . '"');

        if (count($users) == 0) {
            echo ('usuario invalido');
            return view('welcome');
        }
        else return view('home');
        print_r($users);
    }
}
