<?php

namespace App\Policies;

use App\User;
use App\Models\Schedule;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchedulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function view(User $user, Schedule $schedule)
    {
        return $user->hasPermission("Schedule","view");
    }

    /**
     * Determine whether the user can create schedules.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Schedule","insert");
    }

    /**
     * Determine whether the user can update the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function update(User $user, Schedule $schedule)
    {
        return $user->hasPermission("Schedule","update");
    }

    /**
     * Determine whether the user can delete the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function delete(User $user, Schedule $schedule)
    {
        return $user->hasPermission("Schedule","delete");
    }

    /**
     * Determine whether the user can restore the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function restore(User $user, Schedule $schedule)
    {
        return $user->hasPermission("Schedule","restore");
    }

    /**
     * Determine whether the user can permanently delete the schedule.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Schedule  $schedule
     * @return mixed
     */
    public function forceDelete(User $user, Schedule $schedule)
    {
        return $user->hasPermission("Schedule","destroy");
    }
}
