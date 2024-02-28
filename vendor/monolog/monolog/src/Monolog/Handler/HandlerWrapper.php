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

use Monolog\ResettableInterface;
use Monolog\Formatter\FormatterInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * This simple wrapper class can be used to extend handlers functionality.
 *
 * Example: A custom filtering that can be applied to any handler.
 *
 * Inherit from this class and override handle() like this:
 *
<<<<<<< HEAD
 *   public function handle(LogRecord $record)
=======
 *   public function handle(array $record)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 *   {
 *        if ($record meets certain conditions) {
 *            return false;
 *        }
 *        return $this->handler->handle($record);
 *   }
 *
 * @author Alexey Karapetov <alexey@karapetov.com>
 */
class HandlerWrapper implements HandlerInterface, ProcessableHandlerInterface, FormattableHandlerInterface, ResettableInterface
{
<<<<<<< HEAD
    protected HandlerInterface $handler;
=======
    /**
     * @var HandlerInterface
     */
    protected $handler;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    public function __construct(HandlerInterface $handler)
    {
        $this->handler = $handler;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isHandling(LogRecord $record): bool
=======
     * {@inheritDoc}
     */
    public function isHandling(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return $this->handler->isHandling($record);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
=======
     * {@inheritDoc}
     */
    public function handle(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return $this->handler->handle($record);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function handleBatch(array $records): void
    {
        $this->handler->handleBatch($records);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function close(): void
    {
        $this->handler->close();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function pushProcessor(callable $callback): HandlerInterface
    {
        if ($this->handler instanceof ProcessableHandlerInterface) {
            $this->handler->pushProcessor($callback);

            return $this;
        }

        throw new \LogicException('The wrapped handler does not implement ' . ProcessableHandlerInterface::class);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function popProcessor(): callable
    {
        if ($this->handler instanceof ProcessableHandlerInterface) {
            return $this->handler->popProcessor();
        }

        throw new \LogicException('The wrapped handler does not implement ' . ProcessableHandlerInterface::class);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($this->handler instanceof FormattableHandlerInterface) {
            $this->handler->setFormatter($formatter);

            return $this;
        }

        throw new \LogicException('The wrapped handler does not implement ' . FormattableHandlerInterface::class);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getFormatter(): FormatterInterface
    {
        if ($this->handler instanceof FormattableHandlerInterface) {
            return $this->handler->getFormatter();
        }

        throw new \LogicException('The wrapped handler does not implement ' . FormattableHandlerInterface::class);
    }

<<<<<<< HEAD
    public function reset(): void
=======
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if ($this->handler instanceof ResettableInterface) {
            $this->handler->reset();
        }
    }
}
