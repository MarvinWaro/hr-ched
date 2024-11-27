<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index() {
        return view('admin.employee.index');
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
            'usertype' => 'required|in:admin,employee',
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

