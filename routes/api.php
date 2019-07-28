<?php

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;

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


Route::get('/user', function () {
    return new UserResource(auth()->user());
});


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {


    $api->group([
        'namespace' => 'App\Http\Controllers'
    ],
        function ($api) {
            $api->group([
                'middleware' => 'jwt.auth'
            ],
                function ($api) {
                    $api->get('/test', function () {
                        return "it works";
                    });

                    $api->patch('/auth/refresh', [
                        'uses' => 'APIAuthController@patchRefresh',
                        'as' => 'api.auth.refresh'
                    ]);

                    $api->delete('/auth/invalidate', [
                        'uses' => 'APIAuthController@deleteInvalidate',
                        'as' => 'api.auth.invalidate'
                    ]);

                });


        });

});
