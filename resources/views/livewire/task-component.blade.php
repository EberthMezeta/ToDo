<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="task.title">

        <textarea wire:model="task.description"></textarea>

        <button type="submit">Save</button>
    </form>

    @if (session()->has('message'))
        <h3>{{ session('message') }}</h3>
    @endif

    @forelse($tasks as $task)
        <li>
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <input type="checkbox" wire:click="done({{ $task->id }})">
            <button wire:click="deleteTask({{ $task->id }})">Eliminar</button>
            <button wire:click="updateTask({{ $task->id }})">Editar</button>
        </li>
    @empty
        <h3>No hay tareas</h3>
    @endforelse

</div>
