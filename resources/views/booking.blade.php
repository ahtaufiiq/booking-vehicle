<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Vehicle') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('booking') }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="vehicle_id" :value="__('Vehicle')" />
                            <x-select-input id="vehicle_id" class="block mt-1 w-full" type="text" :collection=$vehicles name="vehicle_id" required autofocus />
                            <x-input-error :messages="$errors->get('vehicle_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="driver_id" :value="__('Driver')" />
                            <x-select-input id="driver_id" class="block mt-1 w-full" type="text" :collection=$drivers name="driver_id" required autofocus />
                            <x-input-error :messages="$errors->get('driver_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="first_approver_id" :value="__('First Approver')" />
                            <x-select-input id="first_approver_id" class="block mt-1 w-full" type="text" :collection=$approvers name="first_approver_id" required autofocus />
                            <x-input-error :messages="$errors->get('first_approver_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="second_approver_id" :value="__('Second Approver')" />
                            <x-select-input id="second_approver_id" class="block mt-1 w-full" type="text" :collection=$approvers name="second_approver_id" required autofocus />
                            <x-input-error :messages="$errors->get('second_approver_id')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="date" :value="__('Booking Date')" />
                            <x-text-input id="date" class="block mt-1 w-full" type="date" name="date" required autofocus />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>
                        
                
                        <div class="flex items-center justify-start mt-4">
                            <x-primary-button>
                                {{ __('Book') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        

</x-app-layout>
