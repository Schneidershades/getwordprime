<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\TransactionStoreFormRequest;
use App\Http\Requests\User\TransactionUpdateFormRequest;

class TransactionController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/transactions",
    *      operationId="allUserTransactions",
    *      tags={"user"},
    *      summary="Get all transactions",
    *      description="Get all transactions",
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
        return $this->showAll(auth()->user()->transactions);
    }

    /**
    * @OA\Post(
    *      path="/api/v1/transactions",
    *      operationId="postUserTransactions",
    *      tags={"user"},
    *      summary="Post new transactions",
    *      description="Post new transactions",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TransactionStoreFormRequest")
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
    public function store(TransactionStoreFormRequest $request)
    {
        return $this->showOne(Transaction::create($request->validated()));
    }

    /**
    * @OA\Get(
    *      path="/api/v1/transactions/{id}",
    *      operationId="showUserTransaction",
    *      tags={"user"},
    *      summary="Show an transaction",
    *      description="Show an transaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction ID",
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
    public function show($id)
    {
        return $this->showOne(Transaction::find($id));
    }

    /**
    * @OA\Put(
    *      path="/api/v1/transactions/{id}",
    *      operationId="TransactionUpdate",
    *      tags={"user"},
    *      summary="Update an transaction",
    *      description="Update an transaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="transaction ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/TransactionUpdateFormRequest")
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
    
    public function update(TransactionUpdateFormRequest $request, $id)
    {
        Transaction::find($id)->update($request->validated());
        return $this->showOne(Transaction::find($id));
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/transactions/{id}",
    *      operationId="deleteTransaction",
    *      tags={"user"},
    *      summary="Delete an transaction",
    *      description="Delete an transaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction ID",
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
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return $this->showMessage('deleted');
    }
}
