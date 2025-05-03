<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as UserRequest;
use App\Models\Response;

class RequestforadminController extends Controller
{
    // Method to display all requests and their corresponding responses for the admin
    public function showRequestsForAdmin()
    {
        // Fetch all requests with their related responses (assuming one-to-many relation)
        $requests = UserRequest::
        with('responses')
        ->get(); 
        // 'responses' should be a method in the UserRequest model

        // Return the view with the requests and responses
        return view('livewire.requestforadmin.requestforadmin', compact('requests'));
    }
}
