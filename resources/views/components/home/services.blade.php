<?php

$services = [
    [
        'id' => 'adult',
        'icon' => 'icons/adult_haircut.svg',
        'title' => 'Adult haircut',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 39
    ],
    [
        'id' => 'beard_trim',
        'icon' => 'icons/beard_trim.svg',
        'title' => 'Beard Trim',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 29
    ],
    [
        'id' => 'moisturize',
        'icon' => 'icons/parfume.svg',
        'title' => 'Scalp Moisturizing',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 10
    ],
    [
        'id' => 'kids',
        'icon' => 'icons/kids.svg',
        'title' => 'Kids Haircut',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 19
    ],
    [
        'id' => 'neck',
        'icon' => 'icons/neck.svg',
        'title' => 'Neck Shave',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 39
    ],
    [
        'id' => 'beard',
        'icon' => 'icons/beard.svg',
        'title' => 'Beard Grooming',
        'description' => 'Nulla egestas sapien integer mi fermentum tellus tristique consequatolm pulvinar
                    sagittis',
        'price' => 49
    ]
]

?>


<section id="services" class="mt-36 bg-white p-4 flex flex-col items-center lg:bg-transparent mb-10 lg:mb-38 lg:px-17">
    <h2 class="text-center">
        Browse our services
    </h2>
    <p class="text-sm md:text-[16px] text-center max-w-148 mt-4 md:mt-8">Nulla egestas sapien integer mi fermentum
        tellus tristique
        consequat pulvinar sagittis adipiscing egestas purus et mi tempus semper id vel prci eu magna in senectus sit
        eget justo eget.</p>

    <ul
        class="max-w-5xl bg-white flex flex-col gap-8 md:grid md:grid-cols-2 mt-10 md:mt-18 lg:gap-22 p-6 md:p-12 lg:p-24 shadow-lg w-full">
        <?php foreach ($services as $serv): ?>
        <li class="w-full flex items-start gap-4">
            <svg class="w-16 h-16 shrink-0" id="<?php    echo $serv['id'] ?>">
                <use href="{{ asset($serv['icon']) }}" id="<?php    echo $serv['id'] ?>" class=""></use>
            </svg>

            <div class="max-w-75">
                <h3><?php    echo $serv['title'] ?></h3>
                <p class="mt-2"><?php    echo $serv['description'] ?></p>
                <p class="text-lg font-extrabold lg:text-2xl mt-4">$<?php    echo $serv['price'] ?> USD</p>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>

    <a href="/book/appointment"
        class="font-extrabold uppercase px-8 py-5 bg-(--dark-vanila) text-black border-2 border-transparent hover:bg-transparent hover:border-(--dark-vanila) hover:text-(--dark-vanila) focus:bg-transparent focus:border-(--dark-vanila) focus:text-(--dark-vanila) focus:outline-none transition-colors durantion-200 cursor-pointer mt-10">Book
        an
        Appointment</a>
</section>