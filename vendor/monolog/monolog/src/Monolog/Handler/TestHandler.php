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
use Monolog\Logger;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Used for testing purposes.
 *
 * It records all records and gives you access to them for verification.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 *
<<<<<<< HEAD
 * @method bool hasEmergency(string|array $recordAssertions)
 * @method bool hasAlert(string|array $recordAssertions)
 * @method bool hasCritical(string|array $recordAssertions)
 * @method bool hasError(string|array $recordAssertions)
 * @method bool hasWarning(string|array $recordAssertions)
 * @method bool hasNotice(string|array $recordAssertions)
 * @method bool hasInfo(string|array $recordAssertions)
 * @method bool hasDebug(string|array $recordAssertions)
=======
 * @method bool hasEmergency($record)
 * @method bool hasAlert($record)
 * @method bool hasCritical($record)
 * @method bool hasError($record)
 * @method bool hasWarning($record)
 * @method bool hasNotice($record)
 * @method bool hasInfo($record)
 * @method bool hasDebug($record)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 *
 * @method bool hasEmergencyRecords()
 * @method bool hasAlertRecords()
 * @method bool hasCriticalRecords()
 * @method bool hasErrorRecords()
 * @method bool hasWarningRecords()
 * @method bool hasNoticeRecords()
 * @method bool hasInfoRecords()
 * @method bool hasDebugRecords()
 *
<<<<<<< HEAD
 * @method bool hasEmergencyThatContains(string $message)
 * @method bool hasAlertThatContains(string $message)
 * @method bool hasCriticalThatContains(string $message)
 * @method bool hasErrorThatContains(string $message)
 * @method bool hasWarningThatContains(string $message)
 * @method bool hasNoticeThatContains(string $message)
 * @method bool hasInfoThatContains(string $message)
 * @method bool hasDebugThatContains(string $message)
 *
 * @method bool hasEmergencyThatMatches(string $regex)
 * @method bool hasAlertThatMatches(string $regex)
 * @method bool hasCriticalThatMatches(string $regex)
 * @method bool hasErrorThatMatches(string $regex)
 * @method bool hasWarningThatMatches(string $regex)
 * @method bool hasNoticeThatMatches(string $regex)
 * @method bool hasInfoThatMatches(string $regex)
 * @method bool hasDebugThatMatches(string $regex)
 *
 * @method bool hasEmergencyThatPasses(callable $predicate)
 * @method bool hasAlertThatPasses(callable $predicate)
 * @method bool hasCriticalThatPasses(callable $predicate)
 * @method bool hasErrorThatPasses(callable $predicate)
 * @method bool hasWarningThatPasses(callable $predicate)
 * @method bool hasNoticeThatPasses(callable $predicate)
 * @method bool hasInfoThatPasses(callable $predicate)
 * @method bool hasDebugThatPasses(callable $predicate)
 */
class TestHandler extends AbstractProcessingHandler
{
    /** @var LogRecord[] */
    protected array $records = [];
    /** @phpstan-var array<value-of<Level::VALUES>, LogRecord[]> */
    protected array $recordsByLevel = [];
    private bool $skipReset = false;

    /**
     * @return array<LogRecord>
     */
    public function getRecords(): array
=======
 * @method bool hasEmergencyThatContains($message)
 * @method bool hasAlertThatContains($message)
 * @method bool hasCriticalThatContains($message)
 * @method bool hasErrorThatContains($message)
 * @method bool hasWarningThatContains($message)
 * @method bool hasNoticeThatContains($message)
 * @method bool hasInfoThatContains($message)
 * @method bool hasDebugThatContains($message)
 *
 * @method bool hasEmergencyThatMatches($message)
 * @method bool hasAlertThatMatches($message)
 * @method bool hasCriticalThatMatches($message)
 * @method bool hasErrorThatMatches($message)
 * @method bool hasWarningThatMatches($message)
 * @method bool hasNoticeThatMatches($message)
 * @method bool hasInfoThatMatches($message)
 * @method bool hasDebugThatMatches($message)
 *
 * @method bool hasEmergencyThatPasses($message)
 * @method bool hasAlertThatPasses($message)
 * @method bool hasCriticalThatPasses($message)
 * @method bool hasErrorThatPasses($message)
 * @method bool hasWarningThatPasses($message)
 * @method bool hasNoticeThatPasses($message)
 * @method bool hasInfoThatPasses($message)
 * @method bool hasDebugThatPasses($message)
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class TestHandler extends AbstractProcessingHandler
{
    /** @var Record[] */
    protected $records = [];
    /** @var array<Level, Record[]> */
    protected $recordsByLevel = [];
    /** @var bool */
    private $skipReset = false;

    /**
     * @return array
     *
     * @phpstan-return Record[]
     */
    public function getRecords()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return $this->records;
    }

<<<<<<< HEAD
    public function clear(): void
=======
    /**
     * @return void
     */
    public function clear()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->records = [];
        $this->recordsByLevel = [];
    }

<<<<<<< HEAD
    public function reset(): void
=======
    /**
     * @return void
     */
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!$this->skipReset) {
            $this->clear();
        }
    }

<<<<<<< HEAD
    public function setSkipReset(bool $skipReset): void
