@extends('layouts.app')

@section('content')
    <!-- Plant Identification Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl font-bold mb-4">Identify Your Plants</h1>
            <p class="mb-4">Use our advanced plant identification tool to discover what plants you have.</p>
            <a href="{{ url('/identify') }}" class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-150">
                Launch Identifier
            </a>
        </div>
    </div>

    <!-- Plants Info Card Section -->
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <h1 class="text-2xl font-bold mb-4">Plants Information</h1>
            <p class="mb-4">Detailed information about your identified plants will be displayed here.</p>
            <p class="text-green-600 hover:text-green-800">
                <a href="#" class="transition duration-150">View More Details →</a>
            </p>
        </div>
    </div>
@endsection
