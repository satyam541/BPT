<?php

namespace App\Policies;

use App\User;
use App\Models\Accreditation;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccreditationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the accreditation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accreditation  $accreditation
     * @return mixed
     */
    public function view(User $user, Accreditation $accreditation)
    {
      
        return $user->hasPermission("Accreditation",'view');
    }

    /**
     * Determine whether the user can create accreditations.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Accreditation",'insert');
    }

    /**
     * Determine whether the user can update the accreditation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accreditation  $accreditation
     * @return mixed
     */
    public function update(User $user, Accreditation $accreditation)
    {
        return $user->hasPermission("Accreditation",'update');
    }

    /**
     * Determine whether the user can delete the accreditation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accreditation  $accreditation
     * @return mixed
     */
    public function delete(User $user, Accreditation $accreditation)
    {
        return $user->hasPermission("Accreditation",'delete');
    }

    /**
     * Determine whether the user can restore the accreditation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accreditation  $accreditation
     * @return mixed
     */
    public function restore(User $user, Accreditation $accreditation)
    {
        return $user->hasPermission("Accreditation",'restore');
    }

    /**
     * Determine whether the user can permanently delete the accreditation.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Accreditation  $accreditation
     * @return mixed
     */
    public function forceDelete(User $user, Accreditation $accreditation)
    {
        return $user->hasPermission("Accreditation",'destroy');
    }
}
