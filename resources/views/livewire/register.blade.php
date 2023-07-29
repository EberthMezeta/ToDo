<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card p-4 shadow-sm">
                    <h2 class="mb-4 text-center">Registro</h2>
                    <form wire:submit.prevent="submit">
                        <div class="mb-3">
                            <input type="text" wire:model="name" placeholder="Name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="email" wire:model="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" wire:model="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <input type="password" wire:model="password_confirmation" placeholder="Confirm Password"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                    <a href="/login">Iniciar sesion</a>
                </div>
            </div>
        </div>
    </div>
</div>