=======
    /**
     * @return void
     */
    public function setSkipReset(bool $skipReset)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->skipReset = $skipReset;
    }

    /**
<<<<<<< HEAD
     * @param int|string|Level|LogLevel::* $level Logging level value or name
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function hasRecords(int|string|Level $level): bool
    {
        return isset($this->recordsByLevel[Logger::toMonologLevel($level)->value]);
    }

    /**
     * @param string|array $recordAssertions Either a message string or an array containing message and optionally context keys that will be checked against all records
     *
     * @phpstan-param array{message: string, context?: mixed[]}|string $recordAssertions
     */
    public function hasRecord(string|array $recordAssertions, Level $level): bool
    {
        if (is_string($recordAssertions)) {
            $recordAssertions = ['message' => $recordAssertions];
        }

        return $this->hasRecordThatPasses(function (LogRecord $rec) use ($recordAssertions) {
            if ($rec->message !== $recordAssertions['message']) {
                return false;
            }
            if (isset($recordAssertions['context']) && $rec->context !== $recordAssertions['context']) {
=======
     * @param string|int $level Logging level value or name
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function hasRecords($level): bool
    {
        return isset($this->recordsByLevel[Logger::toMonologLevel($level)]);
    }

    /**
     * @param string|array $record Either a message string or an array containing message and optionally context keys that will be checked against all records
     * @param string|int   $level  Logging level value or name
     *
     * @phpstan-param array{message: string, context?: mixed[]}|string $record
     * @phpstan-param Level|LevelName|LogLevel::*                      $level
     */
    public function hasRecord($record, $level): bool
    {
        if (is_string($record)) {
            $record = array('message' => $record);
        }

        return $this->hasRecordThatPasses(function ($rec) use ($record) {
            if ($rec['message'] !== $record['message']) {
                return false;
            }
            if (isset($record['context']) && $rec['context'] !== $record['context']) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                return false;
            }

            return true;
        }, $level);
    }

<<<<<<< HEAD
    public function hasRecordThatContains(string $message, Level $level): bool
    {
        return $this->hasRecordThatPasses(fn (LogRecord $rec) => str_contains($rec->message, $message), $level);
    }

    public function hasRecordThatMatches(string $regex, Level $level): bool
    {
        return $this->hasRecordThatPasses(fn (LogRecord $rec) => preg_match($regex, $rec->message) > 0, $level);
    }

    /**
     * @phpstan-param callable(LogRecord, int): mixed $predicate
     */
    public function hasRecordThatPasses(callable $predicate, Level $level): bool
    {
        $level = Logger::toMonologLevel($level);

        if (!isset($this->recordsByLevel[$level->value])) {
            return false;
        }

        foreach ($this->recordsByLevel[$level->value] as $i => $rec) {
            if ((bool) $predicate($rec, $i)) {
=======
    /**
     * @param string|int $level Logging level value or name
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function hasRecordThatContains(string $message, $level): bool
    {
        return $this->hasRecordThatPasses(function ($rec) use ($message) {
            return strpos($rec['message'], $message) !== false;
        }, $level);
    }

    /**
     * @param string|int $level Logging level value or name
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function hasRecordThatMatches(string $regex, $level): bool
    {
        return $this->hasRecordThatPasses(function (array $rec) use ($regex): bool {
            return preg_match($regex, $rec['message']) > 0;
        }, $level);
    }

    /**
     * @param  string|int $level Logging level value or name
     * @return bool
     *
     * @psalm-param callable(Record, int): mixed $predicate
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function hasRecordThatPasses(callable $predicate, $level)
    {
        $level = Logger::toMonologLevel($level);

        if (!isset($this->recordsByLevel[$level])) {
            return false;
        }

        foreach ($this->recordsByLevel[$level] as $i => $rec) {
            if ($predicate($rec, $i)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                return true;
            }
        }

        return false;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->recordsByLevel[$record->level->value][] = $record;
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->recordsByLevel[$record['level']][] = $record;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        $this->records[] = $record;
    }

    /**
<<<<<<< HEAD
     * @param mixed[] $args
     */
    public function __call(string $method, array $args): bool
    {
        if (preg_match('/(.*)(Debug|Info|Notice|Warning|Error|Critical|Alert|Emergency)(.*)/', $method, $matches) > 0) {
            $genericMethod = $matches[1] . ('Records' !== $matches[3] ? 'Record' : '') . $matches[3];
            $level = constant(Level::class.'::' . $matches[2]);
=======
     * @param  string  $method
     * @param  mixed[] $args
     * @return bool
     */
    public function __call($method, $args)
    {
        if (preg_match('/(.*)(Debug|Info|Notice|Warning|Error|Critical|Alert|Emergency)(.*)/', $method, $matches) > 0) {
            $genericMethod = $matches[1] . ('Records' !== $matches[3] ? 'Record' : '') . $matches[3];
            $level = constant('Monolog\Logger::' . strtoupper($matches[2]));
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $callback = [$this, $genericMethod];
            if (is_callable($callback)) {
                $args[] = $level;

                return call_user_func_array($callback, $args);
            }
        }

        throw new \BadMethodCallException('Call to undefined method ' . get_class($this) . '::' . $method . '()');
    }
}
