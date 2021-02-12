<?php

namespace App\Policies;

use App\User;
use App\Models\WebsiteDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsiteDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the website detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebsiteDetail  $WebsiteDetail
     * @return mixed
     */
    public function view(User $user, WebsiteDetail $WebsiteDetail)
    {
        return $user->hasPermission("WebsiteDetail","view");
    }

    /**
     * Determine whether the user can create website details.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("WebsiteDetail","insert");
    }

    /**
     * Determine whether the user can update the website detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebsiteDetail  $WebsiteDetail
     * @return mixed
     */
    public function update(User $user, WebsiteDetail $WebsiteDetail)
    {
        return $user->hasPermission("WebsiteDetail","update");
    }

    /**
     * Determine whether the user can delete the website detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebsiteDetail  $WebsiteDetail
     * @return mixed
     */
    public function delete(User $user, WebsiteDetail $websitedetail)
    {
        return $user->hasPermission("WebsiteDetail","delete");
    }

    /**
     * Determine whether the user can restore the website detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebsiteDetail  $WebsiteDetail
     * @return mixed
     */
    public function restore(User $user, WebsiteDetail $WebsiteDetail)
    {
        return $user->hasPermission("WebsiteDetail","restore");
    }

    /**
     * Determine whether the user can permanently delete the website detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\WebsiteDetail  $WebsiteDetail
     * @return mixed
     */
    public function forceDelete(User $user, WebsiteDetail $WebsiteDetail)
    {
        return $user->hasPermission("WebsiteDetail","destroy");
    }
}
