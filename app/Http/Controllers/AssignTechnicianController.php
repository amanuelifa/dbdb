<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\Technician;
use Illuminate\Http\Request as HttpRequest;

class AssignTechnicianController extends Controller
{
    public function create($requestId)
    {
        $request = Request::findOrFail($requestId);

        // Filter technicians based on specialization
        $technicians = $request->request_type === 'others'
            ? Technician::all()
            : Technician::where('specialization', $request->request_type)->get();

        return view('livewire.response.assign-technician', compact('request', 'technicians'));
    }
}
