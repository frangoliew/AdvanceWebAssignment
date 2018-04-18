<?php

namespace App\Policies;

use App\User;
use App\Album;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlbumPolicy
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

    public function create(User $user)
    {
      return $user->can('create-album');
    }

    public function view(User $user)
    {
      return $user->can('view-album');
    }

    public function manage(User $user)
    {
      return $user->can('manage-album');
    }

    public function delete(User $user)
    {
      return $user->can('delete-album');
    }
}
