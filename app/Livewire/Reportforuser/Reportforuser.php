<?php

namespace App\Livewire\Reportforuser;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Reportforuser extends Component
{
    public $startDate;
    public $endDate;

    public function render()
    {
        return view('livewire.reportforuser.reportforuser');
    }

    public function displayForUser()
    {
        $currentUser = Auth::user();
        
        // Ensure that the user's identifier is correctly used for filtering
        $reports = Request::join('responses', 'responses.request_id', '=', 'requests.id')
            ->select('requests.id', 'requests.request_type', 'requests.problem', 'requests.computer_name', 'requests.requested_by', 'responses.response_text', 'requests.created_at')
            ->where('requests.requested_by', $currentUser->name) // Adjust based on how the user is identified in requests
            ->whereBetween('requests.created_at', [$this->startDate, $this->endDate])
            ->get();

        return view('livewire.reportforuser.showuser', compact('reports'));
    }
}
