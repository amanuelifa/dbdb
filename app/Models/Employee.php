<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    // Table associated with the model
    protected $table = 'employees';

    // Fillable attributes
    protected $fillable = [
        'full_name',
        'gender',
        'employee_id',
        'job_title',
        'department',
        'phone_no',
        'email',
        'office',
    ];

    /**
     * Define the inverse relationship with User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
