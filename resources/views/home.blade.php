<x-layout>
    <section class="bg-cover bg-top w-full text-white pt-79 pb-61 flex flex-col items-center relative "
        style="background-image: url('{{ asset('hero_header.png') }}')">
        <div class="lg:w-5xl text-center px-4">
            <h1 class="uppercase text-4xl min-[1024px]:text-7xl font-bold">The ultimate convenience for busy people</h1>
            <p class="text-xs md:font-2xl mt-4">Experience the Convenience of In-Home Barber Services</p>

            <div
                class="flex flex-col md:flex-row gap-4 lg:gap-12 mt-8 justify-center text-base md:text-lg font-extrabold">
                <a href="/book/appointment"
                    class="uppercase px-8 py-5 bg-(--dark-vanila) text-black border-2 border-transparent hover:bg-transparent hover:border-(--dark-vanila) hover:text-(--dark-vanila) focus:bg-transparent focus:border-(--dark-vanila) focus:text-(--dark-vanila) focus:outline-none transition-colors durantion-200 cursor-pointer">Book
                    an
                    Appointment</a>
                <button class="uppercase px-8 py-5 border-2 border-white transition-colors duration-200 cursor-pointer 
                   hover:bg-white hover:text-black hover:mix-blend-screen"> browse services
                </button>
            </div>
        </div>
        {{-- <div class="absolute w-310 py-9 bg-white bottom-0
                translate-y-1/2 px-17 text-black grid grid-cols-3 gap-43 items-center">
            <div class="flex flex-col items-center">
                <svg id="address" class="size-12">
                    <use href="{{ asset('icons/address.svg') }}" id="address"></use>
                </svg>
                <h4 class="font-extrabold uppercase text-2xl mt-2">address</h4>
                <div class="w-16 h-1 25 bg-(--dark-vanila)"></div>
                <p class="mt-4 text-lg font-bold text-center">3696 Lynden Road, Lefroy Ontario canada</p>
            </div>

            <div class="flex flex-col items-center w-full">
                <svg id="phone" class="size-12">
                    <use href="{{ asset('icons/phone.svg') }}" id="phone"></use>
                </svg>
                <h4 class="font-extrabold uppercase text-2xl mt-2">Phone</h4>
                <div class="w-16 h-1 25 bg-(--dark-vanila)"></div>
                <p class="mt-4 text-lg font-bold">+62(123)-456-7890</p>
                <p class="text-lg font-bold">+62(123)-456-7890</p>

            </div>

            <div class="flex flex-col items-center">
                <svg id="hours" class="size-12">
                    <use href="{{ asset('icons/hours.svg') }}" id="hours"></use>
                </svg>
                <h4 class="font-extrabold uppercase text-2xl mt-2">hours</h4>
                <div class="w-16 h-1 25 bg-(--dark-vanila)"></div>
                <p class="mt-4 text-lg font-bold">Mon – Sat: 9AM – 8PM</p>
                <p class="text-lg font-bold">Sun: 9AM – 6PM</p>

            </div>
        </div> --}}

    </section>
</x-layout>