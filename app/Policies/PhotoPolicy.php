<?php

namespace App\Policies;

use App\User;
use App\Photo;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {
      return $user->can('view-photo');
    }

    public function create(User $user)
    {
      return $user->can('create-photo');
    }

    public function manage(User $user)
    {
      return $user->can('manage-photo');
    }

    public function delete(User $user)
    {
      return $user->can('delete-photo');
    }
}
