<?php

namespace App\Http\Controllers\Api\User;

use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SuggestionCreateFormRequest;

class SuggestionController extends Controller
{
    
    public function index()
    {
        return $this->showAll(Suggestion::all());
    }

    public function store(SuggestionCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->suggestions->create($request->validated()));
    }
    
    public function show(Suggestion $suggestion)
    {
        return $this->showOne($suggestion);
    }
}
