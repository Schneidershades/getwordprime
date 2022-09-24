<?php

namespace App\Http\Controllers\Api\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transaction\StoreTransactionFormRequest;
use App\Http\Requests\Transaction\UpdateTransactionFormRequest;
use App\Models\Plan;
use App\Models\Transaction;
use App\Services\PlanSubscriptionService;
use App\Services\ScheduleSessionService;
use App\Traits\Payments\Flutterwave;
use App\Traits\Payments\Paystack;

class TransactionController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/transactions",
     *      operationId="transactions",
     *      tags={"Transaction"},
     *      summary="transactions",
     *      description="transactions",
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
        $transaction = Transaction::query()->where('user_id', auth('api')->user()->id)
                            ->orWhere('actor_id', auth('api')->user()->id)
                            ->orWhere('actor_type', 'User')
                            ->get();

        return $this->showAll($transaction);
    }

    /**
     * @OA\Post(
     *      path="/api/v1/transactions",
     *      operationId="postTransactions",
     *      tags={"Transaction"},
     *      summary="postTransactions",
     *      description="postTransactions",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreTransactionFormRequest")
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
    public function store(StoreTransactionFormRequest $request)
    {
        $paymentAction = match ($request['transactionable_type']) {
            'Plan' => Plan::where('id', $request['transactionable_id'])->first(),
        };

        $actor_type = $request['actor_type'] == 'User' ? $request['actor_type']
                : ($request['actor_type'] == 'Team' ? $request['actor_type'] : null);

        $actor_id = $request['actor_type'] == 'User' ? auth('api')->user()->id
                : ($request['actor_type'] == 'Team' ? auth('api')->user()->activeTeam->team->id : null);

        $transaction = $paymentAction->transactions()->create([
            'title' => "Payment Subscription for $paymentAction->name Plan",
            'actor_id' => $actor_id,
            'actor_type' => $actor_type,
            'user_id' => auth('api')->user()->id,
            'subtotal' => $paymentAction->amount,
            'total' => $paymentAction->amount,
            'platform_initiated' => $request['platform_initiated'],
        ]);

        return $this->showOne($transaction);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/transactions/{id}",
     *      operationId="showTransactions",
     *      tags={"Transaction"},
     *      summary="showTransactions",
     *      description="showTransactions",
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
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
    public function show($id)
    {
        return $this->showOne(auth()->user()->transactions->where('id', $id)->first());
    }

    /**
     * @OA\Put(
     *      path="/api/v1/transactions/{id}",
     *      operationId="updateTransactions",
     *      tags={"Transaction"},
     *      summary="updateTransactions",
     *      description="updateTransactions",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateTransactionFormRequest")
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          description="Transaction ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
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
    public function update(UpdateTransactionFormRequest $request, $id)
    {
        $transaction = Transaction::where('id', $id)->first();

        if ($transaction == null) {
            return $this->errorResponse('Transaction reference not found', 409);
        }

        if ($transaction->status == 'Paid') {
            return $this->errorResponse('This transaction has already been initiated', 409);
        }

        $data = $this->accessPaymentGateway($request['payment_gateway'], $id);

        if ($data['success'] == false) {
            return $this->errorResponse($data['payment_gateway_message'], 400);
        }

        if ($data['success'] == null) {
            return $this->errorResponse('An error occurred. please contact support', 403);
        }

        $transaction->update($data);

        $this->processAfterSuccess($transaction);

        return $this->showMessage('Transaction processed successfully');
    }

    public function accessPaymentGateway($gateway, $id)
    {
        return match ($gateway) {
            'Paystack' => (new Paystack())->verify($id),
            'Flutterwave' => (new Flutterwave())->verify($id),
            default => null
        };
    }

    public function processAfterSuccess($transaction)
    {
        return match ($transaction['transactionable_type']) {
            'Plan' => (new PlanSubscriptionService())
                        ->setTransactionModel($transaction)
                        ->processSubscriptionPlan(),

            'ScheduleSession' => (new ScheduleSessionService())
                                    ->setTransactionModel($transaction)
                                    ->processScheduleSession(),

            default => null
        };
    }
}
