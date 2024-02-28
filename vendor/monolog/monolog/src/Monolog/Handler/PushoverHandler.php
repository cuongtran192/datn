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
use Monolog\Utils;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends notifications through the pushover api to mobile phones
 *
 * @author Sebastian Göttschkes <sebastian.goettschkes@googlemail.com>
 * @see    https://www.pushover.net/api
<<<<<<< HEAD
 */
class PushoverHandler extends SocketHandler
{
    private string $token;

    /** @var array<int|string> */
    private array $users;

    private string $title;

    private string|int|null $user = null;

    private int $retry;

    private int $expire;

    private Level $highPriorityLevel;

    private Level $emergencyLevel;

    private bool $useFormattedMessage = false;
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class PushoverHandler extends SocketHandler
{
    /** @var string */
    private $token;
    /** @var array<int|string> */
    private $users;
    /** @var string */
    private $title;
    /** @var string|int|null */
    private $user = null;
    /** @var int */
    private $retry;
    /** @var int */
    private $expire;

    /** @var int */
    private $highPriorityLevel;
    /** @var int */
    private $emergencyLevel;
    /** @var bool */
    private $useFormattedMessage = false;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * All parameters that can be sent to Pushover
     * @see https://pushover.net/api
     * @var array<string, bool>
     */
<<<<<<< HEAD
    private array $parameterNames = [
=======
    private $parameterNames = [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        'token' => true,
        'user' => true,
        'message' => true,
        'device' => true,
        'title' => true,
        'url' => true,
        'url_title' => true,
        'priority' => true,
        'timestamp' => true,
        'sound' => true,
        'retry' => true,
        'expire' => true,
        'callback' => true,
    ];

    /**
     * Sounds the api supports by default
     * @see https://pushover.net/api#sounds
     * @var string[]
     */
<<<<<<< HEAD
    private array $sounds = [
=======
    private $sounds = [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        'pushover', 'bike', 'bugle', 'cashregister', 'classical', 'cosmic', 'falling', 'gamelan', 'incoming',
        'intermission', 'magic', 'mechanical', 'pianobar', 'siren', 'spacealarm', 'tugboat', 'alien', 'climb',
        'persistent', 'echo', 'updown', 'none',
    ];

    /**
<<<<<<< HEAD
     * @param string       $token  Pushover api token
     * @param string|array $users  Pushover user id or array of ids the message will be sent to
     * @param string|null  $title  Title sent to the Pushover API
     * @param bool         $useSSL Whether to connect via SSL. Required when pushing messages to users that are not
     *                             the pushover.net app owner. OpenSSL is required for this option.
     * @param int          $retry  The retry parameter specifies how often (in seconds) the Pushover servers will
     *                             send the same notification to the user.
     * @param int          $expire The expire parameter specifies how many seconds your notification will continue
     *                             to be retried for (every retry seconds).
     *
     * @param int|string|Level|LogLevel::* $highPriorityLevel The minimum logging level at which this handler will start
     *                                                                  sending "high priority" requests to the Pushover API
     * @param int|string|Level|LogLevel::* $emergencyLevel    The minimum logging level at which this handler will start
     *                                                                  sending "emergency" requests to the Pushover API
     *
     *
     * @phpstan-param string|array<int|string>    $users
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $highPriorityLevel
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $emergencyLevel
=======
     * @param string       $token             Pushover api token
     * @param string|array $users             Pushover user id or array of ids the message will be sent to
     * @param string|null  $title             Title sent to the Pushover API
     * @param bool         $useSSL            Whether to connect via SSL. Required when pushing messages to users that are not
     *                                        the pushover.net app owner. OpenSSL is required for this option.
     * @param string|int   $highPriorityLevel The minimum logging level at which this handler will start
     *                                        sending "high priority" requests to the Pushover API
     * @param string|int   $emergencyLevel    The minimum logging level at which this handler will start
     *                                        sending "emergency" requests to the Pushover API
     * @param int          $retry             The retry parameter specifies how often (in seconds) the Pushover servers will
     *                                        send the same notification to the user.
     * @param int          $expire            The expire parameter specifies how many seconds your notification will continue
     *                                        to be retried for (every retry seconds).
     *
     * @phpstan-param string|array<int|string>    $users
     * @phpstan-param Level|LevelName|LogLevel::* $highPriorityLevel
     * @phpstan-param Level|LevelName|LogLevel::* $emergencyLevel
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function __construct(
        string $token,
        $users,
        ?string $title = null,
<<<<<<< HEAD
        int|string|Level $level = Level::Critical,
        bool $bubble = true,
        bool $useSSL = true,
        int|string|Level $highPriorityLevel = Level::Critical,
        int|string|Level $emergencyLevel = Level::Emergency,
=======
        $level = Logger::CRITICAL,
        bool $bubble = true,
        bool $useSSL = true,
        $highPriorityLevel = Logger::CRITICAL,
        $emergencyLevel = Logger::EMERGENCY,
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        int $retry = 30,
        int $expire = 25200,
        bool $persistent = false,
        float $timeout = 0.0,
        float $writingTimeout = 10.0,
        ?float $connectionTimeout = null,
        ?int $chunkSize = null
    ) {
        $connectionString = $useSSL ? 'ssl://api.pushover.net:443' : 'api.pushover.net:80';
        parent::__construct(
            $connectionString,
            $level,
            $bubble,
            $persistent,
            $timeout,
            $writingTimeout,
            $connectionTimeout,
            $chunkSize
        );

        $this->token = $token;
        $this->users = (array) $users;
<<<<<<< HEAD
        $this->title = $title ?? (string) gethostname();
=======
        $this->title = $title ?: (string) gethostname();
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        $this->highPriorityLevel = Logger::toMonologLevel($highPriorityLevel);
        $this->emergencyLevel = Logger::toMonologLevel($emergencyLevel);
        $this->retry = $retry;
        $this->expire = $expire;
    }

<<<<<<< HEAD
    protected function generateDataStream(LogRecord $record): string
=======
    protected function generateDataStream(array $record): string
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $content = $this->buildContent($record);

        return $this->buildHeader($content) . $content;
    }

<<<<<<< HEAD
    private function buildContent(LogRecord $record): string
=======
    /**
     * @phpstan-param FormattedRecord $record
     */
    private function buildContent(array $record): string
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        // Pushover has a limit of 512 characters on title and message combined.
        $maxMessageLength = 512 - strlen($this->title);

<<<<<<< HEAD
        $message = ($this->useFormattedMessage) ? $record->formatted : $record->message;
        $message = Utils::substr($message, 0, $maxMessageLength);

        $timestamp = $record->datetime->getTimestamp();
=======
        $message = ($this->useFormattedMessage) ? $record['formatted'] : $record['message'];
        $message = Utils::substr($message, 0, $maxMessageLength);

        $timestamp = $record['datetime']->getTimestamp();
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        $dataArray = [
            'token' => $this->token,
            'user' => $this->user,
            'message' => $message,
            'title' => $this->title,
            'timestamp' => $timestamp,
        ];

<<<<<<< HEAD
        if ($record->level->value >= $this->emergencyLevel->value) {
            $dataArray['priority'] = 2;
            $dataArray['retry'] = $this->retry;
            $dataArray['expire'] = $this->expire;
        } elseif ($record->level->value >= $this->highPriorityLevel->value) {
=======
        if (isset($record['level']) && $record['level'] >= $this->emergencyLevel) {
            $dataArray['priority'] = 2;
            $dataArray['retry'] = $this->retry;
            $dataArray['expire'] = $this->expire;
        } elseif (isset($record['level']) && $record['level'] >= $this->highPriorityLevel) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $dataArray['priority'] = 1;
        }

        // First determine the available parameters
<<<<<<< HEAD
        $context = array_intersect_key($record->context, $this->parameterNames);
        $extra = array_intersect_key($record->extra, $this->parameterNames);
=======
        $context = array_intersect_key($record['context'], $this->parameterNames);
        $extra = array_intersect_key($record['extra'], $this->parameterNames);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        // Least important info should be merged with subsequent info
        $dataArray = array_merge($extra, $context, $dataArray);

        // Only pass sounds that are supported by the API
<<<<<<< HEAD
        if (isset($dataArray['sound']) && !in_array($dataArray['sound'], $this->sounds, true)) {
=======
        if (isset($dataArray['sound']) && !in_array($dataArray['sound'], $this->sounds)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            unset($dataArray['sound']);
        }

        return http_build_query($dataArray);
    }

    private function buildHeader(string $content): string
    {
        $header = "POST /1/messages.json HTTP/1.1\r\n";
        $header .= "Host: api.pushover.net\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }

<<<<<<< HEAD
    protected function write(LogRecord $record): void
=======
    protected function write(array $record): void
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        foreach ($this->users as $user) {
            $this->user = $user;

            parent::write($record);
            $this->closeSocket();
        }

        $this->user = null;
    }

    /**
<<<<<<< HEAD
     * @param int|string|Level|LogLevel::* $level
     * @return $this
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function setHighPriorityLevel(int|string|Level $level): self
    {
        $this->highPriorityLevel = Logger::toMonologLevel($level);
=======
     * @param int|string $value
     *
     * @phpstan-param Level|LevelName|LogLevel::* $value
     */
    public function setHighPriorityLevel($value): self
    {
        $this->highPriorityLevel = Logger::toMonologLevel($value);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $this;
    }

    /**
<<<<<<< HEAD
     * @param int|string|Level|LogLevel::* $level
     * @return $this
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function setEmergencyLevel(int|string|Level $level): self
    {
        $this->emergencyLevel = Logger::toMonologLevel($level);
=======
     * @param int|string $value
     *
     * @phpstan-param Level|LevelName|LogLevel::* $value
     */
    public function setEmergencyLevel($value): self
    {
        $this->emergencyLevel = Logger::toMonologLevel($value);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $this;
    }

    /**
     * Use the formatted message?
<<<<<<< HEAD
     *
     * @return $this
     */
    public function useFormattedMessage(bool $useFormattedMessage): self
    {
        $this->useFormattedMessage = $useFormattedMessage;
=======
     */
    public function useFormattedMessage(bool $value): self
    {
        $this->useFormattedMessage = $value;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $this;
    }
}
