<?php

// database/migrations/xxxx_xx_xx_create_technicians_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechniciansTable extends Migration
{
    public function up()
    {
        Schema::create('technicians', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('specialization'); // e.g. password issue, hw issue, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('technicians');
    }
}
