<?php

namespace App\Infrastructure\Services;

use App\Domain\Task\TaskRepositoryInterface;
use App\Domain\Task\TaskServiceInterface;

class EloquentTaskService implements TaskServiceInterface
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getTasksByUserId(int $userId)
    {
        return $this->taskRepository->getTasksByUserId($userId);
    }

    public function findOrFailTask(int $taskId)
    {
        return $this->taskRepository->findOrFailTask($taskId);
    }

    public function createTask(array $data)
    {
        return $this->taskRepository->createTask($data);
    }

    public function updateTask(int $taskId, array $data)
    {
        return $this->taskRepository->updateTask($taskId, $data);
    }

    public function deleteTask(int $taskId)
    {
        return $this->taskRepository->deleteTask($taskId);
    }

    public function toggleTaskDoneStatus(int $taskId)
    {
        $task = $this->taskRepository->findOrFailTask($taskId);
        $task->update(['done' => !$task->done]);
    }
}
