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
            'employee_no' => 'required|string|max:255|unique:users,employee_no', // Ensure employee_no is unique
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'usertype' => 'required|in:admin,user',
        ]);

        // Create a new user with only the fields provided
        User::create([
            'employee_no' => $request->employee_no,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('employee')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {
        $employee = User::findOrFail($id); // Assuming 'User' is the model for employees
        return view('admin.employee.edit-employee', compact('employee'));
    }

    public function update(Request $request, $id) {
        // Fetch the user by ID
        $user = User::findOrFail($id);

        // Validate the input fields
        $request->validate([
            'employee_no' => 'required|string|max:255|unique:users,employee_no,' . $user->id, // Ensure employee_no is unique except for the current user
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Ensure email is unique except for the current user
            'usertype' => 'required|in:admin,user',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female',
            'marital_status' => 'nullable|in:Single,Married,Separated,Divorced,Widowed',
            'address' => 'nullable|string',
            'department' => 'nullable|in:Admin Department,Technical Department',
            'payroll_position' => 'nullable|string',
            'designation' => 'nullable|string',
            'place_of_assignment' => 'nullable|in:Zamboanga City,Pagadian City',
            'office_email' => 'nullable|email|unique:users,office_email,' . $user->id,
            'mobile_number' => 'nullable|string',
            'tin' => 'nullable|string|unique:users,tin,' . $user->id,
            'gsis' => 'nullable|string|unique:users,gsis,' . $user->id,
            'crn' => 'nullable|string|unique:users,crn,' . $user->id,
            'sss' => 'nullable|string|unique:users,sss,' . $user->id,
            'philhealth' => 'nullable|string|unique:users,philhealth,' . $user->id,
            'date_employed' => 'nullable|date',
            'employment_status' => 'nullable|in:Active,Inactive',
        ]);

        // Update the user data
        $user->update([
            'employee_no' => $request->employee_no,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Keep old password if not updated
            'usertype' => $request->usertype,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,
            'address' => $request->address,
            'department' => $request->department,
            'payroll_position' => $request->payroll_position,
            'designation' => $request->designation,
            'place_of_assignment' => $request->place_of_assignment,
            'office_email' => $request->office_email,
            'mobile_number' => $request->mobile_number,
            'tin' => $request->tin,
            'gsis' => $request->gsis,
            'crn' => $request->crn,
            'sss' => $request->sss,
            'philhealth' => $request->philhealth,
            'date_employed' => $request->date_employed,
            'employment_status' => $request->employment_status,
        ]);

        return redirect()->route('employee')->with('success', 'User updated successfully.');
    }

}
