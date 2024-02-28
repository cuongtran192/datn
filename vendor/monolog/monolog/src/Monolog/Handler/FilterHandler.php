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
use Monolog\Level;
=======
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
 * Simple handler wrapper that filters records based on a list of levels
 *
 * It can be configured with an exact list of levels to allow, or a min/max level.
 *
 * @author Hennadiy Verkh
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class FilterHandler extends Handler implements ProcessableHandlerInterface, ResettableInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;

    /**
<<<<<<< HEAD
     * Handler or factory Closure($record, $this)
     *
     * @phpstan-var (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface
     */
    protected Closure|HandlerInterface $handler;
=======
     * Handler or factory callable($record, $this)
     *
     * @var callable|HandlerInterface
     * @phpstan-var callable(?Record, HandlerInterface): HandlerInterface|HandlerInterface
     */
    protected $handler;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Minimum level for logs that are passed to handler
     *
<<<<<<< HEAD
     * @var bool[] Map of Level value => true
     * @phpstan-var array<value-of<Level::VALUES>, true>
     */
    protected array $acceptedLevels;

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    protected bool $bubble;

    /**
     * @phpstan-param (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface $handler
     *
     * @param Closure|HandlerInterface                                                 $handler        Handler or factory Closure($record|null, $filterHandler).
     * @param int|string|Level|array<int|string|Level|LogLevel::*> $minLevelOrList A list of levels to accept or a minimum level if maxLevel is provided
     * @param int|string|Level|LogLevel::*                                   $maxLevel       Maximum level to accept, only used if $minLevelOrList is not an array
     * @param bool                                                                     $bubble         Whether the messages that are handled can bubble up the stack or not
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*|array<value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*> $minLevelOrList
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $maxLevel
     */
    public function __construct(Closure|HandlerInterface $handler, int|string|Level|array $minLevelOrList = Level::Debug, int|string|Level $maxLevel = Level::Emergency, bool $bubble = true)
=======
     * @var int[]
     * @phpstan-var array<Level, int>
     */
    protected $acceptedLevels;

    /**
     * Whether the messages that are handled can bubble up the stack or not
     *
     * @var bool
     */
    protected $bubble;

    /**
     * @psalm-param HandlerInterface|callable(?Record, HandlerInterface): HandlerInterface $handler
     *
     * @param callable|HandlerInterface $handler        Handler or factory callable($record|null, $filterHandler).
     * @param int|array                 $minLevelOrList A list of levels to accept or a minimum level if maxLevel is provided
     * @param int|string                $maxLevel       Maximum level to accept, only used if $minLevelOrList is not an array
     * @param bool                      $bubble         Whether the messages that are handled can bubble up the stack or not
     *
     * @phpstan-param Level|LevelName|LogLevel::*|array<Level|LevelName|LogLevel::*> $minLevelOrList
     * @phpstan-param Level|LevelName|LogLevel::* $maxLevel
     */
    public function __construct($handler, $minLevelOrList = Logger::DEBUG, $maxLevel = Logger::EMERGENCY, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->handler  = $handler;
        $this->bubble   = $bubble;
        $this->setAcceptedLevels($minLevelOrList, $maxLevel);
<<<<<<< HEAD
    }

    /**
     * @phpstan-return list<Level> List of levels
     */
    public function getAcceptedLevels(): array
    {
        return array_map(fn (int $level) => Level::from($level), array_keys($this->acceptedLevels));
    }

    /**
     * @param int|string|Level|LogLevel::*|array<int|string|Level|LogLevel::*> $minLevelOrList A list of levels to accept or a minimum level or level name if maxLevel is provided
     * @param int|string|Level|LogLevel::*                                               $maxLevel       Maximum level or level name to accept, only used if $minLevelOrList is not an array
     * @return $this
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*|array<value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*> $minLevelOrList
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $maxLevel
     */
    public function setAcceptedLevels(int|string|Level|array $minLevelOrList = Level::Debug, int|string|Level $maxLevel = Level::Emergency): self
    {
        if (is_array($minLevelOrList)) {
            $acceptedLevels = array_map(Logger::toMonologLevel(...), $minLevelOrList);
        } else {
            $minLevelOrList = Logger::toMonologLevel($minLevelOrList);
            $maxLevel = Logger::toMonologLevel($maxLevel);
            $acceptedLevels = array_values(array_filter(Level::cases(), fn (Level $level) => $level->value >= $minLevelOrList->value && $level->value <= $maxLevel->value));
        }
        $this->acceptedLevels = [];
        foreach ($acceptedLevels as $level) {
            $this->acceptedLevels[$level->value] = true;
        }
=======

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

    /**
     * @phpstan-return array<int, Level>
     */
    public function getAcceptedLevels(): array
    {
        return array_flip($this->acceptedLevels);
    }

    /**
     * @param int|string|array $minLevelOrList A list of levels to accept or a minimum level or level name if maxLevel is provided
     * @param int|string       $maxLevel       Maximum level or level name to accept, only used if $minLevelOrList is not an array
     *
     * @phpstan-param Level|LevelName|LogLevel::*|array<Level|LevelName|LogLevel::*> $minLevelOrList
     * @phpstan-param Level|LevelName|LogLevel::*                                    $maxLevel
     */
    public function setAcceptedLevels($minLevelOrList = Logger::DEBUG, $maxLevel = Logger::EMERGENCY): self
    {
        if (is_array($minLevelOrList)) {
            $acceptedLevels = array_map('Monolog\Logger::toMonologLevel', $minLevelOrList);
        } else {
            $minLevelOrList = Logger::toMonologLevel($minLevelOrList);
            $maxLevel = Logger::toMonologLevel($maxLevel);
            $acceptedLevels = array_values(array_filter(Logger::getLevels(), function ($level) use ($minLevelOrList, $maxLevel) {
                return $level >= $minLevelOrList && $level <= $maxLevel;
            }));
        }
        $this->acceptedLevels = array_flip($acceptedLevels);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $this;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isHandling(LogRecord $record): bool
    {
        return isset($this->acceptedLevels[$record->level->value]);
    }

    /**
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
=======
     * {@inheritDoc}
     */
    public function isHandling(array $record): bool
    {
        return isset($this->acceptedLevels[$record['level']]);
    }

    /**
     * {@inheritDoc}
     */
    public function handle(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        if (\count($this->processors) > 0) {
=======
        if ($this->processors) {
            /** @var Record $record */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $record = $this->processRecord($record);
        }

        $this->getHandler($record)->handle($record);

        return false === $this->bubble;
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
        $filtered = [];
        foreach ($records as $record) {
            if ($this->isHandling($record)) {
                $filtered[] = $record;
            }
        }

        if (count($filtered) > 0) {
            $this->getHandler($filtered[count($filtered) - 1])->handleBatch($filtered);
        }
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

<<<<<<< HEAD
    public function reset(): void
=======
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->resetProcessors();

        if ($this->getHandler() instanceof ResettableInterface) {
            $this->getHandler()->reset();
        }
    }
}
