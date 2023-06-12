<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_technology', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id'); // Add project_id column
            $table->foreign('project_id')->references('id')->on('projects')->cascadeOnDelete(); // Add foreign key

            $table->unsignedBigInteger('technology_id'); // Add technology_id column
            $table->foreign('technology_id')->references('id')->on('technologies')->cascadeOnDelete(); // Add foreign key

            $table->primary(['project_id', 'technology_id']); // Add primary key
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
