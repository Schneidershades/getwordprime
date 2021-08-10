<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ResellerController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->resellers);
    }

    public function store(ResellerCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->resellers()->create($request->all()));
    }

    public function show(User $user)
    {
        return $this->showOne($user);
    }

    public function update(ResellerUpdateFormRequest $request, User $user)
    {
        return $this->showOne($user->update($request->validated()));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->showMessage('deleted');
    }
}
