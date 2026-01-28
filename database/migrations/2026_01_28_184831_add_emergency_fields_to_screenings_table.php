<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->boolean('emergency_flag')->default(false)->after('risk_level');
            $table->string('emergency_reason')->nullable()->after('emergency_flag');
        });
    }

    public function down(): void
    {
        Schema::table('screenings', function (Blueprint $table) {
            $table->dropColumn(['emergency_flag', 'emergency_reason']);
        });
    }
};
