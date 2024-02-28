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
use Monolog\Formatter\NormalizerFormatter;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Handler sending logs to Zend Monitor
 *
 * @author  Christian Bergau <cbergau86@gmail.com>
 * @author  Jason Davis <happydude@jasondavis.net>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class ZendMonitorHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * @throws MissingExtensionException
     */
    public function __construct(int|string|Level $level = Level::Debug, bool $bubble = true)
=======
     * Monolog level / ZendMonitor Custom Event priority map
     *
     * @var array<int, int>
     */
    protected $levelMap = [];

    /**
     * @throws MissingExtensionException
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!function_exists('zend_monitor_custom_event')) {
            throw new MissingExtensionException(
                'You must have Zend Server installed with Zend Monitor enabled in order to use this handler'
            );
        }
<<<<<<< HEAD

=======
        //zend monitor constants are not defined if zend monitor is not enabled.
        $this->levelMap = [
            Logger::DEBUG     => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::INFO      => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::NOTICE    => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::WARNING   => \ZEND_MONITOR_EVENT_SEVERITY_WARNING,
            Logger::ERROR     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::CRITICAL  => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::ALERT     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::EMERGENCY => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
        ];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * Translates Monolog log levels to ZendMonitor levels.
     */
    protected function toZendMonitorLevel(Level $level): int
    {
        return match ($level) {
            Level::Debug     => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Level::Info      => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Level::Notice    => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Level::Warning   => \ZEND_MONITOR_EVENT_SEVERITY_WARNING,
            Level::Error     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Level::Critical  => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Level::Alert     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Level::Emergency => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
        };
    }

    /**
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->writeZendMonitorCustomEvent(
            $record->level->getName(),
            $record->message,
            $record->formatted,
            $this->toZendMonitorLevel($record->level)
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->writeZendMonitorCustomEvent(
            Logger::getLevelName($record['level']),
            $record['message'],
            $record['formatted'],
            $this->levelMap[$record['level']]
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        );
    }

    /**
     * Write to Zend Monitor Events
<<<<<<< HEAD
     * @param string       $type      Text displayed in "Class Name (custom)" field
     * @param string       $message   Text displayed in "Error String"
     * @param array<mixed> $formatted Displayed in Custom Variables tab
     * @param int          $severity  Set the event severity level (-1,0,1)
=======
     * @param string $type      Text displayed in "Class Name (custom)" field
     * @param string $message   Text displayed in "Error String"
     * @param array  $formatted Displayed in Custom Variables tab
     * @param int    $severity  Set the event severity level (-1,0,1)
     *
     * @phpstan-param FormattedRecord $formatted
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function writeZendMonitorCustomEvent(string $type, string $message, array $formatted, int $severity): void
    {
        zend_monitor_custom_event($type, $message, $formatted, $severity);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getDefaultFormatter(): FormatterInterface
    {
        return new NormalizerFormatter();
    }
<<<<<<< HEAD
=======

    /**
     * @return array<int, int>
     */
    public function getLevelMap(): array
    {
        return $this->levelMap;
    }
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
}
