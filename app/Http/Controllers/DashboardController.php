<?php

namespace App\Http\Controllers;

use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class DashboardController extends Controller
{
    public function index()
    {
        
        dd("Well Come,");
        // Fetch all requests from the database
        $requests = Request::all();

       // dd($requests);

        // Group requests by request_type
        $groupedRequests = $requests->groupBy('request_type');

        // Pass the grouped data to the view
        return view('dashboard', compact('groupedRequests'));
        dd("Well Come,");
    }
}
