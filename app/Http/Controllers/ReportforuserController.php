<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Response;

class ReportforuserController extends Controller
{
    // Method to display responses filtered by time range
    public function showResponsesByTechnician(Request $request)
    {
        // Get the currently authenticated user
        $currentUser = Auth::user();

        // Validate the request to ensure startDate and endDate are provided
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        // Fetch the responses where 'requested_by' matches the current user's name and filter by date range
        $responses = Response::where('requested_by', $currentUser->name)
            ->whereBetween('created_at', [$request->startDate, $request->endDate])
            ->get();

        // Return the view with the filtered responses
        return view('livewire.reportforuser.showuser', compact('responses'));
    }
}
