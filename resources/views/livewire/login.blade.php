<div>
    <form wire:submit.prevent="submit" class="mt-4">
        <div class="mb-3">
            <input type="email" wire:model="email" placeholder="Email" class="form-control">
        </div>
        <div class="mb-3">
            <input type="password" wire:model="password" placeholder="Password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
    <div class="mt-3">
        <a href="/register">Registrar nuevo usuario</a>
    </div>
</div>
