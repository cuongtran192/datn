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

use Monolog\Formatter\FormatterInterface;
use Monolog\ResettableInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Forwards records to multiple handlers
 *
 * @author Lenar Lõhmus <lenar@city.ee>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class GroupHandler extends Handler implements ProcessableHandlerInterface, ResettableInterface
{
    use ProcessableHandlerTrait;

    /** @var HandlerInterface[] */
<<<<<<< HEAD
    protected array $handlers;
    protected bool $bubble;
=======
    protected $handlers;
    /** @var bool */
    protected $bubble;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param HandlerInterface[] $handlers Array of Handlers.
     * @param bool               $bubble   Whether the messages that are handled can bubble up the stack or not
<<<<<<< HEAD
     *
     * @throws \InvalidArgumentException if an unsupported handler is set
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function __construct(array $handlers, bool $bubble = true)
    {
        foreach ($handlers as $handler) {
            if (!$handler instanceof HandlerInterface) {
                throw new \InvalidArgumentException('The first argument of the GroupHandler must be an array of HandlerInterface instances.');
            }
        }

        $this->handlers = $handlers;
        $this->bubble = $bubble;
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
        foreach ($this->handlers as $handler) {
            if ($handler->isHandling($record)) {
                return true;
            }
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
    {
        if (\count($this->processors) > 0) {
=======
     * {@inheritDoc}
     */
    public function handle(array $record): bool
    {
        if ($this->processors) {
            /** @var Record $record */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $record = $this->processRecord($record);
        }

        foreach ($this->handlers as $handler) {
<<<<<<< HEAD
            $handler->handle(clone $record);
=======
            $handler->handle($record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return false === $this->bubble;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handleBatch(array $records): void
    {
        if (\count($this->processors) > 0) {
=======
     * {@inheritDoc}
     */
    public function handleBatch(array $records): void
    {
        if ($this->processors) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $processed = [];
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
            }
<<<<<<< HEAD
=======
            /** @var Record[] $records */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
<<<<<<< HEAD
            $handler->handleBatch(array_map(fn ($record) => clone $record, $records));
        }
    }

    public function reset(): void
=======
            $handler->handleBatch($records);
        }
    }

    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->resetProcessors();

        foreach ($this->handlers as $handler) {
            if ($handler instanceof ResettableInterface) {
                $handler->reset();
            }
        }
    }

    public function close(): void
    {
        parent::close();

        foreach ($this->handlers as $handler) {
            $handler->close();
        }
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
        foreach ($this->handlers as $handler) {
            if ($handler instanceof FormattableHandlerInterface) {
                $handler->setFormatter($formatter);
            }
        }

        return $this;
    }
}
