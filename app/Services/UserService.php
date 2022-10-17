<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;

class UserService
{
    public function createOrFindUserIfExist($data, $mode = null, $referral = false)
    {
        $generatedPassword = $this->hashing();

        return $this->find($data['email']) ? $this->find($data['email']) :
            User::create(
                array_merge(
                    Arr::only($data, ['first_name', 'last_name', 'email', 'phone']),
                    [
                        'role' => 'User',
                        'password' => $mode ? bcrypt($generatedPassword) : null,
                        'user_access_code' => $mode ? $generatedPassword : null,
                        'user_access_code_counter' => 1,
                        'registration_mode' => $mode,
                        'system_verification' => true,
                        'referral_id' => $referral ? auth('api')->user()->id : null,
                    ]
                )
            );
    }

    public function findUserRegistrationOutsideAuth($data, $mode = null)
    {
        return
            optional($this->find($data['email']))->registration_mode == $mode && optional($this->find($data['email']))->user_access_code != null
                ? $this->updateOutsideAuth($data, $mode)
                : $this->createOrFindUserIfExist($data, $mode, false);
    }

    public function updateOutsideAuth($data, $mode = null)
    {
        $generatedPassword = $this->hashing();

        return
            $this->find($data['email'])->update([
                'email' => $data['email'],
                'password' => $mode ? bcrypt($generatedPassword) : null,
                'user_access_code' => $mode ? $generatedPassword : null,
                'user_access_code_counter' => $this->find($data['email'])->user_access_code_counter + 1,
            ]) ? $this->find($data['email']) : null;
    }

    public function updateOrCreateIfExist($data, $mode = null, $referral = false)
    {
        $generatedPassword = $this->hashing();

        $user = $this->find($data['email']) ? ($this->update($data) ? $this->find($data['email']) : null)
            : User::create(
                array_merge(
                    Arr::only($data, ['first_name', 'last_name', 'email', 'phone']),
                    [
                        'role' => 'User',
                        'password' => $mode ? bcrypt($generatedPassword) : null,
                        'user_access_code' => $mode ? $generatedPassword : null,
                        'user_access_code_counter' => 1,
                        'registration_mode' => $mode,
                        'system_verification' => true,
                        'referral_id' => $referral ? auth('api')->user()->id : null,
                    ]
                )
            );
        return $user;
    }

    public function find($email)
    {
        return User::where('email', $email)->first();
    }

    public function update($data)
    {
        return $this->find($data['email'])
                ? $this->find($data['email'])->update(Arr::only($data, ['first_name', 'last_name', 'email', 'phone'])) : null;
    }

    public function userPropertyById($id)
    {
        return User::with(
            'teams',
            'prints',
            'company',
            'teams.subscription',
            'teams.subscription.plan',
            'teams.subscription.plan.features',
        )->find($id);
    }

    public function userPropertyTeams($id)
    {
        return User::with(
            'teams.users',
            'company',
            'teams.subscription',
            'teams.subscription.plan',
            'teams.subscription.plan.features',
        )->find($id)->teams;
    }

    public function userTeamUsers()
    {
        return User::with(
            'teams.users',
            'teams.deletedUsers',
            'teams.subscription',
            'teams.subscription.plan',
            'teams.subscription.plan.features',
        )->find(auth('api')->user()->id)->teams;
    }

    public function hashing()
    {
        $permitted_chars = '0123456789';

        return substr(str_shuffle($permitted_chars), 0, 6);
    }
}