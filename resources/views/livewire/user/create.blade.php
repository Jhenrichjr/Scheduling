<div class="p-10">
    <span class="text-4xl border-transparent border-y-8"> Create User </span>
    <div class= "border-white border-y-8 ">
        <x-input label="First Name" placeholder="First name" wire:model='firstName' />
        <x-input label="Middle Name" placeholder="Middle name" wire:model='middleName' />
        <x-input label="Last Name" placeholder="Last name" wire:model='lastName' />
        <x-input label="Email Address" placeholder="Email address" wire:model='email' />
        <x-inputs.password label="Password" placeholder="Password" wire:model='password' />
        <x-inputs.password label="Confirm Password" placeholder="Confirm Password" wire:model='password_confirmation'  />
        <x-button red label="Save" wire:click='create' class="border-white border-y-8"/>
    </div>



        {{-- Be like water. --}}

</div>
