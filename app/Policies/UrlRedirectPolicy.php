<?php

namespace App\Policies;

use App\Models\UrlRedirect;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UrlRedirectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any url redirects.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */


    /**
     * Determine whether the user can view the url redirect.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UrlRedirect  $urlRedirect
     * @return mixed
     */
    public function view(User $user, UrlRedirect $urlRedirect)
    {
        return $user->hasPermission("Redirect","view");
    }

    /**
     * Determine whether the user can create url redirects.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Redirect","insert");
    }

    /**
     * Determine whether the user can update the url redirect.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UrlRedirect  $urlRedirect
     * @return mixed
     */
    public function update(User $user, UrlRedirect $urlRedirect)
    {
        return $user->hasPermission("Redirect","update");
    }

    /**
     * Determine whether the user can delete the url redirect.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UrlRedirect  $urlRedirect
     * @return mixed
     */
    public function delete(User $user, UrlRedirect $urlRedirect)
    {
        return $user->hasPermission("Redirect","delete");
    }

    /**
     * Determine whether the user can restore the url redirect.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UrlRedirect  $urlRedirect
     * @return mixed
     */
    public function restore(User $user, UrlRedirect $urlRedirect)
    {
        return $user->hasPermission("Redirect","restore");
    }

    /**
     * Determine whether the user can permanently delete the url redirect.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UrlRedirect  $urlRedirect
     * @return mixed
     */
    public function forceDelete(User $user, UrlRedirect $urlRedirect)
    {
        return $user->hasPermission("Redirect","destroy");
    }
}
