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
        Schema::table('requests', function (Blueprint $table) {
            $table->string('assigned_to')->nullable(); // Add the assigned_to column
        });
    }
    
    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('assigned_to'); // Drop the column if rolled back
        });
    }
    
};
