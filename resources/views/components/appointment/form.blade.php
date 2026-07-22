<div class="md:col-start-2">
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

    <form method="POST" action="/create/appointment" class="mt-4">
        @csrf
        <input type="hidden" id="input_date" name="date">
        <input type="hidden" id="input_time" name="time">
        <input type="hidden" id="input_services" name="services">

        <button type="submit" id="button" disabled
            class="w-full py-3 cursor-pointer bg-(--dark-vanila) disabled:opacity-50 disabled:cursor-not-allowed">Make
            a reservation</button>
    </form>
</div>