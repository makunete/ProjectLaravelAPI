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
    return response()->json( $pensionsbarri );
});
Route::get('/barris', function(Request $request) {
	// retorna llista de barris
	$barris = pensions::distinct()->select("barris","dte")->get();
    return response()->json( $barris );
});
