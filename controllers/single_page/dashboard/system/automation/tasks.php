<?php
namespace Concrete\Controller\SinglePage\Dashboard\System\Automation;

use Concrete\Core\Command\Scheduler\Scheduler;
use Concrete\Core\Command\Task\TaskService;
use Concrete\Core\Entity\Automation\Task;
use Concrete\Core\Notification\Mercure\MercureService;
use Concrete\Core\Page\Controller\DashboardPageController;
use Punic\Comparer;

class Tasks extends DashboardPageController
{
    public function view()
    {
        $tasks = $this->app->make(TaskService::class)->getList();
        $mercureService = $this->app->make(MercureService::class);
        $eventSource = null;
        if ($mercureService->isEnabled()) {
            $eventSource = $mercureService->getPublisherUrl();
        }
        $this->set('eventSource', $eventSource);
        $this->set('tasks', $tasks);
        $this->set('schedulingEnabled', $this->app->make(Scheduler::class)->isEnabled());

    }
}
