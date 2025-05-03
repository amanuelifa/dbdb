<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'specialization'];

    // Map request types to technician specializations
    public static $specializationMap = [
        'Password Issue' => 'password',
        'HW Issue' => 'hardware',
        'SW Issue' => 'software', 
        'Network Issue' => 'network',
        'Power Issue' => 'power',
        'Other' => 'general'  // Changed from 'others' to 'general'
    ];

    public function scopeForRequestType($query, $requestType)
    {
        $specialization = self::$specializationMap[$requestType] ?? 'general';
        return $query->where('specialization', $specialization);
    }
}