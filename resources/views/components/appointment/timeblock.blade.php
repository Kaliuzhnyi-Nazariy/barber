<?php
date_default_timezone_set('UTC');

$currentHour = (int) date('G');
$currentMinute = (int) date('i');

$today = new DateTime();

if ($currentHour > 16 || ($currentHour === 16 && $currentMinute >= 30)) {
    $today->modify('+1 day');
}

$startOfWeek = clone $today;
$weekDays = [];

for ($i = 0; $i < 7; $i++) {
    $weekDays[] = [
        'weekday' => $startOfWeek->format('l'),
        'date' => $startOfWeek->format('Y-m-d')
    ];
    $startOfWeek->modify('+1 day');
}
;

?>

<div class="p-4 border rounded-lg mt-4">
    <h5 class="text-center uppercase font">Select a day</h5>

    <ul class="grid md:grid-cols-4 lg:grid-cols-7 gap-2 w-full mt-2">
        <?php foreach ($weekDays as $day): ?>
        <li class="self-center py-3 border rounded-md flex flex-col items-center"
            onclick="handleDayClick('<?php    echo $day['date']; ?>')" id="<?php    echo $day['date'] ?>-li">
            <p><?php    echo $day['weekday'] ?></p>
            <p><?php    echo $day['date'] ?></p>
        </li>
        <?php endforeach; ?>
    </ul>

    <ul class="hidden grid-cols-3 md:grid-cols-6 mt-4" id="time_block">
    </ul>
</div>