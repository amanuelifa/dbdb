<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technician;

class TechnicianSeeder extends Seeder
{
    public function run()
    {
        Technician::insert([
            ['name' => 'Samson', 'email' => 'samson@gmail.com', 'specialization' => 'password'],
            ['name' => 'Yabsra', 'email' => 'yabsra@gmail.com', 'specialization' => 'hardware'],
            ['name' => 'Dave', 'email' => 'dave@gmail.com', 'specialization' => 'software'],
            ['name' => 'Eyosi', 'email' => 'eyosi@gmail.com', 'specialization' => 'network'],
            ['name' => 'Bereket', 'email' => 'bereket@gmail.com', 'specialization' => 'power'],
            ['name' => 'Biruk', 'email' => 'biruk@gmail.com', 'specialization' => 'general'],
        ]);
    }
}