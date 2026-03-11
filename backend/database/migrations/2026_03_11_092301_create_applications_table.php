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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();

        $table->foreignId('tenant_id')
              ->constrained('tenants')
              ->cascadeOnDelete();

        $table->foreignId('submitted_by')
              ->constrained('users');

        $table->string('title');

        $table->text('description')->nullable();

        $table->string('status')->default('submitted');

        $table->timestamp('submitted_at')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
