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
            $table->unsignedBigInteger('studentId')->unique(); 
            $table->foreign('studentId')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('supervisorId'); 
            $table->foreign('supervisorId')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('examiner1Id'); 
            $table->foreign('examiner1Id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('examiner2Id'); 
            $table->foreign('examiner2Id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title')->nullable(); 
            $table->string('category')->nullable(); 
            $table->date('startDate')->nullable(); 
            $table->date('endDate')->nullable(); 
            $table->integer('duration')->nullable(); 
            $table->string('progress')->nullable(); 
            $table->string('status')->nullable();   
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
