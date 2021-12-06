<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'role' => $this->role,
            'permissions' => $this->plans->pluck('name')->toArray(),
            'verified' => $this->email_verified_at ? true : false,
            'permissions' => $this->getPermissionsViaRoles()->pluck('id')->toArray(),
            'active' => $this->active ? true : false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
