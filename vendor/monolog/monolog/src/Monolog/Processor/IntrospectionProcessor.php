<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

<<<<<<< HEAD
use Monolog\Level;
use Monolog\Logger;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Injects line/file:class/function where the log message came from
 *
 * Warning: This only works if the handler processes the logs directly.
 * If you put the processor on a handler that is behind a FingersCrossedHandler
 * for example, the processor will only be called once the trigger level is reached,
 * and all the log records will have the same file/line/.. data from the call that
 * triggered the FingersCrossedHandler.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 */
class IntrospectionProcessor implements ProcessorInterface
{
    private Level $level;

    /** @var string[] */
    private array $skipClassesPartials;

    private int $skipStackFramesCount;

    private const SKIP_FUNCTIONS = [
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class IntrospectionProcessor implements ProcessorInterface
{
    /** @var int */
    private $level;
    /** @var string[] */
    private $skipClassesPartials;
    /** @var int */
    private $skipStackFramesCount;
    /** @var string[] */
    private $skipFunctions = [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        'call_user_func',
        'call_user_func_array',
    ];

    /**
<<<<<<< HEAD
     * @param string|int|Level $level               The minimum logging level at which this Processor will be triggered
     * @param string[]                   $skipClassesPartials
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function __construct(int|string|Level $level = Level::Debug, array $skipClassesPartials = [], int $skipStackFramesCount = 0)
=======
     * @param string|int $level               The minimum logging level at which this Processor will be triggered
     * @param string[]   $skipClassesPartials
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function __construct($level = Logger::DEBUG, array $skipClassesPartials = [], int $skipStackFramesCount = 0)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->level = Logger::toMonologLevel($level);
        $this->skipClassesPartials = array_merge(['Monolog\\'], $skipClassesPartials);
        $this->skipStackFramesCount = $skipStackFramesCount;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        // return if the level is not high enough
        if ($record->level->isLowerThan($this->level)) {
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            return $record;
        }

        $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);

        // skip first since it's always the current method
        array_shift($trace);
        // the call_user_func call is also skipped
        array_shift($trace);

        $i = 0;

        while ($this->isTraceClassOrSkippedFunction($trace, $i)) {
            if (isset($trace[$i]['class'])) {
                foreach ($this->skipClassesPartials as $part) {
                    if (strpos($trace[$i]['class'], $part) !== false) {
                        $i++;

                        continue 2;
                    }
                }
<<<<<<< HEAD
            } elseif (in_array($trace[$i]['function'], self::SKIP_FUNCTIONS, true)) {
=======
            } elseif (in_array($trace[$i]['function'], $this->skipFunctions)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                $i++;

                continue;
            }

            break;
        }

        $i += $this->skipStackFramesCount;

        // we should have the call source now
<<<<<<< HEAD
        $record->extra = array_merge(
            $record->extra,
            [
                'file'      => $trace[$i - 1]['file'] ?? null,
                'line'      => $trace[$i - 1]['line'] ?? null,
                'class'     => $trace[$i]['class'] ?? null,
                'callType'  => $trace[$i]['type'] ?? null,
                'function'  => $trace[$i]['function'] ?? null,
=======
        $record['extra'] = array_merge(
            $record['extra'],
            [
                'file'      => isset($trace[$i - 1]['file']) ? $trace[$i - 1]['file'] : null,
                'line'      => isset($trace[$i - 1]['line']) ? $trace[$i - 1]['line'] : null,
                'class'     => isset($trace[$i]['class']) ? $trace[$i]['class'] : null,
                'callType'  => isset($trace[$i]['type']) ? $trace[$i]['type'] : null,
                'function'  => isset($trace[$i]['function']) ? $trace[$i]['function'] : null,
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            ]
        );

        return $record;
    }

    /**
<<<<<<< HEAD
     * @param array<mixed> $trace
=======
     * @param array[] $trace
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    private function isTraceClassOrSkippedFunction(array $trace, int $index): bool
    {
        if (!isset($trace[$index])) {
            return false;
        }

<<<<<<< HEAD
        return isset($trace[$index]['class']) || in_array($trace[$index]['function'], self::SKIP_FUNCTIONS, true);
=======
        return isset($trace[$index]['class']) || in_array($trace[$index]['function'], $this->skipFunctions);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
