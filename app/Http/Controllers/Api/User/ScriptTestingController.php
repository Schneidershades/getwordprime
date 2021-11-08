<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Plugins\OpenAi\OpenAi;

class ScriptTestingController extends Controller
{
    public function store(Request $request)
    {
        $openai =  new OpenAi();
        // $openai->getEngines();
        dd($openai->request("davinci-instruct-beta", "This is a test", 60));
        // dd($openai->request("ada", "This is a test", 60));
    }
}
