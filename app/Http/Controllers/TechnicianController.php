<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Technician;
use Illuminate\Http\Request as HttpRequest;

class TechnicianController extends Controller
{
    public function showAssignForm($id)
    {
        $request = Request::findOrFail($id);
        
        // Get matching specialists
        $technicians = Technician::forRequestType($request->request_type)->get();
        
        // If no specialists, get general technicians
        if ($technicians->isEmpty()) {
            $technicians = Technician::where('specialization', 'general')->get();
        }
        
        // Ensure we always have a collection
        $technicians = $technicians ?: collect();
        
        return view('livewire.response.assign-technician', [
            'request' => $request,
            'technicians' => $technicians
        ]);
    }


    public function processAssignment(HttpRequest $request, $id)
    {
        $validated = $request->validate([
            'technician_id' => 'required|exists:technicians,id',
            'notes' => 'nullable|string'
        ]);

        $serviceRequest = Request::findOrFail($id);
        $serviceRequest->update([
            'technician_id' => $validated['technician_id'],
            'status' => 'assigned',
            'notes' => $validated['notes'] ?? null
        ]);

        return redirect()->route('requests.index')->with('success', 'Technician assigned successfully!');
    }
}