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
        Schema::create('aioa', function (Blueprint $table) {
            $table->id();
            $table->string('license_key')->nullable();
            $table->string('color_code')->nullable();
            $table->string('icon_position')->nullable();
            $table->string('icon_type')->nullable();
            $table->string('icon_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aioa');
    }
};
