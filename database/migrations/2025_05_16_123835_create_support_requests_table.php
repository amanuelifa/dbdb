<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_requests', function (Blueprint $table) {
            $table->id();
            $table->string('computer_name');
            $table->string('request_type');
            $table->text('problem');
            $table->string('name'); // Requested by
            $table->unsignedBigInteger('technician_id')->nullable();
            $table->enum('status', ['pending', 'assigned', 'in_progress', 'resolved'])->default('pending');
            $table->timestamps();

            $table->foreign('technician_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_requests');
    }
};
