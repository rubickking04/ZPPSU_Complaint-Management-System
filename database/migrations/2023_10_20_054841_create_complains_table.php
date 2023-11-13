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
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('incident_place')->default('N/A');
            $table->date('incident_date');
            $table->string('incident_event')->default('N/A');
            $table->string('incident_attempted')->default('N/A');
            $table->string('description')->default('N/A');
            $table->string('complain_attempts')->default('N/A');
            $table->string('solution')->default('N/A');
            $table->string('detail')->default('N/A');
            $table->string('file',150)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complains');
    }
};
