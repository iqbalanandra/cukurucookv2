<x-layout>
    <x-slot:title>{{ $recipe->title }}</x-slot:title>

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <!-- Back Button -->
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-blue-500 hover:text-blue-700 mb-4">
            <!-- Arrow Icon (use Font Awesome, Heroicons, or other icon libraries as desired) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>

        <!-- Recipe Content -->
        <img src="{{ asset('storage/' . ($recipe->photo ?? 'food.png')) }}" alt="Recipe Image" class="w-full h-64 object-cover rounded-lg">
        <h1 class="text-2xl font-bold mt-4">{{ $recipe->title }}</h1>
        <h2 class="text-sm text-gray-500">Posted By: {{ $recipe->user->username }}</h2>
        <p class="text-gray-600 mt-4">{!! nl2br(e($recipe->description)) !!}</p>
    </div>
</x-layout>
