<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdatePermissionRequest;

class PermissionsController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/permissions",
    *      operationId="allPermissions",
    *      tags={"Admin"},
    *      summary="Get all permissions",
    *      description="Get all permissions",
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function index()
    {
        return $this->showAll(Permission::all());
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/role/{id}",
    *      operationId="PlanPermission",
    *      tags={"Admin"},
    *      summary="Update a Permission",
    *      description="Update a Permission",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Permission ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UpdatePermissionRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful signin",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function update(Role $role, UpdatePermissionRequest $request)
    {
        if($request['status'] == false){
            $role->revokePermissionTo($request['permission']);
        }
        if($request['status'] == true){
            $role->givePermissionTo($request['permission']);
        }
    }

}
