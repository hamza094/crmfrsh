<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
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
            $table->string("name");
            $table->integer('user_id');
            $table->unsignedInteger('group_id')->nullable();
            $table->text('notes')->nullable();
            $table->string("company")->nullable();
            $table->string('position')->nullable();
            $table->string("address")->nullable();
            $table->bigInteger('zipcode')->nullable();
            $table->string("email");
            $table->string("mobile",64);
            $table->integer('stage')->default(1);
            $table->string('postponed')->nullable();
            $table->softDeletes();
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
}
