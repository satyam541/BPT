<?php

namespace App\Policies;

use App\User;
use App\Models\Article;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        // if($article->type == "blog"){
            return $user->hasPermission("blog",'view');
        // }
        // if($article->type == "news"){
            return $user->hasPermission("news",'view');
        // }
        // return false;
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user, Article $article)
    {
        // if($article->type == "blog"){
            return $user->hasPermission("blog",'insert');
        // }
        // if($article->type == "news"){
    //         return $user->hasPermission('news','insert');
    //     }
    //     return false;
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {
        if($article->type == "blog"){
            return $user->hasPermission("blog",'update');
        }
        if ($article->type == "news"){
            return $user->hasPermission('news','update');
        }
        return false;
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        
        if($article->type == "blog"){
            return $user->hasPermission("blog",'delete');
        }
        if ($article->type == "news"){
            return $user->hasPermission('news','delete');
        }
        return false;
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        if($article->type == "blog"){
            return $user->hasPermission("blog",'restore');
        }
        if ($article->type == "news"){
            return $user->hasPermission('news','restore');
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        
        if($article->type == "blog"){
            return $user->hasPermission("blog",'destroy');
        }
        if ($article->type == "news"){
            return $user->hasPermission('news','destroy');
        }
        return false;
    }
}
