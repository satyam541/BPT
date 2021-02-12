<?php

namespace App\Policies;

use App\User;
use App\Models\Topic;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Topic  $topic
     * @return mixed
     */
    public function view(User $user, Topic $topic)
    {
        return $user->hasPermission("Topic",'view');
    }

    /**
     * Determine whether the user can create topics.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermission("Topic",'insert');
    }

    /**
     * Determine whether the user can update the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Topic  $topic
     * @return mixed
     */
    public function update(User $user, Topic $topic)
    {
        return $user->hasPermission("Topic",'update');
    }

    /**
     * Determine whether the user can delete the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Topic  $topic
     * @return mixed
     */
    public function delete(User $user, Topic $topic)
    {
        return $user->hasPermission("Topic",'delete');
    }

    /**
     * Determine whether the user can restore the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Topic  $topic
     * @return mixed
     */
    public function restore(User $user, Topic $topic)
    {
        return $user->hasPermission("Topic",'restore');
    }

    /**
     * Determine whether the user can permanently delete the topic.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Topic  $topic
     * @return mixed
     */
    public function forceDelete(User $user, Topic $topic)
    {
        return $user->hasPermission("Topic",'destroy');
    }
}
