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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
			$table->foreignId('patient_id')->constrained()->cascadeOnDelete();
			$table->foreignId('doctor_id')->nullable()->constrained()->nullOnDelete();
			$table->string('queue_number');
			$table->enum('status', ['waiting', 'called', 'in_consultation', 'completed', 'no_show', 'cancelled'])
				->default('waiting');
			$table->enum('priority', ['normal', 'urgent'])->default('normal');
			$table->date('queue_date');
			$table->timestamp('checked_in_at')->nullable();
			$table->timestamp('called_at')->nullable();
			$table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
