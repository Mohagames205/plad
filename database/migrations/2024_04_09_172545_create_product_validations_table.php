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
        Schema::create('product_validations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer("remaining_bandages");
            $table->foreignId("collection_event_id")->constrained('collection_events')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_validations');
    }
};
