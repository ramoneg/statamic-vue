<?php

use Statamic\Statamic;
use Statamic\Support\Str;
use Statamic\Facades\Data;
use Statamic\Facades\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Statamic\Exceptions\NotFoundHttpException;
use Statamic\Http\Controllers\API\CollectionEntriesController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/routes/{route}', function (Request $request, $route) {

    $url = Site::current()->relativePath(
        str_finish(str_ireplace('/api/routes', '', $request->getUri()), '/')
    );

    if ($url === '' || $route == 'home') {
        $url = '/';
    }

    if (Str::contains($url, '?')) {
        $url = substr($url, 0, strpos($url, '?'));
    }

    if ($data = Data::findByUri($url, Site::current()->handle())) {
        $collection = $data->structure()->collection()->handle();
        return (new CollectionEntriesController($request))->show($collection, $data);
    }

    throw new NotFoundHttpException;
})->where('route', '.*');
