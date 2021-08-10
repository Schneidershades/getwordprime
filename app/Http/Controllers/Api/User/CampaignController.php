<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $this->showAll(auth()->user()->campaigns);
    }

    public function store(CampaignCreateFormRequest $request)
    {
        return $this->showOne(auth()->user()->campaigns()->create($request->all()));
    }

    public function show(Campaign $campaign)
    {
        return $this->showOne($campaign);
    }

    public function update(CampaignUpdateFormRequest $request, Campaign $campaign)
    {
        return $this->showOne($campaign->update($request->validated()));
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();
        return $this->showMessage('deleted');
    }
}
