<x-layout>
    <x-slot:title>appointment</x-slot:title>

    <div class="p-4 lg:p-20">
        <a href="/" class="uppercase">← Back</a>

        <div class="flex flex-col items-center gap-4 justify-center mt-2">

            <img src="{{ asset('barbershop_logo.png') }}" alt="barbershop logo" class="size-50">
            <h1 class="text-4xl lg:text-7xl font-extrabold">Barbershop</h1>
        </div>

        <x-appointment.timeblock />

        <div class="grid md:grid-cols-2 gap-5 p-4 border rounded-lg mt-4">

            <x-appointment.services :services="$services" />

            <div class="h-px w-full bg-(--dark-vanila) md:hidden"></div>

            <x-appointment.form />

        </div>
    </div>
</x-layout>

<script>
    let chosenDate = null;
    let chosenTime = null;
    let selectedServices = [];

    const allSlots = ['09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30'];

    const validateForm = () => {
        const button = document.getElementById('button')

        const input_date = document.getElementById('input_date');
        const input_time = document.getElementById('input_time');
        const services_data = selectedServices.length !== 0;

        if (input_date.value?.length !== 0 && input_time.value?.trim().length !== 0 && services_data) {
            button.removeAttribute('disabled')
        } else {
            button.setAttribute('disabled', true)
        };
    }

    const handleDayClick = (date) => {
        const chosen_date = document.getElementById('chosen_date');
        const chosen_time = document.getElementById('chosen_time');

        const input_date = document.getElementById('input_date');
        const input_time = document.getElementById('input_time');
        const time_block = document.getElementById('time_block');

        if (!date) return;

        const li = document.getElementById(date + '-li')

        if (chosenDate) {
            const previousLi = document.getElementById(chosenDate + '-li');
            if (previousLi) {
                previousLi.classList.remove('bg-(--dark-vanila)', 'border-transparent');
            }
        }

        if (chosenDate === date) {
            chosenDate = null;
            chosenTime = null;
            input_date.value = null;
            input_time.value = null;
            chosen_date.textContent = 'Date is not chosen';
            chosen_time.textContent = 'Time is not chosen';
            time_block.classList.replace('grid', 'hidden');
            time_block.innerHTML = '';

        } else {
            li.classList.add('bg-(--dark-vanila)', 'border-transparent')
            chosenDate = date;
            chosen_date.textContent = date;
            time_block.classList.replace('hidden', 'grid')
            time_block.innerHTML = '';
            input_date.value = date;
        }

        fetch(`/api/reservations/booked-slots?date=${chosenDate}`).then(res => res.json()).then(times => renderTimeSlots(times)).catch(err => console.log('err: ', err));

        validateForm();
    }


    const renderTimeSlots = (bookedSlots) => {
        allSlots.forEach(slot => {
            const isBooked = bookedSlots.includes(slot);

            const clickAction = isBooked ? '' : `onclick="handleTime('${slot}')"`;
            const disabledClass = isBooked ? 'opacity-50 cursor-not-allowed bg-gray-200 text-gray-400' : 'cursor-pointer hover:bg-amber-100';

            time_block.innerHTML += `
            <li ${clickAction} class="justify-self-center slot-time py-2 px-4 border rounded-md m-1 transition-all ${disabledClass}" id='${slot}-time'>
                ${isBooked ? 'booked' : slot}
            </li>
        `;
        })
    };

    const handleTime = (slot) => {
        const input_time = document.getElementById('input_time');
        const chosen_time = document.getElementById('chosen_time');

        const timeslot = document.getElementById(slot + '-time')

        if (chosenTime) {
            const previousLi = document.getElementById(chosenTime + '-time');
            if (previousLi) {
                previousLi.classList.remove('bg-(--dark-vanila)', 'border-transparent');
            }
        }

        if (input_time.value.includes(slot)) {
            input_time.value = null;
            chosen_time.textContent = 'Time is not chosen';
            timeslot.classList.remove('bg-(--dark-vanila)');
            chosenTime = null;

        } else {
            input_time.value = slot;
            chosen_time.textContent = slot;
            chosenTime = slot;
            timeslot.classList.add('bg-(--dark-vanila)', 'border-transparent')
        }

        validateForm();
    }

    const handleService = ({ id, service, price }) => {
        const input_services = document.getElementById('input_services');
        const existingService = selectedServices.find(item => item.id === id);

        if (existingService) {
            existingService.quantity += 1;
        } else {
            selectedServices.push({ id, service, price: Number(price), quantity: 1 });
        }

        input_services.value = JSON.stringify(selectedServices);
        updateServicesUI();
        validateForm();

    }

    function updateServicesUI() {
        const list = document.getElementById('services_list');

        list.innerHTML = '';

        selectedServices.forEach(({ id, service, price, quantity }) => {
            const totalItemPrice = price * quantity;
            const quantityText = quantity === 1 ? '' : `x${quantity}`;

            list.innerHTML += `
            <li id="${id}" class="flex flex-col md:flex-row md:items-center justify-between py-2 border-b">
                <div class="flex justify-between items-center md:w-full md:pr-4">
                    <p class="font-medium">${service}${quantityText}</p>
                    <p class="text-sm text-gray-500">$${totalItemPrice} USD</p>
                </div>
                <div class="flex gap-2 max-md:w-full max-md:justify-around">
                    <button type="button" class="text-amber-600 hover:text-amber-800 text-sm font-medium cursor-pointer py-2" onclick="removeService('${id}')">Remove</button>
                    <button type="button" class="text-red-600 hover:text-red-800 text-sm font-medium cursor-pointer py-2" onclick="deleteService('${id}')">Delete</button>
                </div>
            </li>`
        })

        const totalPrice = selectedServices.reduce((acc, item) => {
            return acc += item.price * item.quantity;
        }, 0)

        document.getElementById('total').textContent = `$${totalPrice} USD`;

        validateForm()
    }

    function removeService(id) {
        const serviceIndex = selectedServices.findIndex(s => s.id === id);

        if (serviceIndex === -1) {
            alert('Service not found in the list!')
            return;
        }

        const service = selectedServices.find(s => s.id === id);

        if (service.quantity > 1) {
            const updatedService = { ...service, quantity: service.quantity - 1 };

            selectedServices.splice(serviceIndex, 1, updatedService)
        } else {
            alert('Only one left, cannot be removed, please use delete method')
        }

        updateServicesUI()
        validateForm()
    }

    function deleteService(id) {
        const targetId = String(id);

        selectedServices = selectedServices.filter(s => String(s.id) !== targetId);

        updateServicesUI();

        const list = document.getElementById('services_list');

        list.innerHTML = '<li><small>No services</small></li>';

        validateForm();
    }

    validateForm();

</script>