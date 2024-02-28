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

<<<<<<< HEAD
use Closure;
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossed\ActivationStrategyInterface;
use Monolog\Level;
=======
use Monolog\Handler\FingersCrossed\ErrorLevelActivationStrategy;
use Monolog\Handler\FingersCrossed\ActivationStrategyInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Monolog\Logger;
use Monolog\ResettableInterface;
use Monolog\Formatter\FormatterInterface;
use Psr\Log\LogLevel;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Buffers all records until a certain level is reached
 *
 * The advantage of this approach is that you don't get any clutter in your log files.
 * Only requests which actually trigger an error (or whatever your actionLevel is) will be
 * in the logs, but they will contain all records, not only those above the level threshold.
 *
 * You can then have a passthruLevel as well which means that at the end of the request,
 * even if it did not get activated, it will still send through log records of e.g. at least a
 * warning level.
 *
 * You can find the various activation strategies in the
 * Monolog\Handler\FingersCrossed\ namespace.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class FingersCrossedHandler extends Handler implements ProcessableHandlerInterface, ResettableInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;

    /**
<<<<<<< HEAD
     * Handler or factory Closure($record, $this)
     *
     * @phpstan-var (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface
     */
    protected Closure|HandlerInterface $handler;

    protected ActivationStrategyInterface $activationStrategy;

    protected bool $buffering = true;

    protected int $bufferSize;

    /** @var LogRecord[] */
    protected array $buffer = [];

    protected bool $stopBuffering;

    protected Level|null $passthruLevel = null;

    protected bool $bubble;

    /**
     * @phpstan-param (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface $handler
     *
     * @param Closure|HandlerInterface                    $handler            Handler or factory Closure($record|null, $fingersCrossedHandler).
     * @param int|string|Level|LogLevel::*      $activationStrategy Strategy which determines when this handler takes action, or a level name/value at which the handler is activated
     * @param int                                         $bufferSize         How many entries should be buffered at most, beyond that the oldest items are removed from the buffer.
     * @param bool                                        $bubble             Whether the messages that are handled can bubble up the stack or not
     * @param bool                                        $stopBuffering      Whether the handler should stop buffering after being triggered (default true)
     * @param int|string|Level|LogLevel::*|null $passthruLevel      Minimum level to always flush to handler on close, even if strategy not triggered
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*|ActivationStrategyInterface $activationStrategy
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $passthruLevel
     */
    public function __construct(Closure|HandlerInterface $handler, int|string|Level|ActivationStrategyInterface $activationStrategy = null, int $bufferSize = 0, bool $bubble = true, bool $stopBuffering = true, int|string|Level|null $passthruLevel = null)
    {
        if (null === $activationStrategy) {
            $activationStrategy = new ErrorLevelActivationStrategy(Level::Warning);
=======
     * @var callable|HandlerInterface
     * @phpstan-var callable(?Record, HandlerInterface): HandlerInterface|HandlerInterface
     */
    protected $handler;
    /** @var ActivationStrategyInterface */
    protected $activationStrategy;
    /** @var bool */
    protected $buffering = true;
    /** @var int */
    protected $bufferSize;
    /** @var Record[] */
    protected $buffer = [];
    /** @var bool */
    protected $stopBuffering;
    /**
     * @var ?int
     * @phpstan-var ?Level
     */
    protected $passthruLevel;
    /** @var bool */
    protected $bubble;

    /**
     * @psalm-param HandlerInterface|callable(?Record, HandlerInterface): HandlerInterface $handler
     *
     * @param callable|HandlerInterface              $handler            Handler or factory callable($record|null, $fingersCrossedHandler).
     * @param int|string|ActivationStrategyInterface $activationStrategy Strategy which determines when this handler takes action, or a level name/value at which the handler is activated
     * @param int                                    $bufferSize         How many entries should be buffered at most, beyond that the oldest items are removed from the buffer.
     * @param bool                                   $bubble             Whether the messages that are handled can bubble up the stack or not
     * @param bool                                   $stopBuffering      Whether the handler should stop buffering after being triggered (default true)
     * @param int|string                             $passthruLevel      Minimum level to always flush to handler on close, even if strategy not triggered
     *
     * @phpstan-param Level|LevelName|LogLevel::* $passthruLevel
     * @phpstan-param Level|LevelName|LogLevel::*|ActivationStrategyInterface $activationStrategy
     */
    public function __construct($handler, $activationStrategy = null, int $bufferSize = 0, bool $bubble = true, bool $stopBuffering = true, $passthruLevel = null)
    {
        if (null === $activationStrategy) {
            $activationStrategy = new ErrorLevelActivationStrategy(Logger::WARNING);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        // convert simple int activationStrategy to an object
        if (!$activationStrategy instanceof ActivationStrategyInterface) {
            $activationStrategy = new ErrorLevelActivationStrategy($activationStrategy);
        }

        $this->handler = $handler;
        $this->activationStrategy = $activationStrategy;
        $this->bufferSize = $bufferSize;
        $this->bubble = $bubble;
        $this->stopBuffering = $stopBuffering;

        if ($passthruLevel !== null) {
            $this->passthruLevel = Logger::toMonologLevel($passthruLevel);
        }
<<<<<<< HEAD
    }

    /**
     * @inheritDoc
     */
    public function isHandling(LogRecord $record): bool
=======

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

    /**
     * {@inheritDoc}
     */
    public function isHandling(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return true;
    }

    /**
     * Manually activate this logger regardless of the activation strategy
     */
    public function activate(): void
    {
        if ($this->stopBuffering) {
            $this->buffering = false;
        }

        $this->getHandler(end($this->buffer) ?: null)->handleBatch($this->buffer);
        $this->buffer = [];
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

        if ($this->buffering) {
            $this->buffer[] = $record;
            if ($this->bufferSize > 0 && count($this->buffer) > $this->bufferSize) {
                array_shift($this->buffer);
            }
            if ($this->activationStrategy->isHandlerActivated($record)) {
                $this->activate();
            }
        } else {
            $this->getHandler($record)->handle($record);
        }

        return false === $this->bubble;
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
        $this->flushBuffer();

        $this->getHandler()->close();
    }

<<<<<<< HEAD
    public function reset(): void
=======
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->flushBuffer();

        $this->resetProcessors();

        if ($this->getHandler() instanceof ResettableInterface) {
            $this->getHandler()->reset();
        }
    }

    /**
     * Clears the buffer without flushing any messages down to the wrapped handler.
     *
     * It also resets the handler to its initial buffering state.
     */
    public function clear(): void
    {
        $this->buffer = [];
        $this->reset();
    }

    /**
     * Resets the state of the handler. Stops forwarding records to the wrapped handler.
     */
    private function flushBuffer(): void
    {
        if (null !== $this->passthruLevel) {
<<<<<<< HEAD
            $passthruLevel = $this->passthruLevel;
            $this->buffer = array_filter($this->buffer, static function ($record) use ($passthruLevel) {
                return $passthruLevel->includes($record->level);
=======
            $level = $this->passthruLevel;
            $this->buffer = array_filter($this->buffer, function ($record) use ($level) {
                return $record['level'] >= $level;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            });
            if (count($this->buffer) > 0) {
                $this->getHandler(end($this->buffer))->handleBatch($this->buffer);
            }
        }

        $this->buffer = [];
        $this->buffering = true;
    }

    /**
     * Return the nested handler
     *
<<<<<<< HEAD
     * If the handler was provided as a factory, this will trigger the handler's instantiation.
     */
    public function getHandler(LogRecord $record = null): HandlerInterface
    {
        if (!$this->handler instanceof HandlerInterface) {
            $handler = ($this->handler)($record, $this);
            if (!$handler instanceof HandlerInterface) {
                throw new \RuntimeException("The factory Closure should return a HandlerInterface");
            }
            $this->handler = $handler;
=======
     * If the handler was provided as a factory callable, this will trigger the handler's instantiation.
     *
     * @return HandlerInterface
     *
     * @phpstan-param Record $record
     */
    public function getHandler(array $record = null)
    {
        if (!$this->handler instanceof HandlerInterface) {
            $this->handler = ($this->handler)($record, $this);
            if (!$this->handler instanceof HandlerInterface) {
                throw new \RuntimeException("The factory callable should return a HandlerInterface");
            }
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return $this->handler;
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
        $handler = $this->getHandler();
        if ($handler instanceof FormattableHandlerInterface) {
            $handler->setFormatter($formatter);

            return $this;
        }

        throw new \UnexpectedValueException('The nested handler of type '.get_class($handler).' does not support formatters.');
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
        $handler = $this->getHandler();
        if ($handler instanceof FormattableHandlerInterface) {
            return $handler->getFormatter();
        }

        throw new \UnexpectedValueException('The nested handler of type '.get_class($handler).' does not support formatters.');
    }
}
