<div>
    <form wire:submit.prevent="submit">
        <input type="text" wire:model="name" placeholder="Name">
        <input type="email" wire:model="email" placeholder="Email">
        <input type="password" wire:model="password" placeholder="Password">
        <input type="password" wire:model="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Register</button>
    </form>
</div>
