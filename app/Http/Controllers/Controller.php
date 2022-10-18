<?php

namespace App\Http\Controllers;

use App\Traits\Api\ApiResponder;
use App\Traits\Image\AwsS3;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Schema;

/**
 * @OA\Tag(
 *     name="Wordprime backend team",
 *     description="(Schneider Shades Komolafe - Overseer)"
 * )
 * @OA\Info(
 *     version="3.0",
 *     title="ToNote App OpenApi API Documentation",
 *     description="ToNote App Using L5 Swagger OpenApi description",
 *     @OA\Contact(email="schneidershades@gmail.com")
 * )
 * @OA\Server(
 *     url="https://getwordprime.herokuapp.com/",
 *     description="Staging API server"
 * )
 * @OA\Server(
 *     url="http://convertscript.test/",
 *     description="Local API server"
 * )
 *  @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ApiResponder, AwsS3;

    // add extra function to access receiving requests

    public function getColumns($table)
    {
        $columns = Schema::getColumnListing($table);

        return $columns;
    }

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = [], array $includeFields = [])
    {
        $excludeColumns = array_diff($request->all(), $excludeFieldsForLogic);

        $allReadyColumns = array_merge($excludeColumns, $includeFields);

        $requestColumns = array_keys($allReadyColumns);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach ($fields as $field) {
            $model->{$field} = $allReadyColumns[$field];
        }

        return $model;
    }
}
