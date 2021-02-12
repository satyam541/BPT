<?php

namespace App\Policies;

use App\User;
use App\Models\Country;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the country.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function view(User $user, Country $country)
    {
        //
        return $user->hasPermission("Country","view");
    }

    /**
     * Determine whether the user can create countries.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Country","insert");
    }

    /**
     * Determine whether the user can update the country.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function update(User $user, Country $country)
    {
        return $user->hasPermission("Country","update");
    }

    /**
     * Determine whether the user can delete the country.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function delete(User $user, Country $country)
    {
        return $user->hasPermission("Country","delete");
    }

    /**
     * Determine whether the user can restore the country.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function restore(User $user, Country $country)
    {
        return $user->hasPermission("Country","restore");
    }

    /**
     * Determine whether the user can permanently delete the country.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Country  $country
     * @return mixed
     */
    public function forceDelete(User $user, Country $country)
    {
        return $user->hasPermission("Country","destroy");
    }
}
