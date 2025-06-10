<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  admin  - trainers - trainees - fathers 
     *
     * @return void
     */
    public function up()
    {
        /**
         * Profiles Table
         * Defines different roles or profiles within the system (e.g., Admin, Trainer, Trainee).
         * These profiles are assigned permissions.
         */
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title', 15);
        });

        Schema::create('user_profile', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('profile_id');
            $table->primary(['user_id', 'profile_id']);
            $table->timestamps();// timestamps for user-profile assignments
        });

        Schema::create('profile_permission', function (Blueprint $table) {
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->foreignId('permission_id')->constrained('permissions')->onDelete('cascade');
            $table->primary(['profile_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
