<?php

namespace App\Traits\Plugins;

class FreelancerApi
{
    public function mode($mode)
    {
        if($mode == 'live'){
            return [
                'url' => "https://www.freelancer.com/api/",
                'key' => "jUobyaWEUIU5mmN8i3HrTzvGgeC1lo"
            ];
        }

        if($mode == 'test'){
            return [
                'url' => "https://www.freelancer-sandbox.com/api/",
                'key' => "AgDVfyU3jibCKs21fcSlY3r8RaJ4Ad"
            ];
        }
    }

    public function projects($keyword)
    { 
        $mode =  $this->mode('live');
        $body = [
            'filter'=> [
            'only_active'=>true,
            'jobs'=>[17,335],
            'languages'=>['en'],
            'search_query'=> $keyword,
            'project_statuses'=>['active'],
            'limit'=>10,
            'offset'=>0,
            // 'from_time'=>$time
            ]     
        ];
        $response = $this->sendRequest($mode['url']."projects/0.1/jobs/all/?job_names%5B%5D=Writing%20%Content?compact=1&user_details=1&full_description=1&hireme_details&number=10", 'GET', json_encode($body), $mode['key']);
        return ($response);
    }

    public function search()
    { 
        $mode =  $this->mode('live');
        $response = $this->sendRequest($mode['url']."projects/0.1/jobs/search/", 'GET', [], $mode['key']);
        return ($response);
    }

    public function contentWritingJobs()
    { 
        $body = [
            'filter'=> [
            'only_active'=>true,
            'jobs'=> [17,335],
            'languages'=>['en'],
            'search_query'=> 'content writing',
            'project_statuses'=> ['active'],
            'limit'=>10,
            'offset'=>0,
            // 'from_time'=>$time
            ]     
        ];
        $mode =  $this->mode('live');
        $response = $this->sendRequest($mode['url']."projects/0.1/jobs/search/?job_names%5B%5D=copywriting?compact=1&user_details=1&full_description=1&hireme_details", 'GET', json_encode($body), $mode['key']);
        return ($response);
    }

    public function getProjectId($id)
    { 
        $mode =  $this->mode('live');
        $response = $this->sendRequest($mode['url']."/projects/0.1/projects/".$id, 'GET', [], $mode['key']);
        return ($response);
    }

    private function sendRequest($url, $requestType, $postfields=[], $access)
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
                'Authorization: Bearer ' . $access
            ],
        ]);

        $response = curl_exec($curl);
        return json_decode($response);
    }

    
}