@props(['services'])

<form method="POST" action="/create/appointment"
    class="bg-white p-4 mt-10 text-black lg:absolute lg:-translate-x-1/12 lg:translate-y-1/8 lg:top-0 lg:right-0 xl:w-150 xl:h-150 md:p-6 lg:p-10">
    @csrf
    <div>
        <label class="uppercase font-bold" for="name">full name</label>
        <input type="text" id="name" name="name" class="w-full border-b-2" oninput="handleInput('name')">
    </div>

    <div class="mt-7 flex flex-col gap-7 xl:flex-row xl:gap-4">
        <div class="w-full xl:w-1/2">
            <label class="uppercase font-bold block mb-1 text-sm text-gray-700" for="input_date">date</label>
            <input type="date" name="date" id="input_date"
                class="w-full border-b-2 py-1 outline-none focus:border-(--dark-vanila)"
                min="{{ now()->format('Y-m-d') }}" max="{{ now()->addWeek()->format('Y-m-d') }}"
                oninput="handleDate(this.value)">
        </div>

        <div class="w-full xl:w-1/2">
            <label class="uppercase font-bold block mb-1 text-sm text-gray-700" for="input_time">time</label>
            <select disabled name="time" id="input_time"
                class="w-full border-b-2 py-1 bg-transparent outline-none focus:border-amber-500 disabled:opacity-50 disabled:cursor-not-allowed"
                onchange="handleTime(
                        this.value)">
                <option value="">Choose date first</option>
            </select>
        </div>
    </div>

    <div class="mt-7 flex flex-col gap-7 xl:flex-row xl:gap-4">
        <div>
            <label class="uppercase font-bold" for="phone">phone number</label>
            <input type="text" id="phone" name="phone" class="w-full border-b-2" oninput="handleInput('phone')">
        </div>

        <div><label class="uppercase font-bold" for="email">Email address</label>
            <input type="email" id="email" name="email" class="w-full border-b-2" oninput="handleInput('email')">
        </div>
    </div>

    <div class="mt-7">
        <label for="messge" class="uppercase font-bold">Select service</label>
        <input type="hidden" id="input_services" name="services">
        <ul class="grid grid-cols-1 gap-2 mt-4 md:grid-cols-3">
            <?php foreach ($services as $ser): ?>
            <li id="service-{{ $ser->id }}" onclick="handleServicePick({{ $ser }})"
                class="cursor-pointer p-3 border rounded transition-colors duration-200">
                <div class="flex justify-between">
                    <h4>
                        <?php    echo $ser['service'] ?>
                    </h4>
                    <span id="counter" class="hidden text-xs service-counter"></span>
                </div>
                <div class="flex justify-between items-center mt-1">
                    <p class="text-(--dark-vanila) font-semibold">$<?php    echo $ser['price'] ?> USD</p>
                    <button id="delete-button-{{ $ser->id }}" type="button"
                        onclick="handleDeleteService(event, <?php    echo $ser['id'] ?>)"
                        class="hidden rounded-sm cursor-pointer text-red-500 bg-black/5 hover:bg-black/10 transition-colors duration-150 px-3 py-0.5">Delete</button>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <button type="submit" disabled id="button"
        class="w-full py-3 cursor-pointer bg-(--dark-vanila) disabled:opacity-50 disabled:cursor-not-allowed mt-4 uppercase font-extrabold ">book
        an
        appointment</button>

</form>