<?php
// app/Models/Response.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    // Define the table if it doesn't follow Laravel's conventions
    protected $table = 'responses';

    // Define the fillable fields if needed
    protected $fillable = [
        'id',
        'requested_by',
        'request_id',
        'response_text',
        'created_at',
        'updated_at',
        ];
}
