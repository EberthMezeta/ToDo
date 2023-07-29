<div class="mt-4 d-flex flex-column justify-content-center align-items-center">
    <!-- Formulario para agregar una nueva tarea -->
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="title" placeholder="Título">
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" wire:model="description" placeholder="Descripción">
    </div>
    @if (!$taskIdBeingEdited)
        <button class="btn btn-primary btn-block" wire:click.prevent="createTask">Agregar tarea</button>
    @else
        <button class="btn btn-success btn-block" wire:click.prevent="updateTask">Guardar cambios</button>
        <button class="btn btn-secondary btn-block" wire:click.prevent="cancelEdit">Cancelar</button>
    @endif

    <!-- Lista de tareas -->
    <ul class="mt-4 list-unstyled">
        @foreach ($tasks as $task)
            <li class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" wire:model="tasks.{{ $loop->index }}.done"
                        wire:click="toggleTaskDoneStatus({{ $task->id }})">
                    <label class="form-check-label {{ $task->done ? 'text-decoration-line-through' : '' }}">
                        {{ $task->title }} - {{ $task->description }}
                    </label>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <button class="btn btn-sm btn-primary mx-1"
                        wire:click.prevent="editTask({{ $task->id }})">Editar</button>
                    <button class="btn btn-sm btn-danger mx-1"
                        wire:click.prevent="deleteTask({{ $task->id }})">Eliminar</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
