<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Processor\ProcessorInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Interface to describe loggers that have processors
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
interface ProcessableHandlerInterface
{
    /**
     * Adds a processor in the stack.
     *
<<<<<<< HEAD
     * @phpstan-param ProcessorInterface|(callable(LogRecord): LogRecord) $callback
=======
     * @psalm-param ProcessorInterface|callable(Record): Record $callback
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     *
     * @param  ProcessorInterface|callable $callback
     * @return HandlerInterface            self
     */
    public function pushProcessor(callable $callback): HandlerInterface;

    /**
     * Removes the processor on top of the stack and returns it.
     *
<<<<<<< HEAD
     * @phpstan-return ProcessorInterface|(callable(LogRecord): LogRecord) $callback
=======
     * @psalm-return ProcessorInterface|callable(Record): Record $callback
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     *
     * @throws \LogicException             In case the processor stack is empty
     * @return callable|ProcessorInterface
     */
    public function popProcessor(): callable;
}
