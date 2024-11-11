<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($recipes as $recipe)
            <x-recipe-card :recipe="$recipe" />
        @endforeach
    </div>
</x-layout>
