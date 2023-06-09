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
        Schema::create('app_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('shop_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('app_status', 10)->default('Disable');
            $table->string('app_mode', 50);
            $table->boolean('schedule_delay_call')->default(0);
            $table->string('schedule_delay_call_mins')->nullable();
            $table->string('follow_up_call',10)->default('Disable');
            $table->string('follow_up_call_mins')->nullable();
            $table->boolean('cancel_order')->default(0);
            $table->boolean('prepaid_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_configurations');
    }
};
