<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;


class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('category index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  category  $category
     * @return bool
     */
    public function view(User $user,  $category): bool
    {
        if ($user->can('category show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        if ($user->can('category create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  category  $category
     * @return bool
     */
    public function update(User $user, Category $category): bool
    {
        if ($user->can('category update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  category  $category
     * @return bool
     */
    public function delete(User $user, Category $category): bool
    {
        if ($user->can('category delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User  $user
     * @param  category  $category
     * @return void
     */
    public function restore(User $user, Category $category): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User  $user
     * @param  category  $category
     * @return void
     */
    public function forceDelete(User $user, Category $category): void
    {
        //
    }
}
