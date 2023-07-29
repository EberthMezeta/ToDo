<div>
    <!-- Formulario para agregar una nueva tarea -->
    <input type="text" wire:model="title" placeholder="Título">
    <input type="text" wire:model="description" placeholder="Descripción">
    @if (!$taskIdBeingEdited)
        <button wire:click="createTask">Agregar tarea</button>
    @else
        <button type="button" wire:click="updateTask">Guardar cambios</button>
        <button type="button" wire:click="cancelEdit">Cancelar</button>
    @endif

    <!-- Lista de tareas -->
    <ul>
        @foreach ($tasks as $task)
            <li>
                {{ $task->title }} - {{ $task->description }}
                <input type="checkbox" wire:click="toggleTaskDoneStatus({{ $task->id }})"
                    wire:model="tasks.{{ $loop->index }}.done">
                <button wire:click="editTask({{ $task->id }})">Editar</button>
                <button wire:click="deleteTask({{ $task->id }})">Eliminar</button>
            </li>
        @endforeach
    </ul>

</div>
