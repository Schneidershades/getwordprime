<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\TransactionStoreFormRequest;
use App\Http\Requests\User\TransactionUpdateFormRequest;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return $this->showAll(auth()->user()->transactions);
    }

    public function store(TransactionStoreFormRequest $request)
    {
        return $this->showOne(Transaction::create($request->validated()));
    }

    public function show($id)
    {
        return $this->showOne(Transaction::find($id));
    }

    public function update(TransactionUpdateFormRequest $request, $id)
    {
        Transaction::find($id)->update($request->validated());

        return $this->showOne(Transaction::find($id));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return $this->showMessage('deleted');
    }
}
