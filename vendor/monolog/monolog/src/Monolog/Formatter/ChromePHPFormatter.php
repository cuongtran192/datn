<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Formats a log message according to the ChromePHP array format
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class ChromePHPFormatter implements FormatterInterface
{
    /**
     * Translates Monolog log levels to Wildfire levels.
     *
<<<<<<< HEAD
     * @return 'log'|'info'|'warn'|'error'
     */
    private function toWildfireLevel(Level $level): string
    {
        return match ($level) {
            Level::Debug     => 'log',
            Level::Info      => 'info',
            Level::Notice    => 'info',
            Level::Warning   => 'warn',
            Level::Error     => 'error',
            Level::Critical  => 'error',
            Level::Alert     => 'error',
            Level::Emergency => 'error',
        };
    }

    /**
     * @inheritDoc
     */
    public function format(LogRecord $record)
    {
        // Retrieve the line and file if set and remove them from the formatted extra
        $backtrace = 'unknown';
        if (isset($record->extra['file'], $record->extra['line'])) {
            $backtrace = $record->extra['file'].' : '.$record->extra['line'];
            unset($record->extra['file'], $record->extra['line']);
        }

        $message = ['message' => $record->message];
        if (\count($record->context) > 0) {
            $message['context'] = $record->context;
        }
        if (\count($record->extra) > 0) {
            $message['extra'] = $record->extra;
=======
     * @var array<int, 'log'|'info'|'warn'|'error'>
     */
    private $logLevels = [
        Logger::DEBUG     => 'log',
        Logger::INFO      => 'info',
        Logger::NOTICE    => 'info',
        Logger::WARNING   => 'warn',
        Logger::ERROR     => 'error',
        Logger::CRITICAL  => 'error',
        Logger::ALERT     => 'error',
        Logger::EMERGENCY => 'error',
    ];

    /**
     * {@inheritDoc}
     */
    public function format(array $record)
    {
        // Retrieve the line and file if set and remove them from the formatted extra
        $backtrace = 'unknown';
        if (isset($record['extra']['file'], $record['extra']['line'])) {
            $backtrace = $record['extra']['file'].' : '.$record['extra']['line'];
            unset($record['extra']['file'], $record['extra']['line']);
        }

        $message = ['message' => $record['message']];
        if ($record['context']) {
            $message['context'] = $record['context'];
        }
        if ($record['extra']) {
            $message['extra'] = $record['extra'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }
        if (count($message) === 1) {
            $message = reset($message);
        }

        return [
<<<<<<< HEAD
            $record->channel,
            $message,
            $backtrace,
            $this->toWildfireLevel($record->level),
=======
            $record['channel'],
            $message,
            $backtrace,
            $this->logLevels[$record['level']],
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        ];
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function formatBatch(array $records)
    {
        $formatted = [];

        foreach ($records as $record) {
            $formatted[] = $this->format($record);
        }

        return $formatted;
    }
}
