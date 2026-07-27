<div class="md:col-start-2 flex flex-col gap-1">
    <p>
        <b>Date: </b>
        <span id="chosen_date">
            Date is not chosen
        </span>
    </p>
    <p>
        <b>Time: </b>
        <span id="chosen_time">
            Time is not chosen
        </span>
    </p>

    <h3 class="font-bold">Services:</h3>
    <ul id="services_list">
        <li><small>No services</small></li>
    </ul>

    <div class="flex justify-between">
        <h4 class="font-bold">Total:</h4>
        <p id="total">$0 USD</p>
    </div>

    <form method="POST" action="/create/appointment" class="mt-4 flex flex-col gap-2">
        @csrf
        <div class="w-full flex items-center gap-2">
            <label for="name"><b>Name: </b></label>
            <input type="text" id="name" name="name"
                class="outline-none w-full border-b border-b-(--dark)/50 focus-within:border-b-(--dark)"
                placeholder="Enter your name" oninput="handleInput('name')">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="email"><b>Email: </b></label>
            <input type="email" id="email" name="email"
                class="outline-none w-full border-b border-b-(--dark)/50 focus-within:border-b-(--dark)"
                placeholder="Enter your email" oninput="handleInput('email')">
        </div>
        <div class="w-full flex items-center gap-2">
            <label for="phone"><b>Phone: </b></label>
            <input type="text" id="phone" name="phone"
                class="outline-none w-full border-b border-b-(--dark)/50 focus-within:border-b-(--dark)"
                placeholder="Enter your phone" oninput="handleInput('phone')">
        </div>
        <input type="hidden" id="input_date" name="date">
        <input type="hidden" id="input_time" name="time">
        <input type="hidden" id="input_services" name="services">

        <button type="submit" id="button" disabled
            class="w-full py-3 cursor-pointer bg-(--dark-vanila) disabled:opacity-50 disabled:cursor-not-allowed mt-4">Make
            a reservation</button>
    </form>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>