<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskComponent extends Component
{
    public Task $task;
    public $tasks;
    public $title;
    public $description;

    protected $rules = [
        'task.title' => 'required|string|max:255',
        'task.description' => 'required|string:min:1',
    ];


    public function mount()
    {
        $this->loadTasksForUser(1);
        $this->task = new Task();
    }

    public function save()
    {
        $this->validate();

        $this->task->user_id = 1;

        $this->task->save();
        $this->task = new Task();
        $this->mount();

        session()->flash('message', 'Tarea guardada con exito!');
    }


    public function createTask()
    {
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => 1,
        ]);

        // Limpiar el campo del formulario después de agregar la tarea
        $this->title = '';
        $this->description = '';
        // Volver a cargar todas las tareas después de agregar una nueva tarea
        $this->loadTasksForUser(1);
    }

    public function deleteTask($taskId)
    {
        $taskToDelete = Task::find($taskId);

        if (!is_null($taskToDelete)) {
            $taskToDelete->delete();
        }
        $this->loadTasksForUser(1);
    }

    public function updateTask(Task $task)
    {
        $this->task = $task;
    }

    public function done(Task $task)
    {
        $task->update(['done' => !$task->done]);
    }

    public function render()
    {
        return view('livewire.task-component');
    }

    private function loadTasksForUser($userId)
    {
        $this->tasks = Task::where('user_id', $userId)->orderBy('id', 'desc')->get();
    }
}
