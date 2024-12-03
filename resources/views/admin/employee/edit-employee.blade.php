<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="py-5 px-4 mx-auto max-w-7xl lg:py-10">
                    {{-- <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new employee</h2> --}}
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            <div class="w-full">
                                <label for="usertype" class="block mb-2 text-sm font-medium text-gray-900">User Type</label>
                                <select name="usertype" id="usertype" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" required>
                                    <option value="" disabled>Select User Type</option>
                                    <option value="admin" {{ old('usertype', $employee->usertype) === 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('usertype', $employee->usertype) === 'user' ? 'selected' : '' }}>Employee</option>
                                </select>
                                @error('usertype')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="employee_no" class="block mb-2 text-sm font-medium text-gray-900">Employee #</label>
                                <input type="text" name="employee_no" id="employee_no" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('employee_no', $employee->employee_no) }}" required>
                                @error('employee_no')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('name', $employee->name) }}" required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('email', $employee->email) }}" required>
                                @error('email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="" disabled>Select Gender</option>
                                    <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-900">Marital Status</label>
                                <select name="marital_status" id="marital_status" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="" disabled>Select Marital Status</option>
                                    <option value="Single" {{ $employee->marital_status == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ $employee->marital_status == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Divorced" {{ $employee->marital_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                    <option value="Widowed" {{ $employee->marital_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                </select>
                                @error('marital_status')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                                <input type="text" name="address" id="address" value="{{ old('address', $employee->address) }}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Enter Address">
                                @error('address')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="department" class="block mb-2 text-sm font-medium text-gray-900">Department</label>
                                <select name="department" id="department" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="" disabled selected>Select Department</option>
                                    <option value="Admin Department" {{ old('department', $employee->department) == 'Admin Department' ? 'selected' : '' }}>Admin Department</option>
                                    <option value="Technical Department" {{ old('department', $employee->department) == 'Technical Department' ? 'selected' : '' }}>Technical Department</option>
                                </select>
                                @error('department')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="payroll_position" class="block mb-2 text-sm font-medium text-gray-900">Payroll Position</label>
                                <select name="payroll_position" id="payroll_position" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="" disabled selected>Select Payroll Position</option>
                                    <option value="Director IV" {{ old('payroll_position', $employee->payroll_position) == 'Director IV' ? 'selected' : '' }}>Director IV</option>
                                    <option value="Chief Administrative Officer" {{ old('payroll_position', $employee->payroll_position) == 'Chief Administrative Officer' ? 'selected' : '' }}>Chief Administrative Officer</option>
                                    <option value="Supervising Education Program Specialist" {{ old('payroll_position', $employee->payroll_position) == 'Supervising Education Program Specialist' ? 'selected' : '' }}>Supervising Education Program Specialist</option>
                                    <option value="Education Supervisor II" {{ old('payroll_position', $employee->payroll_position) == 'Education Supervisor II' ? 'selected' : '' }}>Education Supervisor II</option>
                                    <option value="Education Program Specialist II" {{ $employee->payroll_position == 'Education Program Specialist II' ? 'selected' : '' }}>Education Program Specialist II</option>
                                    <option value="Administrative Officer III" {{ $employee->payroll_position == 'Administrative Officer III' ? 'selected' : '' }}>Administrative Officer III</option>
                                    <option value="Administrative Assistant III" {{ $employee->payroll_position == 'Administrative Assistant III' ? 'selected' : '' }}>Administrative Assistant III</option>
                                    <option value="Administrative Aide VI" {{ $employee->payroll_position == 'Administrative Aide VI' ? 'selected' : '' }}>Administrative Aide VI</option>
                                    <option value="Administrative Aide III" {{ $employee->payroll_position == 'Administrative Aide III' ? 'selected' : '' }}>Administrative Aide III</option>
                                    <option value="Project Technical Staff III" {{ $employee->payroll_position == 'Project Technical Staff III' ? 'selected' : '' }}>Project Technical Staff III</option>
                                    <option value="Project Technical Staff II" {{ $employee->payroll_position == 'Project Technical Staff II' ? 'selected' : '' }}>Project Technical Staff II</option>
                                    <option value="Project Technical Staff I" {{ $employee->payroll_position == 'Project Technical Staff I' ? 'selected' : '' }}>Project Technical Staff I</option>
                                    <option value="Project Support Staff IV" {{ $employee->payroll_position == 'Project Support Staff IV' ? 'selected' : '' }}>Project Support Staff IV</option>
                                    <option value="Job Order" {{ $employee->payroll_position == 'Job Order' ? 'selected' : '' }}>Job Order</option>
                                </select>
                                @error('payroll_position')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="w-full">
                                <label for="designation" class="block mb-2 text-sm font-medium text-gray-900">Designation</label>
                                <input type="text" name="designation" id="designation" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('designation', $employee->designation) }}">
                                @error('designation')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="w-full">
                                <label for="place_of_assignment" class="block mb-2 text-sm font-medium text-gray-900">Place of Assignment</label>
                                <select name="place_of_assignment" id="place_of_assignment" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="" disabled selected>Select Place of Assignment</option>
                                    <option value="Zamboanga City" {{ old('place_of_assignment', $employee->place_of_assignment) == 'Zamboanga City' ? 'selected' : '' }}>Zamboanga City</option>
                                    <option value="Pagadian City" {{ old('place_of_assignment', $employee->place_of_assignment) == 'Pagadian City' ? 'selected' : '' }}>Pagadian City</option>
                                </select>
                                @error('place_of_assignment')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="office_email" class="block mb-2 text-sm font-medium text-gray-900">Office Email</label>
                                <input type="email" name="office_email" id="office_email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('office_email', $employee->office_email) }}" placeholder="example@ched.gov.ph" pattern=".+@ched\.gov\.ph">
                                @error('office_email')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900">Mobile Number</label>
                                <input type="tel" name="mobile_number" id="mobile_number" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('mobile_number', $employee->mobile_number) }}" placeholder="+63XXXXXXXXXX" pattern="\+63[0-9]{10}">
                                @error('mobile_number')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="tin" class="block mb-2 text-sm font-medium text-gray-900">TIN</label>
                                <input type="text" name="tin" id="tin" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('tin', $employee->tin) }}" placeholder="Enter TIN">
                                @error('tin')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="gsis" class="block mb-2 text-sm font-medium text-gray-900">GSIS</label>
                                <input type="text" name="gsis" id="gsis" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('gsis', $employee->gsis) }}" placeholder="Enter GSIS">
                                @error('gsis')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="crn" class="block mb-2 text-sm font-medium text-gray-900">CRN</label>
                                <input type="text" name="crn" id="crn" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('crn', $employee->crn) }}" placeholder="Enter CRN">
                                @error('crn')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="sss" class="block mb-2 text-sm font-medium text-gray-900">SSS</label>
                                <input type="text" name="sss" id="sss" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('sss', $employee->sss) }}" placeholder="Enter SSS">
                                @error('sss')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="philhealth" class="block mb-2 text-sm font-medium text-gray-900">PhilHealth</label>
                                <input type="text" name="philhealth" id="philhealth" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('philhealth', $employee->philhealth) }}" placeholder="Enter PhilHealth">
                                @error('philhealth')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
























                            <div class="w-full">
                                <label for="date_employed" class="block mb-2 text-sm font-medium text-gray-900">Date Employed</label>
                                <input type="date" name="date_employed" id="date_employed" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" value="{{ old('date_employed', $employee->date_employed) }}">
                                @error('date_employed')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label for="employment_status" class="block mb-2 text-sm font-medium text-gray-900">Employment Status</label>
                                <select name="employment_status" id="employment_status" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                    <option value="Active" {{ old('employment_status', $employee->employment_status) === 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('employment_status', $employee->employment_status) === 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('employment_status')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-end mt-9">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800">
                                Update User
                            </button>
                        </div>
                    </form>



                </div>

            </div>
        </div>
    </div>
</x-app-layout>
