<?php

namespace App\Http\Controllers;

use App\Models\Request as ServiceRequest; // Aliased to avoid conflict
use App\Models\Technician;
use Illuminate\Http\Request; // Laravel's HTTP Request

class AssignTechnicianController extends Controller
{
    public function create($requestId)
    {
        $serviceRequest = ServiceRequest::findOrFail($requestId);

        $technicians = $serviceRequest->request_type === 'others'
            ? Technician::all()
            : Technician::where('specialization', $serviceRequest->request_type)->get();

        return view('livewire.response.assign-technician', [
            'request' => $serviceRequest,
            'technicians' => $technicians
        ]);
    }

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'technician_id' => 'required|exists:technicians,id',
        ]);

        $serviceRequest = ServiceRequest::findOrFail($id);
        $serviceRequest->update([
            'technician_id' => $validated['technician_id'],
            'request_status' => 'assigned'
        ]);

            return redirect()->route('user.requests')->with('success', 'Technician assigned.');

        // return redirect()->route('user-requests')
        //        ->with('success', 'Technician assigned successfully!');
    }
}