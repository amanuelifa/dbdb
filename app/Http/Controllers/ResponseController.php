<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as UserRequest;
use App\Models\Response as UserResponse;
use App\Models\User; // Use User model for retrieving technicians
use Illuminate\Support\Facades\Auth;
use App\Models\Response;

class ResponseController extends Controller
{
    // Show the form for responding to a specific request
    public function show($id)
    {
        // Fetch the request data based on the ID
        $request = UserRequest::findOrFail($id);

        // Return the response view with the request data
        return view('livewire.response.response', compact('request'));
    }

    // Store the response to a specific request
    public function store(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        // Find the request and update it with the response
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->response = $request->input('response');
        $userRequest->request_status = 'Responded'; // Update the request status, if necessary
        $userRequest->response_by = Auth::id(); // Store the ID of the technician who responded
       // $userRequest->save();
dd($userRequest);
        // Create a new response entry
        $userResponse = new UserResponse();
        $userResponse->requested_by = $userRequest->requested_by;
        $userResponse->request_id = $userRequest->id; // Corrected the request ID
        $userResponse->response_text = $request->input('response');
        //$userResponse->save();
        dd($userResponse);

        // Redirect back with a success message
        return redirect()->route('response.show', $id)->with('success', 'Response submitted successfully!');
    }

    // Show all responses (for technicians)
    // public function showResponse()
    // {
    //     $responses = UserResponse::all(); // Fetch all responses or apply filtering as needed
    //     return view('livewire.responsebytechnician.responsebytechnician', compact('responses'));
    // }

    // Show the form to assign a technician to a request
    public function showAssignTechnicianForm($id)
    {
        // Fetch the specific request
        $request = UserRequest::findOrFail($id);

        // Fetch all available technicians from the users table with usertype 'technician'
        $technicians = User::where('usertype', 'technician')->get(); // Fetch only technicians

        // Return the assign-technician view with the request and technician data
        return view('livewire.response.assign-technician', compact('request', 'technicians'));
    }

    // Store the technician assignment
    public function storeAssignedTechnician(Request $request, $id)
    {
        $request->validate([
            'technician_id' => 'required|exists:users,id', // Validate against the users table
        ]);

        // Find the specific request
        $userRequest = UserRequest::findOrFail($id);
         //dd($userRequest);
        // Assign the technician to the request
        $userRequest->technician_id = $request->input('technician_id');
       // $userRequest->assigned_to = $request->input('technician_id');
        $userRequest->request_status = 'Assigned';
        $userRequest->save();

        // Redirect back with a success message
        return redirect()->route('user-requests')->with('success', 'Technician assigned successfully!');
    }

    // Show all user requests
    public function showUserRequests()
    {
        // Fetch all user requests
        $requests = UserRequest::all();

        // Return the view with the requests
        return view('livewire.response.user-requests', compact('requests'));
    }

    // Assign a technician to a specific request
    public function assignTechnician(Request $request, $id)
    {
        $request->validate([
            'technician_id' => 'required|exists:users,id', // Validate against the users table
        ]);

        // Find the request and update it with the assigned technician
        $userRequest = UserRequest::findOrFail($id);
        $userRequest->technician_id = $request->input('technician_id'); // Assign the selected technician
        $userRequest->request_status = 'Assigned to Technician'; // Update the status
        $userRequest->save();

        // Redirect back with a success message
        return redirect()->route('requests')->with('success', 'Technician assigned successfully!');
    }
}
