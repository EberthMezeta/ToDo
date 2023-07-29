<?php

namespace App\Domain\Task;

interface TaskServiceInterface
{
    public function getTasksByUserId(int $userId);

    public function createTask(array $data);

    public function findOrFailTask(int $taskId);

    public function updateTask(int $taskId, array $data);

    public function deleteTask(int $taskId);

    public function toggleTaskDoneStatus(int $taskId);
}
