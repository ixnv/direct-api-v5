<?php

namespace eLama\DirectApiV5;

use Monolog\Handler\HandlerInterface;
use Monolog\Logger;
use Monolog\Processor\ProcessIdProcessor;
use Monolog\Processor\UidProcessor;
use Monolog\Processor\WebProcessor;
use Psr\Log\LoggerInterface;

class LoggerFactory
{
    /** @var HandlerInterface[]  */
    private $handlers;

    /** @var callable[]  */
    private $processors;

    /**
     * @param HandlerInterface[] $handlers
     */
    public function __construct(array $handlers)
    {
        //TODO Добавить обязательный параметр "Название инструмента использующего драйвер"
        $this->handlers = $handlers;

        $this->processors = [
            new WebProcessor(),
            new UidProcessor(),
            new ProcessIdProcessor(),
            $this->createConsoleProcessor()
        ];
    }

    /**
     * @param string $toolName Строковый код инструмента использующего драйвер
     * @return LoggerInterface
     */
    public function create($toolName)
    {
        \Assert\that($toolName)->notEmpty();

        $processors = $this->processors;

        $processors[] = function (array $record) use ($toolName) {
            $record['extra']['clientToolName'] = $toolName;

            return $record;
        };

        return new Logger('DirectApiV5', $this->handlers, $processors);
    }

    private function createConsoleProcessor()
    {
        return function (array $record) {
            if (!empty($_SERVER['argv'])) {
                $record['extra']['argv'] = implode(' ', $_SERVER['argv']);
            }

            return $record;
        };
    }

}
