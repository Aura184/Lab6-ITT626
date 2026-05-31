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
   Schema::create('timetables', function (Blueprint $table) {
    $table->id();

    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('subject_id');
    $table->unsignedBigInteger('hall_id');
    $table->unsignedBigInteger('day_id');

    $table->time('time_from');
    $table->time('time_to');

    $table->timestamps();
});
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};
