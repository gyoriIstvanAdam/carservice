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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('car_id');
            $table->string('log_number');
            $table->string('event');
            $table->timestamp('event_time')->nullable();
            $table->unsignedBigInteger('document_id');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
