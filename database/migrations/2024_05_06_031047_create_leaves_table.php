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
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('leave_id');
            $table->string('empid');
            $table->string('reason');
            $table->string('leave_message');
            $table->string('document')->nullable();
            $table->string('fromdate');
            $table->string('todate');
            $table->string('leave_days');
            $table->string('leave_status')->default("Pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
