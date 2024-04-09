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
        Schema::create('event_comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('remaining_bandages');
            $table->float('money_after_event');
            $table->text('comments')->nullable();
            $table->foreignId("collection_event_id")->constrained('collection_events');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_comments');
    }
};
