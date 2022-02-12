<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\Admin\UpdateTransactionFormRequest;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/admin/transactions",
    *      operationId="allTransactions",
    *      tags={"Admin"},
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
        $search_query = request()->get('search') ? request()->get('search') : null;
        
        $transactions =  Transaction::query()
                ->selectRaw('transactions.*')
                ->when($search_query, function (Builder $builder, $search_query) {
                    $builder->where('transactions.transaction_id', 'LIKE', "%{$search_query}%")
                    ->orWhere('transactions.description', 'LIKE', "%{$search_query}%")
                    ->orWhere('transactions.link', "%{$search_query}%");
                })->latest()->get();

        return $this->showAll($transactions);
    }

    /**
    * @OA\Get(
    *      path="/api/v1/admin/transactions/{id}",
    *      operationId="showTransaction",
    *      tags={"Admin"},
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
    *      path="/api/v1/admin/transactions/{id}",
    *      operationId="transactionsUpdate",
    *      tags={"Admin"},
    *      summary="Update an transactionsUpdate",
    *      description="Update an transactionsUpdate",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="transactionsUpdate ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/UpdateTransactionFormRequest")
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
    
    public function update(UpdateTransactionFormRequest $request, $id)
    {
        Transaction::find($id)->update($request->validated());
        return $this->showOne(Transaction::find($id));
    }

}
