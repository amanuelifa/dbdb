<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'confirmed', 'min:8'],
        ]);
    
        $user = Auth::user();
    
        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            
            try {
                $user->save();
            } catch (\Exception $e) {
                return redirect()->route('profile')->withErrors(['error' => 'Failed to update password.']);
            }
    
            return redirect()->route('profile')->with('status', 'Password updated successfully.');
        } else {
            return redirect()->route('profile')->withErrors(['current_password' => 'Current password does not match.']);
        }
    }
}
