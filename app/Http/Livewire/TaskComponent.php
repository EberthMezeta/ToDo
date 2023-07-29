<?php

namespace App\Http\Livewire;

use App\Application\Task\TaskService;
use Livewire\Component;

class TaskComponent extends Component
{
    public $tasks;
    public $title;
    public $description;
    public $taskIdBeingEdited;

    protected $rules = [
        'tasks.*.done' => 'boolean',
        'task.title' => 'required|string|max:255',
        'task.description' => 'required|string:min:1',
    ];


    public function mount(TaskService $taskService)
    {

        $this->tasks = $taskService->getTasksByUserId(auth()->id());
    }

    public function updated()
    {
        // Este método se ejecuta cada vez que se actualiza alguna propiedad del componente.
        // Aquí puedes realizar las acciones necesarias para actualizar la lista de tareas.

    }

    public function render()
    {
        return view('livewire.task-component');
    }



    public function toggleTaskDoneStatus(TaskService $taskService, $taskId)
    {
        $taskService->toggleTaskDoneStatus($taskId);
    }



    public function createTask(TaskService $taskService)
    {
        $taskService->createTask([
            'title' => $this->title,
            'description' => $this->description,
            'done' => false, // Assuming done is a boolean field in the Task model.
            'user_id' => auth()->user()->id,
        ]);

        $this->resetInputFields();
        $this->mount(app(TaskService::class));
    }

    public function deleteTask(TaskService $taskService, $taskId)
    {
        $taskService->deleteTask($taskId);
        $this->mount(app(TaskService::class));
    }

    public function editTask(TaskService $taskService, $taskId)
    {
        // Puedes obtener la tarea por su ID y cargar los datos en los campos de edición
        $task = $taskService->findOrFailTask($taskId);
        $this->title = $task->title;
        $this->description = $task->description;

        // Almacenamos el ID de la tarea que se está editando para usarlo en el método de actualización
        $this->taskIdBeingEdited = $taskId;
    }

    public function updateTask(TaskService $taskService)
    {
        // Aquí puedes utilizar el ID de la tarea que se está editando para actualizar los datos
        $taskService->updateTask($this->taskIdBeingEdited, [
            'title' => $this->title,
            'description' => $this->description,
            // Otros campos de la tarea que puedas necesitar actualizar
        ]);

        // Limpiamos el ID de la tarea que se está editando y reiniciamos los campos de entrada
        $this->taskIdBeingEdited = null;
        $this->resetInputFields();
        $this->mount(app(TaskService::class));
    }

    public function cancelEdit()
    {
        // Cancelamos el modo de edición y reiniciamos los campos de entrada
        $this->taskIdBeingEdited = null;
        $this->resetInputFields();
    }


    function resetInputFields()
    {
        $this->title = "";
        $this->description =
            "";
    }
}
