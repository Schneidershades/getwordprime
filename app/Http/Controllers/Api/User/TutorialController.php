<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorial;

class TutorialController extends Controller
{
    public function index()
    {
        return $this->showAll(Tutorial::all());
    }

    public function show(Tutorial $tutorials)
    {
        return $this->showOne($tutorials);
    }
}
