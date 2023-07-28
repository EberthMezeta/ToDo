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
        $userId = auth()->id();
        $this->loadTasksForUser($userId);
        $this->task = new Task();
    }

    public function save()
    {
        $this->validate();

        $this->task->user_id = auth()->id();

        $this->task->save();
        $this->task = new Task();
        $this->mount();

        session()->flash('message', 'Tarea guardada con exito!');
    }



    public function deleteTask($taskId)
    {
        $taskToDelete = Task::find($taskId);

        if (!is_null($taskToDelete)) {
            $taskToDelete->delete();
        }
        $userId = auth()->id();
        $this->loadTasksForUser($userId);
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
