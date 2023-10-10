<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_user', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('profile_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('profile_id')->references('id')->on('profiles');

            $table->primary(['project_id', 'user_id', 'profile_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_user');
    }
};
