<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import the HasFactory trait
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Request extends Model
{
    use HasFactory; // Use the HasFactory trait

    // Define the table name if it's different from the plural of the model name
    protected $table = 'requests';

    // Specify which fields are fillable (mass assignable)
    protected $fillable = [
        'request_type',
        'problem',
        'request_date_and_time',
        'computer_name',
        'requested_by',
        'request_status'
    ];

     public function responses()
    {
        return $this->hasMany(Response::class);
    }
     
    public function user(){
        return $this->belongsToMany(User::class, 'requested_by');
    }
    // In Request.php model
public function technician() {
    return $this->belongsTo(User::class, 'assigned_to_technician_id'); // assuming technician_id is stored in this field
}

}
