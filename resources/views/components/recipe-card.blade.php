<a href="{{ route('recipes.show', $recipe->id) }}">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('storage/' . ($recipe->photo ?? 'food.png')) }}" alt="Recipe Image" class="h-48 w-full object-cover">
        <div class="p-4">
            <h3 class="text-lg font-semibold">{{ $recipe->title }}</h3>
            <h2 class="text-xs mt-1 text-gray-500">Posted By: {{ $recipe->user->username }}</h2>
            <p class="text-gray-600 mt-2">{{ Str::limit($recipe->description, 100) }}</p>
        </div>
    </div>
</a>
