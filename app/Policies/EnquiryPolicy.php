<?php

namespace App\Policies;

use App\User;
use App\Models\Enquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class EnquiryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the enquiry.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enquiry  $enquiry
     * @return mixed
     */
    public function view(User $user, Enquiry $enquiry)
    {
        return $user->hasPermission("Enquiry","view");
    }

    /**
     * Determine whether the user can create enquiries.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Enquiry","insert");
    }

    /**
     * Determine whether the user can update the enquiry.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enquiry  $enquiry
     * @return mixed
     */
    public function update(User $user, Enquiry $enquiry)
    {
        return $user->hasPermission("Enquiry","update");
    }

    /**
     * Determine whether the user can delete the enquiry.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enquiry  $enquiry
     * @return mixed
     */
    public function delete(User $user, Enquiry $enquiry)
    {
        return $user->hasPermission("Enquiry","delete");
    }

    /**
     * Determine whether the user can restore the enquiry.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enquiry  $enquiry
     * @return mixed
     */
    public function restore(User $user, Enquiry $enquiry)
    {
        return $user->hasPermission("Enquiry","restore");
    }

    /**
     * Determine whether the user can permanently delete the enquiry.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Enquiry  $enquiry
     * @return mixed
     */
    public function forceDelete(User $user, Enquiry $enquiry)
    {
        return $user->hasPermission("Enquiry","destroy");
    }
}
