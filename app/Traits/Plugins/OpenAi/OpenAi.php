<?php

namespace App\Traits\Plugins\OpenAi;

class OpenAi
{
    private function secret_key(){
        return $secret_key = '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';
    }

    public function getEngines()
    {
        $response = $this->sendRequest("https://api.openai.com/v1/engines", 'GET', []);
        dd($response);
    }

    // [
    //     "engine" => "davinci-instruct-beta", 
    //     "prompt" => "Write a creative ad for the following product to run on Facebook:
    // """"""
    // Airee is a line of skin-care products for young women with delicate skin. The ingredients are all-natural.
    // """"""
    // This is the ad I wrote for Facebook aimed at teenage girls:
    // """"""", 
    //     "temperature" => 0.5, 
    //     "max_tokens" => 60, 
    //     "top_p" => 1, 
    //     "frequency_penalty" => 0, 
    //     "presence_penalty" => 0, 
    //     "stop" => [
    //         """""""" 
    //     ] 
    // ]; 
    


    public function ad($prompt, $scriptType)
    { 
        return $scriptType;
        
        return $request_body = [
            "prompt" => $prompt,
            "temperature" => (float) $scriptType->temperature, 
            "max_tokens" =>  (int) $scriptType->max_token, 
            "top_p" => (int) $scriptType->top_p, 
            "frequency_penalty" => (int) $scriptType->frequency_penalty, 
            "presence_penalty" => (int) $scriptType->presence_penalty, 
            "stop" => ["\"\"\"\"\"\""] 
        ];

        return $request_body = [
            "prompt" => $prompt,
            "temperature" => 0.5, 
            "max_tokens" => 150, 
            "top_p" => 1, 
            "frequency_penalty" => 0, 
            "presence_penalty" => 0, 
            "stop" => ["\"\"\"\"\"\""] 
        ];

        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $scriptType->engine . "/completions", 'POST', json_encode($request_body));
        return($response);
    }


    public function ads($engine, $prompt, $max_tokens)
    { 
        $request_body = [
            "engine" => "davinci-instruct-beta", 
            "prompt" => $prompt,
            "max_tokens" => $max_tokens,
            "temperature" => 0.7,
            "top_p" => 1.0,
            "presence_penalty" => 0.75,
            "frequency_penalty"=> 0.75,
            "best_of"=> 1,
            "stream" => false,
        ];

        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $engine . "/completions", 'POST', json_encode($request_body));
        dd($response);
    }

    public function request($engine, $prompt, $max_tokens)
    { 
        $request_body = [
            "prompt" => $prompt,
            "max_tokens" => $max_tokens,
            "temperature" => 0.7,
            "top_p" => 1.0,
            "presence_penalty" => 0.75,
            "frequency_penalty"=> 0.75,
            "best_of"=> 1,
            "stream" => false,
        ];

        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $engine . "/completions", 'POST', json_encode($request_body));
        dd($response);
    }

    public function search($engine, $documents, $query){ 

        $request_body = [
            "max_tokens" => 10,
            "temperature" => 0.7,
            "top_p" => 1,
            "presence_penalty" => 0.75,
            "frequency_penalty"=> 0.75,
            "documents" => $documents,
            "query" => $query
        ];


        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $engine . "/search", 'POST', json_encode($request_body));
        dd($response);
    }

    private function sendRequest($url, $requestType, $postfields=[])
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $requestType,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->secret_key()
            ],
        ]);

        $response = curl_exec($curl);
        return json_decode($response);
    }

    public function queryRequest($model, $prompt, $engine)
    { 

        $request_body = [
            "prompt" => $prompt,
            "max_tokens" => $model->max_tokens,
            "temperature" => $model->temperature,
            "top_p" => $model->top_p,
            "presence_penalty" => $model->presence_penalty,
            "frequency_penalty"=> $model->frequency_penalty,
            "best_of"=> $model->best_of,
            "stream" => $model->stream,
        ];

        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $engine . "/completions", 'POST', json_encode($request_body));
        
        dd($response);
    }

    public function searchRequest($model, $prompt, $engine)
    { 
        $request_body = [
            "prompt" => $prompt,
            "max_tokens" => $model->max_tokens,
            "temperature" => $model->temperature,
            "top_p" => $model->top_p,
            "presence_penalty" => $model->presence_penalty,
            "frequency_penalty"=> $model->frequency_penalty,
            "documents" => $model->documents,
            "query" => $model->query
        ];

        $response = $this->sendRequest("https://api.openai.com/v1/engines/" . $engine . "/search", 'POST', json_encode($request_body));

        dd($response);
    }

    // public function item()
    // {
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/engines/davinci-instruct-beta/completions');
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"prompt\": \"Write a creative ad for the following product to run on Facebook:n\"\"\"\"\"\"nAiree is a line of skin-care products for young women with delicate skin. The ingredients are all-natural.n\"\"\"\"\"\"nThis is the ad I wrote for Facebook aimed at teenage girls:n\"\"\"\"\"\"\",\n  \"temperature\": 0.5,\n  \"max_tokens\": 60,\n  \"top_p\": 1.0,\n  \"frequency_penalty\": 0.0,\n  \"presence_penalty\": 0.0,\n  \"stop\": [\"\"\"\"\"\"\"\"]\n}");

    //     $headers = array();
    //     $headers[] = 'Content-Type: application/json';
    //     $headers[] = 'Authorization: _ENV["Bearer OPENAI_API_KEY"];
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //     $result = curl_exec($ch);
    //     if (curl_errno($ch)) {
    //         echo 'Error:' . curl_error($ch);
    //     }
    //     curl_close($ch);
    // }
}