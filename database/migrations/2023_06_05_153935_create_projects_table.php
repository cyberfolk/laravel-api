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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 50)->unique();
            $table->string('slug', 100);
            $table->string('link_cover', 200);
            $table->string('link_live', 200)->nullable();
            $table->string('link_code', 200);
            $table->text('description')->nullable(); //text not require dim
            $table->date('start_date');
            $table->date('last_commit')->nullable();
            $table->Integer('code_line')->nullable();
            $table->tinyInteger('folders')->nullable();
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
        Schema::dropIfExists('projects');
    }
};
