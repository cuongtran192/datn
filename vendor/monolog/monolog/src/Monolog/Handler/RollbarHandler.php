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
use Monolog\Level;
use Rollbar\RollbarLogger;
use Throwable;
use Monolog\LogRecord;
=======
use Rollbar\RollbarLogger;
use Throwable;
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends errors to Rollbar
 *
 * If the context data contains a `payload` key, that is used as an array
 * of payload options to RollbarLogger's log method.
 *
 * Rollbar's context info will contain the context + extra keys from the log record
 * merged, and then on top of that a few keys:
 *
 *  - level (rollbar level name)
 *  - monolog_level (monolog level name, raw level, as rollbar only has 5 but monolog 8)
 *  - channel
 *  - datetime (unix timestamp)
 *
 * @author Paul Statezny <paulstatezny@gmail.com>
 */
class RollbarHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    protected RollbarLogger $rollbarLogger;

    /**
     * Records whether any log records have been added since the last flush of the rollbar notifier
     */
    private bool $hasRecords = false;

    protected bool $initialized = false;
=======
    /**
     * @var RollbarLogger
     */
    protected $rollbarLogger;

    /** @var string[] */
    protected $levelMap = [
        Logger::DEBUG     => 'debug',
        Logger::INFO      => 'info',
        Logger::NOTICE    => 'info',
        Logger::WARNING   => 'warning',
        Logger::ERROR     => 'error',
        Logger::CRITICAL  => 'critical',
        Logger::ALERT     => 'critical',
        Logger::EMERGENCY => 'critical',
    ];

    /**
     * Records whether any log records have been added since the last flush of the rollbar notifier
     *
     * @var bool
     */
    private $hasRecords = false;

    /** @var bool */
    protected $initialized = false;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param RollbarLogger $rollbarLogger RollbarLogger object constructed with valid token
     */
<<<<<<< HEAD
    public function __construct(RollbarLogger $rollbarLogger, int|string|Level $level = Level::Error, bool $bubble = true)
=======
    public function __construct(RollbarLogger $rollbarLogger, $level = Logger::ERROR, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->rollbarLogger = $rollbarLogger;

        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * Translates Monolog log levels to Rollbar levels.
     *
     * @return 'debug'|'info'|'warning'|'error'|'critical'
     */
    protected function toRollbarLevel(Level $level): string
    {
        return match ($level) {
            Level::Debug     => 'debug',
            Level::Info      => 'info',
            Level::Notice    => 'info',
            Level::Warning   => 'warning',
            Level::Error     => 'error',
            Level::Critical  => 'critical',
            Level::Alert     => 'critical',
            Level::Emergency => 'critical',
        };
    }

    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        if (!$this->initialized) {
            // __destructor() doesn't get called on Fatal errors
            register_shutdown_function([$this, 'close']);
            $this->initialized = true;
        }

        $context = $record->context;
        $context = array_merge($context, $record->extra, [
            'level' => $this->toRollbarLevel($record->level),
            'monolog_level' => $record->level->getName(),
            'channel' => $record->channel,
            'datetime' => $record->datetime->format('U'),
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        if (!$this->initialized) {
            // __destructor() doesn't get called on Fatal errors
            register_shutdown_function(array($this, 'close'));
            $this->initialized = true;
        }

        $context = $record['context'];
        $context = array_merge($context, $record['extra'], [
            'level' => $this->levelMap[$record['level']],
            'monolog_level' => $record['level_name'],
            'channel' => $record['channel'],
            'datetime' => $record['datetime']->format('U'),
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        ]);

        if (isset($context['exception']) && $context['exception'] instanceof Throwable) {
            $exception = $context['exception'];
            unset($context['exception']);
            $toLog = $exception;
        } else {
<<<<<<< HEAD
            $toLog = $record->message;
=======
            $toLog = $record['message'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        // @phpstan-ignore-next-line
        $this->rollbarLogger->log($context['level'], $toLog, $context);

        $this->hasRecords = true;
    }

    public function flush(): void
    {
        if ($this->hasRecords) {
            $this->rollbarLogger->flush();
            $this->hasRecords = false;
        }
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
        $this->flush();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function reset(): void
=======
     * {@inheritDoc}
     */
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->flush();

        parent::reset();
    }
}
