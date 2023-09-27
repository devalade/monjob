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
        Schema::create('mission_categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('mission_statuses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('missions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 250);
            $table->text('description');
            $table->foreignUuid('mission_category_id')->constrained('mission_categories');
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->timestamp('date_and_time')->nullable();
            $table->foreignUuid('user_id')->constrained('users');
            $table->unsignedTinyInteger('capacity');
            $table->timestamp('registration_deadline');
            $table->foreignUuid('mission_status_id')->constrained('mission_statuses');
            $table->jsonb('resources')->nullable();
            $table->text('photos')->nullable();
            $table->text('videos')->nullable();
            $table->text('notes')->nullable();
            $table->text('tags')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missions');
    }
};
