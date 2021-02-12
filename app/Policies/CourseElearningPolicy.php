<?php

namespace App\Policies;

use App\User;
use App\Models\CourseElearning;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourseElearningPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any course elearnings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
   

    /**
     * Determine whether the user can view the course elearning.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\courseElearning  $courseElearning
     * @return mixed
     */
    public function view(User $user, CourseElearning $courseElearning)
    {
        return $user->hasPermission("OnlineCourse",'view');
    }

    /**
     * Determine whether the user can create course elearnings.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("OnlineCourse","insert");
    }

    /**
     * Determine whether the user can update the course elearning.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\courseElearning  $courseElearning
     * @return mixed
     */
    public function update(User $user, CourseElearning $courseElearning)
    {
        return $user->hasPermission("OnlineCourse","update");
    }

    /**
     * Determine whether the user can delete the course elearning.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\courseElearning  $courseElearning
     * @return mixed
     */
    public function delete(User $user, CourseElearning $courseElearning)
    {
        return $user->hasPermission("OnlineCourse","delete");
    }

    /**
     * Determine whether the user can restore the course elearning.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CourseElearning  $courseElearning
     * @return mixed
     */
    public function restore(User $user, CourseElearning $courseElearning)
    {
        return $user->hasPermission("OnlineCourse","restore");
    }

    /**
     * Determine whether the user can permanently delete the course elearning.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\courseElearning  $courseElearning
     * @return mixed
     */
    public function forceDelete(User $user, CourseElearning $courseElearning)
    {
        return $user->hasPermission("OnlineCourse","destroy");
    }
}
