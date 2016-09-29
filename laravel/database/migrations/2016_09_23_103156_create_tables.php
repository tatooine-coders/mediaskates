<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
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
         * Licences
         */
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('url', 25);
            $table->timestamps();
        });

        /*
         * Users
         */
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 15);
            $table->string('last_name', 15);
            $table->string('pseudo', 15)->unique();
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
            $table->integer('role_id', false, true)->default(2);
            $table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });

        /*
         * Disciplines
         */
        Schema::create('disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('logo', 50);
            $table->timestamps();
        });

        /*
         * User's disciplines
         *
         * @TODO : What do we do with that ?
         */
        /*Schema::create('user_disciplines', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('discipline_id', false, true);
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->timestamps();
        });*/

        /*
         * Events
         */
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->string('address', 25);
            $table->date('date_event');
            $table->string('city', 25);
            $table->string('zip', 10);
            $table->integer('user_id', false, true);
            $table->integer('discipline_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->timestamps();
        });

        /*
         * Watermarks
         */
        Schema::create('watermarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 25);
            $table->integer('type');
            $table->text('description');
            $table->timestamps();
        });

        /*
         * Photos
         */
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file', 50);
            $table->integer('user_id', false, true);
            $table->integer('event_id', false, true);
            $table->integer('watermark_id', false, true);
            $table->integer('license_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('watermark_id')->references('id')->on('watermarks');
            $table->foreign('license_id')->references('id')->on('licenses');
            $table->timestamps();
        });

        /*
         * Tags
         * @TODO : What do we do with that ?
         */
        Schema::create('photo_user_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('photo_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->timestamps();
        });

        /*
         * Comments
         */
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('user_id', false, true);
            $table->integer('photo_id', false, true);
            $table->integer('comment_id', false, true)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('photo_id')->references('id')->on('photos');
            $table->foreign('comment_id')->references('id')->on('comments');
            $table->timestamps();
        });

        /*
         * Votes
         */
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true);
            $table->integer('photo_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('photo_id')->references('id')->on('photos');
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
        Schema::dropIfExists('votes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('photo_user_tags');
        Schema::dropIfExists('photos');
        Schema::dropIfExists('watermarks');
        Schema::dropIfExists('events');
        // Schema::dropIfExists('user_disciplines');
        Schema::dropIfExists('disciplines');
        Schema::dropIfExists('users');
        Schema::dropIfExists('licenses');
        Schema::dropIfExists('roles');
    }
}
