<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Request as Requests;

class ReportforadminController extends Controller
{
    // Method to display responses filtered by time range
    public function showResponsesByTechnician(Request $request)
    {
        // Validate the request to ensure startDate and endDate are provided
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        // Fetch all responses and filter by date range
        // $responses = Response::
        // whereBetween('created_at', [$request->startDate, $request->endDate])
        //     ->get();

        $responses = Requests::
            Join('responses','responses.request_id','=','requests.id')
            ->Join('users','users.id','=','requests.requested_by')
            ->select('requests.*','responses.*','users.name as name')
            ->whereBetween('requests.created_at', [$request->startDate, $request->endDate])
            ->get();

        // Return the view with the filtered responses
        return view('livewire.reportforadmin.show', compact('responses'));
    }
}
