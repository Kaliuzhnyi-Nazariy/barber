<?php

$socialMedias = [
    [
        'id' => 'facebook',
        'image' => 'icons/facebook.svg',
        'link' => 'https://www.facebook.com/'
    ],
    [
        'id' => 'twitter',
        'image' => 'icons/twitter.svg',
        'link' => 'https://x.com/'
    ],
    [
        'id' => 'instagram',
        'image' => 'icons/instagram.svg',
        'link' => 'https://www.instagram.com/'
    ],
    [
        'id' => 'pinterest',
        'image' => 'icons/pinterest.svg',
        'link' => 'https://www.pinterest.com/'
    ],
    [
        'id' => 'linkedin',
        'image' => 'icons/linkedin.svg',
        'link' => 'https://www.linkedin.com/'
    ]
]

?>

<footer class="py-7 bg-(--dark) text-white px-4 lg:px-17 md:flex md:justify-between md:gap-4 md:items-center">
    <p class="text-xs">© Copyright 2022 barbershop - All right reserved</p>
    <ul class="flex items-center justify-between gap-4 mt-6 md:m-0">
        <?php foreach ($socialMedias as $sm): ?>
        <li class="justify-self-center self-center shrink-0 group">
            <a href="<?php    echo $sm['link'] ?>" target="_blank">
                <svg class="max-w-7 max-h-6 shrink-0 flex items-center justify-center self-center group=hover:scale-110 transition-all duration-200 "
                    id="<?php    echo $sm['id'] ?>">
                    <use class="items-center" href="{{ asset($sm['image']) }}" id="<?php    echo $sm['id'] ?>"></use>
                </svg>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</footer>