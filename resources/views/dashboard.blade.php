<!-- resources/views/dashboard.blade.php -->
<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Card Dummy 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Nasi Goreng" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Nasi Goreng</h3>
                <p class="text-gray-600 mt-2">Nasi goreng lezat dengan bumbu khas yang menggugah selera.</p>
            </div>
        </div>

        <!-- Card Dummy 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Ayam Bakar" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Ayam Bakar</h3>
                <p class="text-gray-600 mt-2">Ayam bakar yang dimasak dengan bumbu rempah pilihan.</p>
            </div>
        </div>

        <!-- Card Dummy 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Mie Goreng" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Mie Goreng</h3>
                <p class="text-gray-600 mt-2">Mie goreng pedas ala rumahan yang sederhana namun lezat.</p>
            </div>
        </div>

        <!-- Card Dummy 4 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Soto Ayam" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Soto Ayam</h3>
                <p class="text-gray-600 mt-2">Soto ayam berkuah bening yang gurih dan menggugah selera.</p>
            </div>
        </div>

        <!-- Card Dummy 5 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Rendang" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Rendang</h3>
                <p class="text-gray-600 mt-2">Rendang daging sapi khas Padang dengan bumbu meresap.</p>
            </div>
        </div>

        <!-- Card Dummy 6 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <img src="{{ asset('images/resep1.jpg') }}" alt="Resep Gado-Gado" class="h-48 w-full object-cover">
            <div class="p-4">
                <h3 class="text-lg font-semibold">Resep Gado-Gado</h3>
                <p class="text-gray-600 mt-2">Salad sayuran khas Indonesia dengan bumbu kacang.</p>
            </div>
        </div>
    </div>

</x-layout>
