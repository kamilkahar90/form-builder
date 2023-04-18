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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workflow_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->unsignedBigInteger('form_id')->nullable();
            $table->unsignedBigInteger('submission_id')->nullable();
            $table->timestamps();

            $table->foreign('workflow_id')->references('id')->on('workflows')->onDelete('cascade');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('submission_id')->references('id')->on('submissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
