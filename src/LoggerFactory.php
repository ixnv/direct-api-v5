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
     * @return LoggerInterface
     */
    public function create()
    {
        return new Logger('DirectApiV5', $this->handlers, $this->processors);
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