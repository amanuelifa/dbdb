<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as HttpRequest;
use App\Models\Request;
use App\Models\User;
use App\Models\Response;
use DB;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index()
    {
      
        // Retrieve all requests from the database
        // $requests = Request::all();
         $requests = Request::Join('users','users.id','=','requests.requested_by')
         ->select('requests.*','users.name as name')
         ->get();

        //dd($requests);
        //$users = DB::tables('users')
    //     $users =User::
    //     where('usertype','=','user')
    //     ->pluck('name','id');
    //     //->get();
    //    // dd($users );

        // Return the view with the requests data
        return view('livewire.requestsofuser.requestsofuser', compact('requests'));
    }



    public function show($id)
{
    $request = Request::findOrFail($id);
    // Handle showing the response page for the specific request
    
    return view('response.show', compact('request'));
}



    public function create()

    {
        //$users = DB::tables('users')
        $users =User::
        Where('usertype','=','user')
        ->pluck('name','id');
        //->get();
        //dd($users );
        return view('create-request',compact('users'));
    }

    public function store(HttpRequest $request)
    {
        $user = Auth::user()->id;
      // dd($request);
        // Validate the request
        $validatedData = $request->validate([
            'request_type' => 'required|string',
           // 'problem' => 'required|string',
            // 'request_date_and_time' => 'required|date',
            'computer_name' => 'required|string',
            //'requested_by' => 'required|string',
        ]);
      
 $requests=new Request();
 $requests->request_type=$request->request_type;
 $requests->computer_name=$request->computer_name;
 $requests->problem=$request->problem;
 $requests->assigned_to="Null";
 $requests->requested_by=$user;
 $requests->save();
 //dd($requests);
           // Create a new request record
        //Request::create($validatedData);

        // Return a success message or redirect
        return redirect()->back()->with('success', 'Request submitted successfully!');
    }


    // public function respond($id)
    // {
        // Fetch the request details using the ID
        // $request = Request::findOrFail($id);

        // Pass the request data to a view or Livewire component
    //     return view('respond-to-request', compact('request'));
    // }
    
    // public function submitResponse(Request $request, $id)
    // {
    //     // Find the request and update it with the response
    //     $requestToUpdate = Request::findOrFail($id);
    //     $requestToUpdate->response = $request->input('response');
    //     $requestToUpdate->status = 'Responded'; // or any other status update
    //     $requestToUpdate->save();

    //     // Redirect back with a success message
    //     return redirect()->route('assign-technician', $id)->with('status', 'Response submitted successfully!');
    // }

// Show the response form
public function showResponseForm($id)
{
    // Fetch the request by ID
    $request = Request::findOrFail($id);

    // Pass the request data to the Blade view
    return view('respond-to-request', compact('request'));
}

// Handle the form submission
public function submitResponse(HttpRequest $request, $id)
{
    // Validate the form data
    $request->validate([
        'response' => 'required|string|max:5000',
    ]);

    // Find the request in the database
    $requestToUpdate = Request::findOrFail($id);

    // Update the request's response and status
    $requestToUpdate->response = $request->input('response');
    $requestToUpdate->request_status = 'Responded';  // You can update the status as needed
    $requestToUpdate->save();

    $response=new Response();
    $response->requested_by=$requestToUpdate->requested_by;
    $response->request_id=$requestToUpdate->id;
    $response->response_text=$requestToUpdate->response;
    //dd($requestToUpdate);
    $response->save();


    // Redirect back with a success message
    return redirect()->route('responseforuser', $id)->with('status', 'Response submitted successfully!');
}


// app/Http/Controllers/RequestController.php

public function getUserRequests()
{
    // Fetch requests where the response field is null (i.e., no response yet)
    $requests = Request::whereNull('response')->get();

    // Pass the filtered requests to the Blade view
    return view('livewire.responseforuser.responseforuser', compact('requests'));
}

}
