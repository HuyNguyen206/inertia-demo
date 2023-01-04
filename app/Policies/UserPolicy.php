<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function createUser(User $user)
    {
        return $user->email === 'nguyenlehuyuit@gmail.com';
    }

    public function editUser(User $user)
    {
        return $user->email === 'nguyenlehuyuit@gmail.com';
    }

    public function editThisUser(User $user, $model)
    {
        return $model->email === 'nguyenlehuyuit@gmail.com';
    }
}
