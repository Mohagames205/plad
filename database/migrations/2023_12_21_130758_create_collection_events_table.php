<?php

use App\Enums\Status;
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
        Schema::create('collection_events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("code")->unique();
            $table->string("location", 255);
            $table->timestamp("start_time")->nullable();
            $table->timestamp("end_time")->nullable();
            $table->json("volunteers");
            $table->integer("bandage_count");
            $table->integer("change_received");
            $table->json("payconiq_uids");
            $table->enum("status", [Status::DRAFT->value, Status::ACTIVE->value, Status::CLOSED->value])->default(Status::DRAFT->value);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_events');
    }
};
