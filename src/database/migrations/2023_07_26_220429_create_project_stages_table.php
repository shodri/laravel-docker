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
        Schema::create('project_stages', function (Blueprint $table) {
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('stage_id')->unsigned();
            $table->date('commited_date')->nullable();
            $table->date('finished_date')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('stage_id')->references('id')->on('stages');

            $table->primary(['project_id', 'stage_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_stages');
    }
};
