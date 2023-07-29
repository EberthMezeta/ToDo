<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Task\TaskRepositoryInterface;
use App\Infrastructure\Persistence\EloquentTaskRepository;
use App\Domain\Task\TaskServiceInterface;
use App\Infrastructure\Services\EloquentTaskService;

class TaskServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(TaskRepositoryInterface::class, EloquentTaskRepository::class);
        $this->app->bind(TaskServiceInterface::class, EloquentTaskService::class);
    }
}
