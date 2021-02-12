<?php

namespace App\Policies;

use App\User;
use App\Models\PageDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageDetailPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the page detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PageDetail  $pageDetail
     * @return mixed
     */
    public function view(User $user, PageDetail $pageDetail)
    {
        return $user->hasPermission("PageDetail","view");
    }

    /**
     * Determine whether the user can create page details.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("PageDetail","insert");
    }

    /**
     * Determine whether the user can update the page detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PageDetail  $pageDetail
     * @return mixed
     */
    public function update(User $user, PageDetail $pageDetail)
    {
        return $user->hasPermission("PageDetail","update");
    }

    /**
     * Determine whether the user can delete the page detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PageDetail  $pageDetail
     * @return mixed
     */
    public function delete(User $user, PageDetail $pageDetail)
    {
        return $user->hasPermission("PageDetail","delete");
    }

    /**
     * Determine whether the user can restore the page detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PageDetail  $pageDetail
     * @return mixed
     */
    public function restore(User $user, PageDetail $pageDetail)
    {
        return $user->hasPermission("PageDetail","restore");
    }

    /**
     * Determine whether the user can permanently delete the page detail.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PageDetail  $pageDetail
     * @return mixed
     */
    public function forceDelete(User $user, PageDetail $pageDetail)
    {
        return $user->hasPermission("PageDetail","destroy");
    }
}
