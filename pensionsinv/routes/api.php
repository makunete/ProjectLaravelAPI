<?php

use Illuminate\Http\Request;
use App\pensions;
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
Route::get('/barri/{barri}', function(Request $request, $barri) {
	// retorna les sèries de preus per barris
	$pensionsbarri = pensions::select("dte","barris","anys","quantitat")->where('barris','like',"%".$barri."%")->orderBy("anys")->get();
    return response()->json( $pensionsbarri )->withCallback($request->input('callback'));
});
Route::get('/barris', function(Request $request) {
	// retorna llista de barris
	$barris = pensions::distinct()->select("barris","dte","quantitat","anys")->orderBy("anys")->get();
    return response()->json( $barris )->withCallback($request->input('callback'));
});
Route::get('/barrios', function(Request $request) {
	// retorna llista de barris
	$barrios = pensions::distinct()->select("barris")->get();
    return response()->json( $barrios )->withCallback($request->input('callback'));
});
Route::get('/barri/any/{any}', function(Request $request, $any) {
        // retorna les sèries de preus per barris
        $pensionsbarri = pensions::select("dte","barris","quantitat")->where('anys',$any)->get();
    return response()->json( $pensionsbarri )->withCallback($request->input('callback'));
});

