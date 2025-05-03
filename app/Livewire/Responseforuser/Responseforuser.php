<?php
namespace App\Livewire\ResponseForUser;

use Livewire\Component;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;

class ResponseForUser extends Component
{
    public $requests;

    public function mount()
    {
        // Get only the requests assigned to the logged-in technician
        $this->requests = Request::where('technician_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.responseforuser.responseforuser', [
            'requests' => $this->requests,
        ]);
    }
}
