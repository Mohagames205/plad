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
        Schema::create('money_validations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId("collection_event_id")->constrained('collection_events')->cascadeOnDelete();
            $table->float('cash_money');
            $table->float('payconiq_money');
            $table->float('sumup_money');
            $table->float('extra')->default(0);
            $table->text('extra_reason')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('validations');
    }
};
