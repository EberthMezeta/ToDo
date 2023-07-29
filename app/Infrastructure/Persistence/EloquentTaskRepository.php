<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    public function getTasksByUserId(int $userId)
    {
        return Task::where('user_id', $userId)->orderBy('id', 'desc')->get();
    }

    public function createTask(array $data)
    {
        return Task::create($data);
    }

    public function findOrFailTask(int $taskId)
    {
        return Task::findOrFail($taskId);
    }

    public function updateTask(int $taskId, array $data)
    {
        $task = Task::findOrFail($taskId);
        $task->update($data);
    }

    public function deleteTask(int $taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
    }
}
