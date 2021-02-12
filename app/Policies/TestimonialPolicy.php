<?php

namespace App\Policies;

use App\User;
use App\Models\Testimonial;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestimonialPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the testimonial.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return mixed
     */
    public function view(User $user, Testimonial $testimonial)
    {
        return $user->hasPermission("Testimonial",'view');
    }

    /**
     * Determine whether the user can create testimonials.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Testimonial",'insert');
    }

    /**
     * Determine whether the user can update the testimonial.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return mixed
     */
    public function update(User $user, Testimonial $testimonial)
    {
        return $user->hasPermission("Testimonial",'update');
    }

    /**
     * Determine whether the user can delete the testimonial.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return mixed
     */
    public function delete(User $user, Testimonial $testimonial)
    {
        return $user->hasPermission("Testimonial",'delete');
    }

    /**
     * Determine whether the user can restore the testimonial.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return mixed
     */
    public function restore(User $user, Testimonial $testimonial)
    {
        return $user->hasPermission("Testimonial",'restore');
    }

    /**
     * Determine whether the user can permanently delete the testimonial.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Testimonial  $testimonial
     * @return mixed
     */
    public function forceDelete(User $user, Testimonial $testimonial)
    {
        return $user->hasPermission("Testimonial",'destroy');
    }
}
