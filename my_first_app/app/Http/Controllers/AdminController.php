<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // Import the User model

class AdminController extends Controller
{
    public function makeAdmin(User $user)
    {
        // Check if the current user is an admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to make users admin.');
        }

        // Update the user's role to 'admin'
        $user->update(['role' => 'admin']);

        return redirect()->back()->with('success', 'User has been promoted to admin.');
    }
}

