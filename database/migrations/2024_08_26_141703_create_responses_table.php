<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('responses', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('request_id');
        $table->text('requested_by');
        $table->text('response_text');
        $table->timestamps();
        $table->foreign('request_id')->references('id')->on('requests')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
