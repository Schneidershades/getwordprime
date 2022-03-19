<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\User;
use App\Events\User\NewUserEvent;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Admin\UserCreateFormRequest;
use App\Http\Requests\Admin\UserUpdateFormRequest;

class UserController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/users",
    *      operationId="allUsers",
    *      tags={"Admin"},
    *      summary="Get all users",
    *      description="Get all users",
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

        $search_query = request()->get('search') ? request()->get('search') : null;

        $users =  User::query()
                ->selectRaw('users.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('users.first_name', 'LIKE', "%{$search_query}%")
                    ->orWhere('users.last_name', 'LIKE', "%{$search_query}%")
                    ->orWhere('users.role', "%{$search_query}%")
                    ->orWhere('users.email', 'LIKE', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($users);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/admin/users",
    *      operationId="postUser",
    *      tags={"Admin"},
    *      summary="Post users",
    *      description="Post users",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserCreateFormRequest")
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
    public function store(UserCreateFormRequest $request)
    {
        $user = User::create($request->validated());

        $user->plans()->sync($request['plans']);

        event(new NewUserEvent($user, $request['password']));

        return $this->showOne($user);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/users/{id}",
    *      operationId="showUser",
    *      tags={"Admin"},
    *      summary="Show user",
    *      description="Show user",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="User ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      
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
    public function show(User $user)
    {
        return $this->showOne(User::findOrFail($user->id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/admin/users/{id}",
    *      operationId="UserUpdate",
    *      tags={"Admin"},
    *      summary="Update user",
    *      description="Update user",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="user ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UserUpdateFormRequest")
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
    
    public function update(UserUpdateFormRequest $request, User $user)
    {
        $user->update($request->validated());

        $user->plans()->sync($request['plans']);

        return $this->showOne($user);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/admin/users/{id}",
    *      operationId="deleteUser",
    *      tags={"Admin"},
    *      summary="Delete user",
    *      description="Delete user",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="User ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
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
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showMessage('deleted');
    }
}
