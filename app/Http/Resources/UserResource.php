<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->only(['id', 'name']) +
            [
                'permissions' => [
                    'editUser' => Auth::user()->can('editThisUser', $this)
                ],
                'email' => $this->when($this->email === 'nguyenlehuyuit@gmail.com', $this->email)
            ];
    }
}
