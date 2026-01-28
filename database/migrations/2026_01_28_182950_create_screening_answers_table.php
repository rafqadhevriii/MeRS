<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('screening_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('screening_id')
                  ->constrained('screenings')
                  ->onDelete('cascade');

            $table->string('instrument'); // phq9 | gad7 | pcl5
            $table->unsignedTinyInteger('question_index');
            $table->unsignedTinyInteger('value');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('screening_answers');
    }
};
