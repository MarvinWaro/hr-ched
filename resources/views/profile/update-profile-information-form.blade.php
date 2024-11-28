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

                <div class="mt-2" x-show="! photoPreview">
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
        <div class="col-span-6 sm:col-span-4">
            <x-label for="employee_no" value="{{ __('Employee Number') }}" />
            <x-input id="employee_no" type="text" class="mt-1 block w-full" wire:model="state.employee_no" required />
            <x-input-error for="employee_no" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="birthdate" value="{{ __('Birthdate') }}" />
            <x-input id="birthdate" type="date" class="mt-1 block w-full" wire:model="state.birthdate" />
            <x-input-error for="birthdate" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="gender" value="{{ __('Gender') }}" />
            <select id="gender" class="mt-1 block w-full form-select rounded-md border-gray-300 " wire:model="state.gender">
                <option value="" disabled selected>{{ __('Select Gender') }}</option>
                <option value="Male">{{ __('Male') }}</option>
                <option value="Female">{{ __('Female') }}</option>
            </select>
            <x-input-error for="gender" class="mt-2" />
        </div>

        <!-- Marital Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="marital_status" value="{{ __('Marital Status') }}" />
            <select id="marital_status" class="mt-1 block w-full form-select rounded-md border-gray-300 " wire:model="state.marital_status">
                <option value="" disabled selected>{{ __('Select Marital Status') }}</option>
                <option value="Single">{{ __('Single') }}</option>
                <option value="Married">{{ __('Married') }}</option>
                <option value="Separated">{{ __('Separated') }}</option>
                <option value="Divorced">{{ __('Divorced') }}</option>
                <option value="Widowed">{{ __('Widowed') }}</option>
            </select>
            <x-input-error for="marital_status" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" />
            <x-input-error for="address" class="mt-2" />
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
