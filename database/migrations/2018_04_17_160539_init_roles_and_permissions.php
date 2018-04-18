<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class InitRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Define roles
        $admin = Bouncer::role()->create([
          'name' => 'admin',
          'title' => 'Adminstrator',
        ]);

        $normaluser = Bouncer::role()->create([
          'name' => 'normaluser',
          'title' => 'Normal User',
        ]);

        //Define abilitites
        $viewAlbum = Bouncer::ability()->create([
          'name' => 'view-album',
          'title' => 'View Album',
        ]);

        $createAlbum = Bouncer::ability()->create([
          'name' => 'create-album',
          'title' => 'Create Album',
        ]);

        $manageAlbum = Bouncer::ability()->create([
          'name' => 'manage-album',
          'title' => 'Manage Album',
        ]);

        $deleteAlbum = Bouncer::ability()->create([
          'name' => 'delete-album',
          'title' => 'Delete Album',
        ]);

        $viewPhoto = Bouncer::ability()->create([
          'name' => 'view-photo',
          'title' => 'View Photo',
        ]);

        $createPhoto = Bouncer::ability()->create([
          'name' => 'create-photo',
          'title' => 'Create Photo',
        ]);

        $managePhoto = Bouncer::ability()->create([
          'name' => 'manage-photo',
          'title' => 'Manage photo',
        ]);

        $deletePhoto = Bouncer::ability()->create([
          'name' => 'delete-photo',
          'title' => 'Delete Photo',
        ]);



        //Assign abilities to roles
        //Admin Role
        Bouncer::allow($admin)->to($viewAlbum);
        Bouncer::allow($admin)->to($deleteAlbum);
        Bouncer::allow($admin)->to($viewPhoto);
        Bouncer::allow($admin)->to($deletePhoto);


        //Normal User Role
        Bouncer::allow($normaluser)->to($viewAlbum);
        Bouncer::allow($normaluser)->to($createAlbum);
        Bouncer::allow($normaluser)->to($manageAlbum);
        Bouncer::allow($normaluser)->to($deleteAlbum);

        Bouncer::allow($normaluser)->to($deletePhoto);
        Bouncer::allow($normaluser)->to($viewPhoto);
        Bouncer::allow($normaluser)->to($createPhoto);
        Bouncer::allow($normaluser)->to($managePhoto);

        //Make the first user an Admin
        $user= User::find(1);
        Bouncer::assign('admin')->to($user);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
