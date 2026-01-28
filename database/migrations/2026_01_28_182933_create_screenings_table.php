<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();

            // anonymous session identifier
            $table->uuid('session_id')->index();

            // scores
            $table->unsignedTinyInteger('phq9_score')->nullable();
            $table->unsignedTinyInteger('gad7_score')->nullable();
            $table->unsignedTinyInteger('pcl5_score')->nullable();

            // risk classification
            $table->enum('risk_level', ['low', 'moderate', 'high'])->nullable();

            // data retention (30 days)
            $table->timestamp('expires_at')->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screenings');
    }
};
