<?php

namespace App\Policies;

use App\User;
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function view(User $user , Course $course)
    {
    
        return $user->hasPermission("Course",'view');
    }

    /**
     * Determine whether the user can create courses.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Course","insert");
    }

    /**
     * Determine whether the user can update the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function update(User $user, Course $course)
    {
        return $user->hasPermission("Course","update");
    }

    /**
     * Determine whether the user can delete the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function delete(User $user, Course $course)
    {
        return $user->hasPermission("Course","delete");
    }

    /**
     * Determine whether the user can restore the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function restore(User $user, Course $course)
    {
        return $user->hasPermission("Course","restore");
    }

    /**
     * Determine whether the user can permanently delete the course.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Course  $course
     * @return mixed
     */
    public function forceDelete(User $user, Course $course)
    {
        return $user->hasPermission("Course","destroy");
    }
}
