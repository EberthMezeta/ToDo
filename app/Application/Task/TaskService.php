<?php

namespace App\Application\Task;

use App\Domain\Task\TaskRepositoryInterface;
use App\Domain\Task\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    private $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getTasksByUserId(int $userId)
    {
        return $this->taskService->getTasksByUserId($userId);
    }

    public function createTask(array $data)
    {
        return $this->taskService->createTask($data);
    }

    public function updateTask(int $taskId, array $data)
    {
        return $this->taskService->updateTask($taskId, $data);
    }

    public function deleteTask(int $taskId)
    {
        return $this->taskService->deleteTask($taskId);
    }

    public function findOrFailTask(int $taskId)
    {
        return $this->taskService->findOrFailTask($taskId);
    }

    public function toggleTaskDoneStatus(int $taskId)
    {
        return $this->taskService->toggleTaskDoneStatus($taskId);
    }
}
