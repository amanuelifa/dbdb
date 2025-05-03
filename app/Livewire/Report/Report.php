<?php

namespace App\Livewire\Report;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Http\Request as HttpRequest;

class Report extends Component
{
    public function display(HttpRequest $request)
    {
        // Get the start and end dates from the form
        $from = $request->from;
        $to = $request->to;

        // Query the Request model, filter based on the date range, and join with the responses table
        $reports = Request::join('responses', 'responses.request_id', '=', 'requests.id')
            ->select('requests.*', 'responses.response_text', 'responses.created_at as responded_date', 'responses.updated_at')
            ->whereBetween('requests.created_at', [$from, $to])
            ->get();

        // Pass the reports data to the 'show' view
        return view('livewire.report.show', compact('reports'));
    }

    public function render()
    {
        // Render the report form view
        return view('livewire.report.reports');
    }
}
