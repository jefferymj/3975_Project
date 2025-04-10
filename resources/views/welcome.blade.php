@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block">Discover the World of</span>
            <span class="block text-green-600">Plants with AI</span>
        </h1>
        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
            Powered by Pl@ntNet API, our platform helps you identify plants using advanced artificial intelligence.
        </p>
    </div>

    <!-- Features Section -->
    <div class="mt-12 grid gap-8 md:grid-cols-3">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-green-600 text-2xl mb-4">🌿</div>
            <h3 class="text-lg font-medium text-gray-900">Plant Identification</h3>
            <p class="mt-2 text-gray-500">Upload a photo of any plant and our AI will help you identify it instantly.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-green-600 text-2xl mb-4">📚</div>
            <h3 class="text-lg font-medium text-gray-900">Extensive Database</h3>
            <p class="mt-2 text-gray-500">Access a comprehensive database of plant species from around the world.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="text-green-600 text-2xl mb-4">🔍</div>
            <h3 class="text-lg font-medium text-gray-900">Detailed Information</h3>
            <p class="mt-2 text-gray-500">Get detailed information about plant species, including care instructions and characteristics.</p>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="mt-12 text-center">
        <a href="{{ route('register') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 transition duration-150 ease-in-out">
            Get Started
            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
    </div>
@endsection
