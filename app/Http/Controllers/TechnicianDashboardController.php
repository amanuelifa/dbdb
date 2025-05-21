<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request as SupportRequest;

class TechnicianDashboardController extends Controller
{
    public function responseForUser()
    {
        $technicianId = auth()->id();

        $assignedRequests = SupportRequest::where('technician_id', $technicianId)
            ->where('status', 'assigned')
            ->get();

            
        return view('livewire.responseforuser.responseforuser', compact('assignedRequests'));
    }
}
