<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'computer_name',
        'request_type',
        'problem',
        'name',
        'technician_id',
        'status',
    ];

    public function technician()
    {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
