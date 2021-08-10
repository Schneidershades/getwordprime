<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;

class AgencyController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->agencies);
    }

    public function store(Request $request)
    {
        return $this->showOne(auth()->user()->agencies()->create($request->validated()));
    }

    public function show(Agency $agency)
    {
        return $this->showOne(Agency::findOrFail($id));
    }

    public function update(AgencyUpdateFormRequest $request, Agency $agency)
    {
        return $this->showOne($agency->update($request->validated()));
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();
        return $this->showMessage('deleted');
    }
}
