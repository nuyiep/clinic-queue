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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
			$table->foreignId('queue_id')->constrained()->cascadeOnDelete();
			$table->foreignId('patient_id')->constrained()->cascadeOnDelete();
			$table->text('diagnosis')->nullable();
			$table->text('notes')->nullable();
			$table->text('prescription')->nullable();
			$table->timestamp('started_at')->nullable();
			$table->timestamp('ended_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
