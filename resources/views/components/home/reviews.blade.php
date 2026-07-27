<section class="py-35 px-4 lg:px-17 flex items-center justify-around bg-white flex-col lg:flex-row">
    <div class="flex flex-col items-center">
        <svg class="size-12" id="google">
            <use href="{{ asset('icons/google.svg') }}" id="google"></use>
        </svg>
        <h3 class="mt-10">GOOGLE</h3>
        <p class="text-3xl md:text-4xl lg:text-5xl xl:text-[92px] font-bold mt-3">4.9</p>
        <p class="mt-2">⭐⭐⭐⭐⭐</p>
        <p class="text-xs 2xl:text-lg md:text-2xl mt-2">196 reviews</p>
    </div>

    <div class="border border-(--dark-vanila) text-center pt-20 px-5 pb-15  xl:px-10 relative max-w-150 mt-28 lg:mt-0">
        {{-- <div class=" md:pb-25 size-27 rounded-full absolute top-0 left-1/2 -translate-1/2 bg-amber-400"></div> --}}

        <img src="{{ asset('comment_man.jpg') }}"
            class="size-27 rounded-full absolute top-0 left-1/2 -translate-1/2 object-cover" />

        <p>⭐⭐⭐⭐⭐</p>

        <h3 class="mt-5">THE BEST BARBER Services</h3>
        <p class="mt-2 text-xs lg:text-[16px] xl:text-lg">Et proin ut in dignissim sem non a nullam magna lectus urna et
            dui quam tellus imperdiet sit
            purus at fringilla
            scelerisque diam amet fermentum orci fringilla aliquet nulla lectus erat eu auctor</p>

        <h4 class="mt-4">SAM HOUSTON</h4>
    </div>

    <div class="flex flex-col items-center mt-12 lg:mt-0">
        <svg class="size-12" id="tripadvisor">
            <use href="{{ asset('icons/tripadvisor.svg') }}" id="tripadvisor"></use>
        </svg>
        <h3 class="mt-10">tripadvisor</h3>
        <p class="text-3xl md:text-4xl lg:text-5xl xl:text-[92px] font-bold mt-3">5.0</p>
        <p class="mt-2">⭐⭐⭐⭐⭐</p>
        <p class="text-xs 2xl:text-lg md:text-2xl mt-2">196 reviews</p>
    </div>
</section>