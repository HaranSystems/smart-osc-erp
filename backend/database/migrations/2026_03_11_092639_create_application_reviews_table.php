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
    Schema::create('application_reviews', function (Blueprint $table) {
        $table->id();

        $table->foreignId('application_id')
              ->constrained('applications')
              ->cascadeOnDelete();

        $table->foreignId('department_id')
              ->constrained('departments');

        $table->foreignId('reviewed_by')
              ->nullable()
              ->constrained('users');

        $table->string('status')->default('pending');

        $table->text('remarks')->nullable();

        $table->timestamp('reviewed_at')->nullable();

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_reviews');
    }
};
