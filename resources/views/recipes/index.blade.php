<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('recipes.create') }}" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Create New Recipe</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-4">
            @foreach($recipes as $recipe)
                <div class="flex items-center bg-white rounded-lg shadow p-4">
                    <!-- Image of the Recipe -->
                    <img class="w-24 h-24 object-cover rounded-lg" src="{{ asset('storage/' . ($recipe->photo ?? 'food.png')) }}" alt="{{ $recipe->title }}">

                    <!-- Title -->
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-900">{{ $recipe->title }}</h4>
                    </div>

                    <!-- Actions (Edit and Delete) aligned to the far right -->
                    <div class="ml-auto flex space-x-2">
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Edit</a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
