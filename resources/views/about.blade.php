<x-layout>
<x-slot:title>{{ $title }}</x-slot:title>
<section class="bg-gray-100">
    <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
            <div class="max-w-lg ">
                <p class="mt-4 text-gray-600 text-lg"> Selamat datang di <strong>Cukurucook</strong>
                    ! Kami menyediakan berbagai resep masakan. 
                    Setiap resep kami dilengkapi dengan panduan mudah dan tips praktis, 
                    membantu Anda membuat hidangan lezat dengan sempurna.
                    Yuk, mulai petualangan memasak bersama kami!
                </p>
                <div class="mt-8">
                    <a href="#" class="text-blue-500 hover:text-blue-600 font-medium">Pelajari lebih lanjut
                        <span class="ml-2">&#8594;</span></a>
                </div>
            </div>
            <div class="mt-12 md:mt-0">
                <img src="/images/cooking.jpg" alt="About Us Image" class="object-cover rounded-lg shadow-md">
            </div>
        </div>
    </div>
</section>
</x-layout>
