<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     consumes={"application/x-www-form-urlencoded"},
 *     @SWG\Info(
 *         version="1.0",
 *         title="Gage API",
 *         description="This is the API service for Gage app",
 *         @SWG\Contact(
 *             url="#"
 *         ),
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="Find out more about Gage",
 *         url="#"
 *     )
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
