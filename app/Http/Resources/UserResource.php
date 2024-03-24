<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'code' => 200,
            'message' => 'User Logged In Successfully',
            'data' => [
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
            ]
        ];
    }
}
