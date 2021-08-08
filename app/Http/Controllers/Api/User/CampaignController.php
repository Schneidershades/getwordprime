<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->campaigns);
    }

    public function store(Request $request)
    {
        return $this->showOne(auth()->user()->campaigns()->create($request->all()));
    }

    public function show($id)
    {
        return $this->showOne(auth()->user()->campaigns()->where('id', $id)->first());
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        Campaign::find($id)->delete();
        return $this->showMessage('model deleted');
    }
}
