<?php

namespace App\Traits\Plugins;

class FreelancerApi
{
    private function access_token()
    {
        return 'AgDVfyU3jibCKs21fcSlY3r8RaJ4Ad';
    }

    public function projects()
    { 
        $response = $this->sendRequest("https://www.freelancer-sandbox.com/api/projects/0.1/projects/all", 'GET', []);
        return ($response);
    }

    public function search()
    { 
        $response = $this->sendRequest("https://www.freelancer-sandbox.com/api/projects/0.1/jobs/search/", 'GET', []);
        return ($response);
    }

    public function contentWritingJobs()
    { 
        $response = $this->sendRequest("https://www.freelancer.com/api/projects/0.1/jobs/search/?job_names%5B%5D=Writing&Content", 'GET', []);
        return ($response);
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
                'Authorization: Bearer ' . $this->access_token()
            ],
        ]);

        $response = curl_exec($curl);
        return json_decode($response);
    }
}