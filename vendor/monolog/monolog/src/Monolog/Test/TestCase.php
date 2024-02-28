<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Test;

<<<<<<< HEAD
use Monolog\Level;
use Monolog\Logger;
use Monolog\LogRecord;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\FormatterInterface;
use Psr\Log\LogLevel;
=======
use Monolog\Logger;
use Monolog\DateTimeImmutable;
use Monolog\Formatter\FormatterInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Lets you easily generate log records and a dummy formatter for testing purposes
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 *
<<<<<<< HEAD
=======
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 *
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 * @internal feel free to reuse this to test your own handlers, this is marked internal to avoid issues with PHPStorm https://github.com/Seldaek/monolog/issues/1677
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        parent::tearDown();

        if (isset($this->handler)) {
            unset($this->handler);
        }
    }

    /**
<<<<<<< HEAD
     * @param array<mixed> $context
     * @param array<mixed> $extra
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    protected function getRecord(int|string|Level $level = Level::Warning, string|\Stringable $message = 'test', array $context = [], string $channel = 'test', \DateTimeImmutable $datetime = new DateTimeImmutable(true), array $extra = []): LogRecord
    {
        return new LogRecord(
            message: (string) $message,
            context: $context,
            level: Logger::toMonologLevel($level),
            channel: $channel,
            datetime: $datetime,
            extra: $extra,
        );
    }

    /**
     * @phpstan-return list<LogRecord>
=======
     * @param mixed[] $context
     *
     * @return array Record
     *
     * @phpstan-param  Level $level
     * @phpstan-return Record
     */
    protected function getRecord(int $level = Logger::WARNING, string $message = 'test', array $context = []): array
    {
        return [
            'message' => (string) $message,
            'context' => $context,
            'level' => $level,
            'level_name' => Logger::getLevelName($level),
            'channel' => 'test',
            'datetime' => new DateTimeImmutable(true),
            'extra' => [],
        ];
    }

    /**
     * @phpstan-return Record[]
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getMultipleRecords(): array
    {
        return [
<<<<<<< HEAD
            $this->getRecord(Level::Debug, 'debug message 1'),
            $this->getRecord(Level::Debug, 'debug message 2'),
            $this->getRecord(Level::Info, 'information'),
            $this->getRecord(Level::Warning, 'warning'),
            $this->getRecord(Level::Error, 'error'),
=======
            $this->getRecord(Logger::DEBUG, 'debug message 1'),
            $this->getRecord(Logger::DEBUG, 'debug message 2'),
            $this->getRecord(Logger::INFO, 'information'),
            $this->getRecord(Logger::WARNING, 'warning'),
            $this->getRecord(Logger::ERROR, 'error'),
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        ];
    }

    protected function getIdentityFormatter(): FormatterInterface
    {
        $formatter = $this->createMock(FormatterInterface::class);
<<<<<<< HEAD
        $formatter->expects(self::any())
            ->method('format')
            ->willReturnCallback(function ($record) {
                return $record->message;
            });
=======
        $formatter->expects($this->any())
            ->method('format')
            ->will($this->returnCallback(function ($record) {
                return $record['message'];
            }));
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $formatter;
    }
}
