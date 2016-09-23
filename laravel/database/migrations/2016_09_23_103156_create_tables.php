<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Roles
         */
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->timestamps();
        });

        /*
         * Users
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 15);
            $table->string('last_name', 15);
            $table->string('pseudo', 15);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile_pic', 50)->nullable();
            $table->boolean('active')->default(0);
            $table->text('preferences')->nullable();
            $table->string('site_web', 40)->nullable();
            $table->string('facebook', 40)->nullable();
            $table->string('google', 40)->nullable();
            $table->string('twitter', 40)->nullable();
            $table->text('biography', 40)->nullable();
            $table->foreign('roles_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
         * Disciplines
         */


        /*
         * User's disciplines
         */
        Schema::create('users_disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        /*
         * Events
         */

        /*
         * Watermarks
         */

        /*
         * Photos
         */
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('watermark_id')->references('id')->on('watermarks');
            $table->timestamps();
        });

        /*
         * Tags
         */
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        /*
         * Photo's tag
         */

        /*
         * User's tag
         */

        /*
         * User's photos
         */
        Schema::create('user_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });

        /*
         * Comments
         */
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('user_photos');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('user_disciplines');
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
    }
}
