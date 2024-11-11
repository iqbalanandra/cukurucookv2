<!-- resources/views/dashboard.blade.php -->
<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Dummy 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Nasi Goreng" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Nasi Goreng</h3>
                <h2 class="text-xs mt-1 text-gray-500">Posted By : xxxx</h2>
                <!-- Deskripsi Singkat -->
                <p class="text-gray-600 mt-2">Nasi goreng lezat dengan bumbu khas yang menggugah selera.</p>
            </div>
        </div>


</x-layout>
