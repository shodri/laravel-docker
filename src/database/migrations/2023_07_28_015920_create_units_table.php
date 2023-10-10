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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_unit_type_id')->unsigned();
            $table->string('name', 100);
            $table->decimal('prize', 8, 0);
            $table->decimal('total_area');
            $table->decimal('covered_area');
            $table->string('status', 30);
            $table->timestamps();

            $table->foreign('project_unit_type_id')->references('id')->on('project_unit_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
