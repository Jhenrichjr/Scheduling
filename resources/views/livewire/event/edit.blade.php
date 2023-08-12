<div class="grid my-5 text-3xl font-semibold text-center 8xl place-items-start md:place-items-center">
    <h1>Edit Event</h1>
<div class="text-3xl font-semibold text-center 8xl w-96">
    <x-ui-input label="Event" placeholder="Enter Event Name" wire:model='name' />
    <x-ui-input label="Description" placeholder="Enter description" wire:model='description' />

    <x-ui-datetime-picker
    label="Appointment Date Start"
    placeholder="MM-DD-YYYY"
    parse-format="MM-DD-YYYY HH:mm"
    wire:model='eventStart'
    />

    <x-ui-datetime-picker
    label="Appointment Date End"
    placeholder="MM-DD-YYYY"
    parse-format="MM-DD-YYYY HH:mm"
    wire:model='eventEnd'
    />
    <x-ui-select
    label="Search Room"
    wire:model.defer="roomId"
    placeholder="Select room"
    :async-data="route('api.roomController.roomReference')"
    option-label="name"
    option-value="id"
/>

    <x-ui-button label="Save" wire:click='update({{$event->id}})' class="text-white bg-purple-800 border-black hover:text-black "/>
</div>
</div>
