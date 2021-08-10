<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ScriptFavorite;

class ScriptFavoriteController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->scripts);
    }

    public function store(ScriptCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->scripts()->create($request->validated()));
    }

    public function destroy($id)
    {
        $script =  Script::findOrFail($id);
        $script->delete();
        return $this->showMessage('deleted');
    }
}
