<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'responsibilities' => 'required|string',
        ]);

        // Create a new department
        Department::create([
            'name' => $request->name,
            'responsibilities' => $request->responsibilities,
        ]);

        // Set a flash message
        return redirect()->back()->with('success', 'Department added successfully.');
    }
    
}
