<div class="grid my-5 text-3xl font-semibold text-center 8xl place-items-start md:place-items-center" >
    <h1>Edit User</h1>
    <div class="text-3xl font-semibold text-center 8xl w-96">
        <x-ui-input label="First Name" placeholder="First name" wire:model='firstName' />
        <x-ui-input label="Middle Name" placeholder="Middle name" wire:model='middleName' />
        <x-ui-input label="Last Name" placeholder="Last name" wire:model='lastName' />
        <x-ui-input label="Email Address" placeholder="Email address" wire:model='email' />
        <x-ui-button label="Save" wire:click='update({{$user->id}})' class="text-white bg-purple-800 border-black hover:text-black "/>
    </div>



        {{-- Be like water. --}}

</div>
