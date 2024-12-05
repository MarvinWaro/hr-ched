<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <input type="file" id="photo" class="hidden" wire:model.live="photo"
                    x-ref="photo" x-on:change="photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result; }; reader.readAsDataURL($refs.photo.files[0]);" />

                <x-label for="photo" value="{{ __('Photo') }}" />

                <div class="mt-2 mb-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full size-20 object-cover">
                </div>

                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'"></span>
                </div>

                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Employee Number -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="employee_no" value="{{ __('Employee Number') }}" />
            <x-input id="employee_no" type="text" class="mt-1 block w-full" wire:model="state.employee_no" required />
            <x-input-error for="employee_no" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="birthdate" value="{{ __('Birthdate') }}" />
            <x-input id="birthdate" type="date" class="mt-1 block w-full" wire:model="state.birthdate" />
            <x-input-error for="birthdate" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="gender" value="{{ __('Gender') }}" />
            <select id="gender" class="mt-1 block w-full form-select rounded-md border-gray-300"
                    wire:model="state.gender">
                <option value="" {{ $this->state['gender'] === null ? 'selected' : '' }}>
                    {{ __('Select Gender') }}
                </option>
                <option value="Male">{{ __('Male') }}</option>
                <option value="Female">{{ __('Female') }}</option>
            </select>
            <x-input-error for="gender" class="mt-2" />
        </div>



        <!-- Marital Status -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="marital_status" value="{{ __('Marital Status') }}" />
            <select id="marital_status" class="mt-1 block w-full form-select rounded-md border-gray-300" wire:model="state.marital_status">
                <option value="" {{ $this->state['marital_status'] === null ? 'selected' : '' }}>
                    {{ __('Select Marital Status') }}
                </option>
                <option value="Single">{{ __('Single') }}</option>
                <option value="Married">{{ __('Married') }}</option>
                <option value="Separated">{{ __('Separated') }}</option>
                <option value="Divorced">{{ __('Divorced') }}</option>
                <option value="Widowed">{{ __('Widowed') }}</option>
            </select>
            <x-input-error for="marital_status" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-6">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" />
            <x-input-error for="address" class="mt-2" />
        </div>

        <!-- Credentials Section -->
        {{-- <x-label for="credentials" class="col-span-6 sm:col-span-6" value="{{ __('Credentials') }}" /> --}}

        <!-- Department -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="department" value="{{ __('Department') }}" />
            <select id="department" class="mt-1 block w-full form-select rounded-md border-gray-300"
                wire:model="state.department"
                @if(auth()->user()->usertype == 'admin')
                    {{ $this->state['department'] === null ? 'selected' : '' }}
                @else
                    disabled
                @endif
            >
                <option value="" {{ $this->state['department'] === null ? 'selected' : '' }}>
                    {{ __('Select Department') }}
                </option>
                <option value="Admin Department">{{ __('Admin Department') }}</option>
                <option value="Technical Department">{{ __('Technical Department') }}</option>
            </select>

            <x-input-error for="department" class="mt-2" />
        </div>

        <!-- Payroll Position -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="payroll_position" value="{{ __('Payroll Position') }}" />
            <select id="payroll_position" class="mt-1 block w-full form-select rounded-md border-gray-300"
                wire:model="state.payroll_position"
                @if(auth()->user()->usertype == 'admin')
                    {{ $this->state['payroll_position'] === null ? 'selected' : '' }}
                @else
                    disabled
                @endif
            >
                <option value="" {{ $this->state['payroll_position'] === null ? 'selected' : '' }}>
                    {{ __('Select Payroll Position') }}
                </option>
                <option value="Director IV">{{ __('Director IV') }}</option>
                <option value="Chief Administrative Officer">{{ __('Chief Administrative Officer') }}</option>
                <option value="Supervising Education Program Specialist">{{ __('Supervising Education Program Specialist') }}</option>
                <option value="Education Supervisor II">{{ __('Education Supervisor II') }}</option>
                <option value="Education Program Specialist II">{{ __('Education Program Specialist II') }}</option>
                <option value="Administrative Officer III">{{ __('Administrative Officer III') }}</option>
                <option value="Administrative Assistant III">{{ __('Administrative Assistant III') }}</option>
                <option value="Administrative Aide VI">{{ __('Administrative Aide VI') }}</option>
                <option value="Administrative Aide III">{{ __('Administrative Aide III') }}</option>
                <option value="Project Technical Staff III">{{ __('Project Technical Staff III') }}</option>
                <option value="Project Technical Staff II">{{ __('Project Technical Staff II') }}</option>
                <option value="Project Technical Staff I">{{ __('Project Technical Staff I') }}</option>
                <option value="Project Support Staff IV">{{ __('Project Support Staff IV') }}</option>
                <option value="Job Order">{{ __('Job Order') }}</option>
            </select>
            <x-input-error for="payroll_position" class="mt-2" />
        </div>


        <div class="col-span-6 sm:col-span-3">
            <x-label for="designation" value="{{ __('Designation') }}" />
            <x-input id="designation" type="text" class="mt-1 block w-full text-gray-500" wire:model="state.designation" disabled />
            <x-input-error for="designation" class="mt-2" />
        </div>


        <!-- Place of Assignment -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="place_of_assignment" value="{{ __('Place of Assignment') }}" />
            <select id="place_of_assignment" class="mt-1 block w-full form-select rounded-md border-gray-300"
                wire:model="state.place_of_assignment"
                @if(auth()->user()->usertype == 'admin')
                    {{ $this->state['place_of_assignment'] === null ? 'selected' : '' }}
                @else
                    disabled
                @endif
            >
                <option value="" {{ $this->state['place_of_assignment'] === null ? 'selected' : '' }}>
                    {{ __('Select Place of Assignment') }}
                </option>
                <option value="Zamboanga City">{{ __('Zamboanga City') }}</option>
                <option value="Pagadian City">{{ __('Pagadian City') }}</option>
            </select>
            <x-input-error for="place_of_assignment" class="mt-2" />
        </div>


        <!-- Office Email (restricted to @ched.gov.ph) -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="office_email" value="{{ __('Office Email') }}" />
            <x-input id="office_email" type="email" class="mt-1 block w-full" wire:model="state.office_email" />
            <x-input-error for="office_email" class="mt-2" />
        </div>

        <!-- Mobile Number (starting with +63) -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="mobile_number" value="{{ __('Mobile Number') }}" />
            <x-input id="mobile_number" type="tel" class="mt-1 block w-full" wire:model="state.mobile_number" placeholder="+63XXXXXXXXXX" />
            <x-input-error for="mobile_number" class="mt-2" />
        </div>

        <!-- TIN -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="tin" value="{{ __('TIN') }}" />
            <x-input id="tin" type="text" class="mt-1 block w-full" wire:model="state.tin" />
            <x-input-error for="tin" class="mt-2" />
        </div>

        <!-- GSIS -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="gsis" value="{{ __('GSIS') }}" />
            <x-input id="gsis" type="text" class="mt-1 block w-full" wire:model="state.gsis" />
            <x-input-error for="gsis" class="mt-2" />
        </div>

        <!-- CRN -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="crn" value="{{ __('CRN') }}" />
            <x-input id="crn" type="text" class="mt-1 block w-full" wire:model="state.crn" />
            <x-input-error for="crn" class="mt-2" />
        </div>

        <!-- SSS -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="sss" value="{{ __('SSS') }}" />
            <x-input id="sss" type="text" class="mt-1 block w-full" wire:model="state.sss" />
            <x-input-error for="sss" class="mt-2" />
        </div>

        <!-- PhilHealth -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="philhealth" value="{{ __('PhilHealth') }}" />
            <x-input id="philhealth" type="text" class="mt-1 block w-full" wire:model="state.philhealth" />
            <x-input-error for="philhealth" class="mt-2" />
        </div>

        <!-- Date Employed -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="date_employed" value="{{ __('Date Employed') }}" />
            <x-input id="date_employed" type="date" class="mt-1 block w-full text-gray-500" wire:model="state.date_employed" disabled/>
            <x-input-error for="date_employed" class="mt-2" />
        </div>

        <!-- Employment Status -->
        <div class="col-span-6 sm:col-span-3">
            <x-label for="employment_status" value="{{ __('Employment Status') }}" />
            <select id="employment_status" class="mt-1 block w-full form-select rounded-md border-gray-300" wire:model="state.employment_status"
                @if(auth()->user()->is_admin)
                    {{ $this->state['employment_status'] === null ? 'selected' : '' }}
                @else
                    disabled
                @endif
            >
                <option value="" {{ $this->state['employment_status'] === null ? 'selected' : '' }}>
                    {{ __('Select Employment Status') }}
                </option>
                <option value="Active">{{ __('Active') }}</option>
                <option value="Inactive">{{ __('Inactive') }}</option>
            </select>
            <x-input-error for="employment_status" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>


