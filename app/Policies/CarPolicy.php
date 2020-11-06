<?php

namespace App\Policies;

use App\Models\Car;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Car $car)
    {
        return $car->user_id == $user->id;
    }

    public function delete(User $user, Car $car)
    {
        return $car->user_id == $user->id;
    }


}
