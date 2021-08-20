<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function index()
    {
        return $this->showAll(Suggestion::all());
    }

    public function store(SuggestionCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->suggesions()->create($request->validated()));
    }

    public function show(Suggestion $suggestion)
    {
        return $this->showOne($suggesion);
    }

    public function update(SuggestionUpdateFormRequest $request)
    {

    }
}
