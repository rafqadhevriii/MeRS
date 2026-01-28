<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();

            $table->uuid('session_id')->index();
            $table->foreignId('screening_id')->nullable()->constrained()->nullOnDelete();

            $table->string('event');          // e.g. screening_started, risk_classified
            $table->string('level');          // info | warning | critical
            $table->text('message');          // human-readable
            $table->json('context')->nullable(); // structured data (scores, cut-offs)

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
