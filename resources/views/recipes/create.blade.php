<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mx-auto py-8">
        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-700">Title</label>
                <input type="text" name="title" required class="w-full mt-2 p-2 border border-gray-300 rounded">
            </div>
            <div>
                <label class="block text-gray-700">Description</label>
                <textarea name="description" required class="w-full mt-2 p-2 border border-gray-300 rounded" rows="5"></textarea>
            </div>
            <div>
                <label class="block text-gray-700">Photo</label>
                <input type="file" name="photo" accept="image/*" class="w-full mt-2 p-2 border border-gray-300 rounded">
            </div>
            <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">Create</button>
        </form>
    </div>
</x-layout>
