<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\SocialMedia;

class SocialMediaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function view(User $user,SocialMedia $social)
    { 
       
        return $user->hasPermission("SocialMedia",'view');
    }
    public function create(User $user)
    {
        return $user->hasPermission("SocialMedia",'insert');
    }
    public function update(User $user,SocialMedia $social)
    {
        return $user->hasPermission("SocialMedia",'update');
    }
    public function delete(User $user,SocialMedia $social)
    {
        return $user->hasPermission("SocialMedia",'delete');
    }
    public function restore(User $user,SocialMedia $social)
    {
        return $user->hasPermission("Social",'restore');
    }
    public function forceDelete(User $user,SocialMedia $social)
    {
        return $user->hasPermission("Social",'destroy');
    }
}
