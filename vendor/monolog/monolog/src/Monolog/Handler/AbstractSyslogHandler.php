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
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\LineFormatter;

/**
 * Common syslog functionality
<<<<<<< HEAD
 */
abstract class AbstractSyslogHandler extends AbstractProcessingHandler
{
    protected int $facility;
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 */
abstract class AbstractSyslogHandler extends AbstractProcessingHandler
{
    /** @var int */
    protected $facility;

    /**
     * Translates Monolog log levels to syslog log priorities.
     * @var array
     * @phpstan-var array<Level, int>
     */
    protected $logLevels = [
        Logger::DEBUG     => LOG_DEBUG,
        Logger::INFO      => LOG_INFO,
        Logger::NOTICE    => LOG_NOTICE,
        Logger::WARNING   => LOG_WARNING,
        Logger::ERROR     => LOG_ERR,
        Logger::CRITICAL  => LOG_CRIT,
        Logger::ALERT     => LOG_ALERT,
        Logger::EMERGENCY => LOG_EMERG,
    ];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * List of valid log facility names.
     * @var array<string, int>
     */
<<<<<<< HEAD
    protected array $facilities = [
        'auth'     => \LOG_AUTH,
        'authpriv' => \LOG_AUTHPRIV,
        'cron'     => \LOG_CRON,
        'daemon'   => \LOG_DAEMON,
        'kern'     => \LOG_KERN,
        'lpr'      => \LOG_LPR,
        'mail'     => \LOG_MAIL,
        'news'     => \LOG_NEWS,
        'syslog'   => \LOG_SYSLOG,
        'user'     => \LOG_USER,
        'uucp'     => \LOG_UUCP,
    ];

    /**
     * Translates Monolog log levels to syslog log priorities.
     */
    protected function toSyslogPriority(Level $level): int
    {
        return $level->toRFC5424Level();
    }

    /**
     * @param string|int $facility Either one of the names of the keys in $this->facilities, or a LOG_* facility constant
     */
    public function __construct(string|int $facility = \LOG_USER, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    protected $facilities = [
        'auth'     => LOG_AUTH,
        'authpriv' => LOG_AUTHPRIV,
        'cron'     => LOG_CRON,
        'daemon'   => LOG_DAEMON,
        'kern'     => LOG_KERN,
        'lpr'      => LOG_LPR,
        'mail'     => LOG_MAIL,
        'news'     => LOG_NEWS,
        'syslog'   => LOG_SYSLOG,
        'user'     => LOG_USER,
        'uucp'     => LOG_UUCP,
    ];

    /**
     * @param string|int $facility Either one of the names of the keys in $this->facilities, or a LOG_* facility constant
     */
    public function __construct($facility = LOG_USER, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);

        if (!defined('PHP_WINDOWS_VERSION_BUILD')) {
<<<<<<< HEAD
            $this->facilities['local0'] = \LOG_LOCAL0;
            $this->facilities['local1'] = \LOG_LOCAL1;
            $this->facilities['local2'] = \LOG_LOCAL2;
            $this->facilities['local3'] = \LOG_LOCAL3;
            $this->facilities['local4'] = \LOG_LOCAL4;
            $this->facilities['local5'] = \LOG_LOCAL5;
            $this->facilities['local6'] = \LOG_LOCAL6;
            $this->facilities['local7'] = \LOG_LOCAL7;
=======
            $this->facilities['local0'] = LOG_LOCAL0;
            $this->facilities['local1'] = LOG_LOCAL1;
            $this->facilities['local2'] = LOG_LOCAL2;
            $this->facilities['local3'] = LOG_LOCAL3;
            $this->facilities['local4'] = LOG_LOCAL4;
            $this->facilities['local5'] = LOG_LOCAL5;
            $this->facilities['local6'] = LOG_LOCAL6;
            $this->facilities['local7'] = LOG_LOCAL7;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        } else {
            $this->facilities['local0'] = 128; // LOG_LOCAL0
            $this->facilities['local1'] = 136; // LOG_LOCAL1
            $this->facilities['local2'] = 144; // LOG_LOCAL2
            $this->facilities['local3'] = 152; // LOG_LOCAL3
            $this->facilities['local4'] = 160; // LOG_LOCAL4
            $this->facilities['local5'] = 168; // LOG_LOCAL5
            $this->facilities['local6'] = 176; // LOG_LOCAL6
            $this->facilities['local7'] = 184; // LOG_LOCAL7
        }

        // convert textual description of facility to syslog constant
        if (is_string($facility) && array_key_exists(strtolower($facility), $this->facilities)) {
            $facility = $this->facilities[strtolower($facility)];
        } elseif (!in_array($facility, array_values($this->facilities), true)) {
            throw new \UnexpectedValueException('Unknown facility value "'.$facility.'" given');
        }

        $this->facility = $facility;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LineFormatter('%channel%.%level_name%: %message% %context% %extra%');
    }
}
