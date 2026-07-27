<?php

$reasons = [
    [
        'id' => 'license',
        'icon' => 'icons/licensed.svg',
        'title' => 'Licensed',
        'content' => 'Our team of licensed and insured barbers follow strict cleanliness and sanitation guidelines for a safe and comfortable experience.'
    ],
    [
        'id' => 'master',
        'icon' => 'icons/masters.svg',
        'title' => 'Masters',
        'content' => 'Our barbers are passionate about their craft and aim to provide high-quality haircuts for every client.'
    ],
    [
        'id' => 'trust',
        'icon' => 'icons/trusted.svg',
        'title' => 'Trusted',
        'content' => 'We have a strong online reputation with a 5-star rating from over 100 thousand satisfied clients.'
    ]
]

?>

<section class="pt-34 flex flex-col items-center text-center bg-white px-4 lg:px-17">
    <h2>why choose us</h2>

    <p class="mt-6 md:mt-10 max-w-150">Nulla egestas sapien integer mi fermentum tellus tristique consequat pulvinar
        sagittis
        adipiscing egestas purus
        et mi
        tempus semper id vel prci eu magna in senectus sit eget justo eget.</p>

    <ul class="flex flex-col max-lg:gap-6 mt-10 md:mt-18 md:grid md:grid-cols-3 md:w-full">
        <?php foreach ($reasons as $res): ?>
        <li class="flex flex-col items-center max-w-70 md:justify-self-center">
            <svg class="size-16 shrink-0" id="<?php    echo $res['id'] ?>">
                <use href="{{ asset($res['icon']) }}" id="<?php    echo $res['id'] ?>"></use>
            </svg>

            <h3><?php    echo $res['title'] ?></h3>
            <div class="h-1 25 w-20 bg-(--dark-vanila) mt-2.5"></div>
            <p class="mt-4"><?php    echo $res['content'] ?></p>
        </li>
        <?php endforeach; ?>
    </ul>
</section>