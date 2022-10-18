<?php

namespace Tests\Feature\Api\User;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login()
    {
        $this->post('api/v1/user/login', [
            'name' => 'John Doe',
            'password' => 'password',
            'email' => 'john.doe@example.org',
            'role' => 'admin',
        ])->assertStatus(201);
    }
}
