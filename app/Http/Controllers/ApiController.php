<?php

namespace App\Http\Controllers;

use Statamic\Statamic;
use Statamic\Support\Str;
use Statamic\Facades\Data;
use Statamic\Facades\Site;
use Illuminate\Http\Request;
use Statamic\Exceptions\NotFoundHttpException;
use Statamic\Http\Controllers\API\CollectionEntriesController;

class ApiController extends Controller
{

    public function show(Request $request)
    {
        return $this->resolveRoute($request);
    }

    public function resolveRoute(Request $request)
    {

        $url = Site::current()->relativePath(
            str_finish(str_ireplace('/api/routes', '', $request->getUri()), '/')
        );

        if (Str::contains($url, '?')) {
            $url = substr($url, 0, strpos($url, '?'));
        }

        if ($data = Data::findByUri($url, Site::current()->handle())) {
            $collection = $data->structure()->collection()->handle();
            return (new CollectionEntriesController($request))->show($collection, $data);
        }

        throw new NotFoundHttpException;
    }
}
