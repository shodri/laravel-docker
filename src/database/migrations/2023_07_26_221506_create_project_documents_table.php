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
        Schema::create('project_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();
            $table->string('name');
            $table->string('class');
            $table->string('type');
            $table->string('path')->nullable();
            $table->string('extension',3)->nullable();
            $table->integer('size')->unsigned()->nullable();
            $table->string('link')->nullable();
            $table->string('status',30)->default('enabled');
            $table->timestamps();
            
            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_documents');
    }
};
