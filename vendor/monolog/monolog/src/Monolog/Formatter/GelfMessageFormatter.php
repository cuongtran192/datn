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
use Gelf\Message;
use Monolog\Utils;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Gelf\Message;
use Monolog\Utils;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Serializes a log message to GELF
 * @see http://docs.graylog.org/en/latest/pages/gelf.html
 *
 * @author Matt Lehner <mlehner@gmail.com>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class GelfMessageFormatter extends NormalizerFormatter
{
    protected const DEFAULT_MAX_LENGTH = 32766;

    /**
     * @var string the name of the system for the Gelf log message
     */
<<<<<<< HEAD
    protected string $systemName;
=======
    protected $systemName;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var string a prefix for 'extra' fields from the Monolog record (optional)
     */
<<<<<<< HEAD
    protected string $extraPrefix;
=======
    protected $extraPrefix;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var string a prefix for 'context' fields from the Monolog record (optional)
     */
<<<<<<< HEAD
    protected string $contextPrefix;
=======
    protected $contextPrefix;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var int max length per field
     */
<<<<<<< HEAD
    protected int $maxLength;

    /**
     * Translates Monolog log levels to Graylog2 log priorities.
     */
    private function getGraylog2Priority(Level $level): int
    {
        return match ($level) {
            Level::Debug     => 7,
            Level::Info      => 6,
            Level::Notice    => 5,
            Level::Warning   => 4,
            Level::Error     => 3,
            Level::Critical  => 2,
            Level::Alert     => 1,
            Level::Emergency => 0,
        };
    }

    /**
     * @throws \RuntimeException
     */
=======
    protected $maxLength;

    /**
     * @var int
     */
    private $gelfVersion = 2;

    /**
     * Translates Monolog log levels to Graylog2 log priorities.
     *
     * @var array<int, int>
     *
     * @phpstan-var array<Level, int>
     */
    private $logLevels = [
        Logger::DEBUG     => 7,
        Logger::INFO      => 6,
        Logger::NOTICE    => 5,
        Logger::WARNING   => 4,
        Logger::ERROR     => 3,
        Logger::CRITICAL  => 2,
        Logger::ALERT     => 1,
        Logger::EMERGENCY => 0,
    ];

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    public function __construct(?string $systemName = null, ?string $extraPrefix = null, string $contextPrefix = 'ctxt_', ?int $maxLength = null)
    {
        if (!class_exists(Message::class)) {
            throw new \RuntimeException('Composer package graylog2/gelf-php is required to use Monolog\'s GelfMessageFormatter');
        }

        parent::__construct('U.u');

<<<<<<< HEAD
        $this->systemName = (null === $systemName || $systemName === '') ? (string) gethostname() : $systemName;

        $this->extraPrefix = null === $extraPrefix ? '' : $extraPrefix;
        $this->contextPrefix = $contextPrefix;
        $this->maxLength = null === $maxLength ? self::DEFAULT_MAX_LENGTH : $maxLength;
    }

    /**
     * @inheritDoc
     */
    public function format(LogRecord $record): Message
    {
        $context = $extra = [];
        if (isset($record->context)) {
            /** @var mixed[] $context */
            $context = parent::normalize($record->context);
        }
        if (isset($record->extra)) {
            /** @var mixed[] $extra */
            $extra = parent::normalize($record->extra);
=======
        $this->systemName = (is_null($systemName) || $systemName === '') ? (string) gethostname() : $systemName;

        $this->extraPrefix = is_null($extraPrefix) ? '' : $extraPrefix;
        $this->contextPrefix = $contextPrefix;
        $this->maxLength = is_null($maxLength) ? self::DEFAULT_MAX_LENGTH : $maxLength;

        if (method_exists(Message::class, 'setFacility')) {
            $this->gelfVersion = 1;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function format(array $record): Message
    {
        $context = $extra = [];
        if (isset($record['context'])) {
            /** @var mixed[] $context */
            $context = parent::normalize($record['context']);
        }
        if (isset($record['extra'])) {
            /** @var mixed[] $extra */
            $extra = parent::normalize($record['extra']);
        }

        if (!isset($record['datetime'], $record['message'], $record['level'])) {
            throw new \InvalidArgumentException('The record should at least contain datetime, message and level keys, '.var_export($record, true).' given');
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        $message = new Message();
        $message
<<<<<<< HEAD
            ->setTimestamp($record->datetime)
            ->setShortMessage($record->message)
            ->setHost($this->systemName)
            ->setLevel($this->getGraylog2Priority($record->level));

        // message length + system name length + 200 for padding / metadata
        $len = 200 + strlen($record->message) + strlen($this->systemName);

        if ($len > $this->maxLength) {
            $message->setShortMessage(Utils::substr($record->message, 0, $this->maxLength));
        }

        if (isset($record->channel)) {
            $message->setAdditional('facility', $record->channel);
=======
            ->setTimestamp($record['datetime'])
            ->setShortMessage((string) $record['message'])
            ->setHost($this->systemName)
            ->setLevel($this->logLevels[$record['level']]);

        // message length + system name length + 200 for padding / metadata
        $len = 200 + strlen((string) $record['message']) + strlen($this->systemName);

        if ($len > $this->maxLength) {
            $message->setShortMessage(Utils::substr($record['message'], 0, $this->maxLength));
        }

        if ($this->gelfVersion === 1) {
            if (isset($record['channel'])) {
                $message->setFacility($record['channel']);
            }
            if (isset($extra['line'])) {
                $message->setLine($extra['line']);
                unset($extra['line']);
            }
            if (isset($extra['file'])) {
                $message->setFile($extra['file']);
                unset($extra['file']);
            }
        } else {
            $message->setAdditional('facility', $record['channel']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        foreach ($extra as $key => $val) {
            $val = is_scalar($val) || null === $val ? $val : $this->toJson($val);
            $len = strlen($this->extraPrefix . $key . $val);
            if ($len > $this->maxLength) {
                $message->setAdditional($this->extraPrefix . $key, Utils::substr((string) $val, 0, $this->maxLength));

                continue;
            }
            $message->setAdditional($this->extraPrefix . $key, $val);
        }

        foreach ($context as $key => $val) {
            $val = is_scalar($val) || null === $val ? $val : $this->toJson($val);
            $len = strlen($this->contextPrefix . $key . $val);
            if ($len > $this->maxLength) {
                $message->setAdditional($this->contextPrefix . $key, Utils::substr((string) $val, 0, $this->maxLength));

                continue;
            }
            $message->setAdditional($this->contextPrefix . $key, $val);
        }

<<<<<<< HEAD
        if (!$message->hasAdditional('file') && isset($context['exception']['file'])) {
            if (1 === preg_match("/^(.+):([0-9]+)$/", $context['exception']['file'], $matches)) {
                $message->setAdditional('file', $matches[1]);
                $message->setAdditional('line', $matches[2]);
=======
        if ($this->gelfVersion === 1) {
            /** @phpstan-ignore-next-line */
            if (null === $message->getFile() && isset($context['exception']['file'])) {
                if (preg_match("/^(.+):([0-9]+)$/", $context['exception']['file'], $matches)) {
                    $message->setFile($matches[1]);
                    $message->setLine($matches[2]);
                }
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            }
        }

        return $message;
    }
}
