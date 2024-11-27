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
                    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="w-full">
                                <label for="employee_no" class="block mb-2 text-sm font-medium text-gray-900">Employee #</label>
                                <input type="text" name="employee_no" id="employee_no" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Enter Employee #" required>
                            </div>
                            <div class="w-full">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Enter Name" required>
                            </div>
                            <div class="w-full">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Enter Email" required>
                            </div>
                            <div class="w-full">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Enter Password" required>
                            </div>
                            <div class="w-full">
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" placeholder="Confirm Password" required>
                            </div>
                            <div class="w-full">
                                <label for="usertype" class="block mb-2 text-sm font-medium text-gray-900">User Type</label>
                                <select name="usertype" id="usertype" class="bg-gray-50 border border-gray-300 text-sm rounded-lg w-full p-2.5" required>
                                    <option value="" disabled selected>Select User Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="employee">Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end mt-9">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800">
                                Save User
                            </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
</x-app-layout>
