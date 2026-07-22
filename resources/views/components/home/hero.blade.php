<section class="w-full relative">
    <div class="bg-cover bg-top w-full text-white pt-79 pb-61 flex flex-col items-center relative "
        style="background-image: url('{{ asset('hero_header.png') }}')">
        <div class="lg:w-5xl text-center px-4">
            <h1 class="uppercase text-4xl min-[1024px]:text-7xl font-bold">The ultimate convenience for busy
                people
            </h1>
            <p class="text-xs md:font-2xl mt-4">Experience the Convenience of In-Home Barber Services</p>

            <div
                class="flex flex-col md:flex-row gap-4 lg:gap-12 mt-8 justify-center text-base md:text-lg font-extrabold">
                <a href="/book/appointment"
                    class="uppercase px-8 py-5 bg-(--dark-vanila) text-black border-2 border-transparent hover:bg-transparent hover:border-(--dark-vanila) hover:text-(--dark-vanila) focus:bg-transparent focus:border-(--dark-vanila) focus:text-(--dark-vanila) focus:outline-none transition-colors durantion-200 cursor-pointer">Book
                    an
                    Appointment</a>
                <a href="#services" class="uppercase px-8 py-5 border-2 border-white transition-colors duration-200 cursor-pointer 
                    hover:bg-white hover:text-black hover:mix-blend-screen"> browse services
                </a>
            </div>
        </div>
    </div>


    <x-home.contact />
</section>