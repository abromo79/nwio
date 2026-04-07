<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['vision', 'mission', 'goal', 'core_value']);
            $table->text('content');
            $table->timestamps();
        });

        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('objectives');
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('program_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->text('activity');
            $table->timestamps();
        });

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id')->constrained('programs')->cascadeOnDelete();
            $table->string('title', 150);
            $table->text('description');
            $table->string('location', 100);
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->enum('status', ['ongoing', 'completed']);
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->text('description');
            $table->string('file', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->text('content');
            $table->string('image', 255)->nullable();
            $table->date('date');
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->text('description');
            $table->string('location', 100);
            $table->date('event_date');
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('position', 100);
            $table->string('department', 100);
            $table->text('description');
            $table->string('photo', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('gallery', function (Blueprint $table) {
            $table->id();
            $table->string('file', 255);
            $table->enum('type', ['photo', 'video']);
            $table->string('caption', 255)->nullable();
            $table->timestamps();
        });

        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('get_involved_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100);
            $table->enum('type', ['volunteer', 'partner', 'donate']);
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('get_involved_requests');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('gallery');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('events');
        Schema::dropIfExists('news');
        Schema::dropIfExists('research');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('program_activities');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('about');
    }
};
