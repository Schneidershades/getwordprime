<?php

namespace Tests\Feature\Api\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AgencyTest extends TestCase
{
    public function test_show_all_agencies()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
