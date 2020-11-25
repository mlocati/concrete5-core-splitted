<?php
namespace Concrete\Core\Command\Task\Runner;

use Concrete\Core\Command\Process\Command\HandleProcessMessageCommand;
use Concrete\Core\Command\Process\ProcessFactory;
use Concrete\Core\Command\Task\TaskService;
use Symfony\Component\Messenger\MessageBusInterface;

defined('C5_EXECUTE') or die("Access Denied.");

class ProcessTaskRunnerHandler
{

    /**
     * @var MessageBusInterface
     */
    protected $messageBus;

    /**
     * @var ProcessFactory
     */
    protected $processFactory;

    /**
     * @var TaskService
     */
    protected $taskService;

    public function __construct(TaskService $taskService, ProcessFactory $processFactory, MessageBusInterface $messageBus)
    {
        $this->taskService = $taskService;
        $this->processFactory = $processFactory;
        $this->messageBus = $messageBus;
    }

    public function __invoke(ProcessTaskRunner $runner)
    {
        $this->taskService->start($runner->getTask());

        $process = $this->processFactory->createTaskProcess($runner->getTask(), $runner->getInput());

        $wrappedMessage = new HandleProcessMessageCommand($process->getID(), $runner->getMessage());

        $this->messageBus->dispatch($wrappedMessage);

        $runner->setProcess($process);
    }


}
