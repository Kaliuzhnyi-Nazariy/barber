@props(['services'])

<div>
    <h3 class="font-bold">Services:</h3>
    <ul class="col-start-1 col-end-1 mt-2">
        <?php foreach ($services as $service): ?>
        <li class="flex items-center justify-between py-2  not-first:border-t"
            onclick="handleService({id: '<?php    echo $service['id'] ?>' , service: '<?php    echo $service['service']; ?>', price: <?php    echo $service['price']; ?> })">
            <h4>
                <?php    echo $service['service'] ?>
            </h4>
            <p class="text-(--dark-vanila) font-semibold">$<?php    echo $service['price'] ?> USD</p>
        </li>
        <?php endforeach; ?>
    </ul>
</div>