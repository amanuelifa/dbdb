<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Response;
use App\Models\Request as requests;

class ResponsebytechnicianController extends Controller
{
    // Method to display responses for the logged-in user
    public function showResponsesByTechnician()
    {
        // Get the currently authenticated user
        $currentUser = Auth::user();

        // Fetch the responses where 'requested_by' matches the current user's email or ID
        $responses = Requests::
        Join('responses','requests.id','=','responses.request_id')
       -> Join('users','requests.requested_by','=','users.id')
        ->where('requests.requested_by', $currentUser->id)
         ->select('requests.*','responses.*','users.name as name')
        ->get();
    //     $responses = Response::
    //     where('requested_by', $currentUser->name)
    //    ->get();


        // Return the view with the filtered responses
        return view('livewire.responsebytechnician.responsebytechnician', compact('responses'));
    }
}
