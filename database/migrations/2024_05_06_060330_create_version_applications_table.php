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
        Schema::create('version_applications', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('version');
            $table->string('note')->nullable();
            $table->integer('size');
            $table->foreignId('application_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('version_applications');
    }
};
