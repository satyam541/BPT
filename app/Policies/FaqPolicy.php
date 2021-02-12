<?php

namespace App\Policies;

use App\User;
use App\Models\Faq;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the faq.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $faq
     * @return mixed
     */
    public function view(User $user, Faq $faq)
    {
        return $user->hasPermission("Faq","view");
    }

    /**
     * Determine whether the user can create faqs.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Faq","insert");
    }

    /**
     * Determine whether the user can update the faq.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $faq
     * @return mixed
     */
    public function update(User $user, Faq $faq)
    {
        return $user->hasPermission("Faq","update");
    }

    /**
     * Determine whether the user can delete the faq.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $faq
     * @return mixed
     */
    public function delete(User $user, Faq $faq)
    {
        return $user->hasPermission("Faq","delete");
    }

    /**
     * Determine whether the user can restore the faq.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $faq
     * @return mixed
     */
    public function restore(User $user, Faq $faq)
    {
        return $user->hasPermission("Faq","restore");
    }

    /**
     * Determine whether the user can permanently delete the faq.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Faq  $faq
     * @return mixed
     */
    public function forceDelete(User $user, Faq $faq)
    {
        return $user->hasPermission("Faq","destroy");
    }
}
