@props(['services'])

<section class="text-white relative">
    <div class="pt-20 pb-18 px-10 bg-cover" style="background-image: url({{ asset('home_reservation_hero.png') }});">
        <div class="max-w-123">
            <h2 class="text-center lg:text-left">make an appointment</h2>
            <p class="mt-7">
                Nulla egestas sapien integer mi fermentum tellus tristique consequat pulvinar sagittis adipiscing
                egestas
                purus et mi
                tempus semper id vel prci eu magna in senectus sit eget justo
            </p>
        </div>

        <ul class="flex flex-col gap-6 mt-5">
            <li class="flex gap-5 items-center"><svg
                    class="bg-white shrink-0 size-13 p-2 md:p-4 md:size-17 flex items-center justify-center"
                    id="contact-phone">
                    <use id="contact-phone" href="{{ asset('icons/contact-phone.svg') }}"></use>
                </svg>

                <a href="tel:4754533465">
                    <p class="font-extrabold text-[16px]">Give us a Call</p>
                    <p class="mt-1 md:mt-2 text-xl">(475) 453 - 3465</p>
                </a>
            </li>
            <li class="flex gap-5 items-center"><svg
                    class="bg-white shrink-0 size-13 p-2 md:p-4 md:size-17 flex items-center justify-center"
                    id="contact-mail">
                    <use id="contact-mail" href="{{ asset('icons/envelope.svg') }}"></use>
                </svg>

                <a href="mailto:hello@example.com">
                    <p class="font-extrabold text-[16px]">Send us an email</p>
                    <p class="mt-1 md:mt-2 text-xl">hello@example.com</p>
                </a>
            </li>
        </ul>

        {{-- <form method="POST" action="/create/appointment"
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
                        class="w-full border-b-2 py-1 outline-none focus:border-amber-500"
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
                    <input type="email" id="email" name="email" class="w-full border-b-2"
                        oninput="handleInput('email')">
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
                        <p class="text-(--dark-vanila) font-semibold">$
                            <?php    echo $ser['price'] ?> USD
                        </p>

                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <button type="submit" disabled id="button"
                class="w-full py-3 cursor-pointer bg-(--dark-vanila) disabled:opacity-50 disabled:cursor-not-allowed mt-4 uppercase font-extrabold ">book
                an
                appointment</button>

        </form> --}}

        <x-home.reservation.form :services="$services" />

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
    <img src="{{ asset('maps.png') }}" class="max-h-113 min-h-50 object-cover object-center w-full" alt="map">
</section>

<script>
    let date = null;
    let time = null;
    let selectedServices = [];
    let name = '';
    let email = '';
    let phone = '';
    const timeSelect = document.getElementById('input_time')

    const allSlots = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'];

    const validateForm = () => {
        const button = document.getElementById('button')

        const isNameValid = name.trim().length > 0;
        const isEmailValid = email.trim().length > 0;
        const isPhoneValid = phone.trim().length > 0;

        const services_data = selectedServices.length !== 0;

        console.log({ time })

        if (date !== null && time !== null && services_data && isNameValid && isEmailValid && isPhoneValid) {
            button.removeAttribute('disabled')
        } else {
            button.setAttribute('disabled', true)
        }
    }

    const handleDate = (dateInput) => {

        const timeInput = document.getElementById('input_time')

        if (dateInput === date) {
            timeSelect.setAttribute('disabled', true);
            timeSelect.innerHTML = '<option value="">Choose time first</option>';
            date = null;
            time = null;
            timeInput.value = null;
        } else {
            date = dateInput;
            timeSelect.removeAttribute('disabled');
            time = null;
            timeInput.value = null;

            fetch(`/api/reservations/booked-slots?date=${dateInput}`)
                .then(res => res.json())
                .then(times => renderTimeSlots(times))
                .catch(err => console.error('error: ', err));
        }

        validateForm()
    }

    const handleTime = (chosenTime) => {
        if (time == chosenTime) {
            time = null;
        } else {
            time = chosenTime
        }

        validateForm()
    }

    const renderTimeSlots = (bookedSlots) => {
        timeSelect.innerHTML = '<option value="">Choose time</option>';

        allSlots.forEach(slot => {
            const isBooked = bookedSlots.includes(slot);

            const disabledAttr = isBooked ? 'disabled' : '';
            const labelSuffix = isBooked ? ' booked' : '';

            timeSelect.innerHTML += `<option value="${slot}" ${disabledAttr}>${slot} ${labelSuffix}</option>`;
        });
    }

    const handleServicePick = (serv) => {
        const index = selectedServices.findIndex(sser => sser.id === serv.id);
        const liElement = document.getElementById(`service-${serv.id}`);
        const counterElement = liElement.querySelector('.service-counter');

        const deleteButton = document.getElementById(`delete-button-${serv.id}`)

        if (index !== -1) {
            selectedServices[index].quantity += 1;

            counterElement.innerText = ` (x${selectedServices[index].quantity})`;
        } else {
            selectedServices.push({ id: serv.id, service: serv.service, price: serv.price, quantity: 1 });

            liElement.classList.add('border-(--dark-vanila)', 'bg-gray-100');
            counterElement.classList.remove('hidden');
            counterElement.innerText = ` (x1)`;
            deleteButton.classList.remove('hidden')
        }

        input_services.value = JSON.stringify(selectedServices);
        validateForm();
    }

    const handleInput = (id) => {
        const input = document.getElementById(id);

        if (id == 'name') {
            name = input.value;
        } else if (id == 'email') {
            email = input.value;
        } else if (id == 'phone') {
            phone = input.value;
        }

        validateForm();
    }

    const handleDeleteService = (event, id) => {
        event.stopPropagation();
        const liElement = document.getElementById(`service-${id}`);
        const counterElement = liElement.querySelector('.service-counter');

        const deleteButton = document.getElementById(`delete-button-${id}`)


        const index = selectedServices.findIndex(sser => sser.id == id);

        if (index === -1) return;

        selectedServices.splice(index, 1)
        liElement.classList.remove('border-(--dark-vanila)', 'bg-gray-100');
        counterElement.classList.add('hidden');
        counterElement.innerText = ``;
        deleteButton.classList.add('hidden')
    }

    validateForm()

</script>