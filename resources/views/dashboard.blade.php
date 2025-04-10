@extends('layouts.app')

@section('content')
    <!-- Plant Identification Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl font-bold mb-4">Identify Your Plants</h1>
            <p class="mb-4">Use our advanced plant identification tool to discover what plants you have.</p>
            <x-primary-button>
                <a href="{{ route('identify') }}" class="text-white no-underline">Launch Identifier</a>
            </x-primary-button>
        </div>
    </div>

    <!-- Plants Info Card Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl font-bold mb-4">Plants Information</h1>
            <p class="mb-4">Detailed information about your identified plants will be displayed here.</p>
            
            <!-- Modal for plant details -->
            <x-modal name="plant-details" :show="false">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-900">
                        Plant Details
                    </h2>

                    <div class="mt-4">
                        <p class="text-sm text-gray-600">
                            Detailed plant information will be displayed here.
                        </p>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            Close
                        </x-secondary-button>
                    </div>
                </div>
            </x-modal>

            <x-secondary-button x-data x-on:click="$dispatch('open-modal', 'plant-details')">
                View More Details
            </x-secondary-button>
        </div>
    </div>
@endsection
