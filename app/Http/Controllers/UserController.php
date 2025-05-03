<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Display a listing of the users
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('livewire.employees.employee', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('users.create'); // Ensure this matches your view path
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Ensure passwords match
        ]);

        // Create a new user and save to the database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        return redirect()->route('employee')->with('success', 'User created successfully!');
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('employees.edit', compact('user')); // Ensure this matches your view path
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Password is optional on update
        ]);

        // Update the user data
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash the password
        }

        $user->save();

        return redirect()->route('employee')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from the database
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('employee')->with('success', 'User deleted successfully!');
    }
    protected $fillable = [
        'name',
        'email',
        'password',
        // other attributes you want to allow mass assignment for
    ];
    
}
