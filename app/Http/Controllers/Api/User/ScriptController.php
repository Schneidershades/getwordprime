<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Script;

class ScriptController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->scripts);
    }

    public function store(ScriptCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->scripts()->create($request->validated()));
    }

    public function show(Script $script)
    {
        return $this->showOne($script);
    }

    public function update(ScriptUpdateFormRequest $request, Script $script)
    {
        return $this->showOne($script->update($request->validated()));
    }

    public function destroy(Script $script)
    {
        $script->delete();
        return $this->showMessage('deleted');
    }
}
