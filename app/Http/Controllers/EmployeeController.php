<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {
        // Fetch all users (you can filter for employees if needed)
        $users = User::all(); // Or use User::where('usertype', 'employee')->get() to fetch only employees

        // Pass the users data to the view
        return view('admin.employee.index', compact('users'));
    }


    public function create() {
        return view('admin.employee.create-employee');
    }

    public function store(Request $request) {
        // Validate the input
        $request->validate([
            'employee_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|in:admin,user',
        ]);

        // Create a new user
        User::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('employee')->with('success', 'User created successfully.');
    }
}

