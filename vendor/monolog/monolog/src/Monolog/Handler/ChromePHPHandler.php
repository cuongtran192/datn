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

use Monolog\Formatter\ChromePHPFormatter;
use Monolog\Formatter\FormatterInterface;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\Utils;
use Monolog\LogRecord;
use Monolog\DateTimeImmutable;
=======
use Monolog\Logger;
use Monolog\Utils;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Handler sending logs to the ChromePHP extension (http://www.chromephp.com/)
 *
 * This also works out of the box with Firefox 43+
 *
 * @author Christophe Coevoet <stof@notk.org>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class ChromePHPHandler extends AbstractProcessingHandler
{
    use WebRequestRecognizerTrait;

    /**
     * Version of the extension
     */
    protected const VERSION = '4.0';

    /**
     * Header name
     */
    protected const HEADER_NAME = 'X-ChromeLogger-Data';

    /**
     * Regular expression to detect supported browsers (matches any Chrome, or Firefox 43+)
     */
    protected const USER_AGENT_REGEX = '{\b(?:Chrome/\d+(?:\.\d+)*|HeadlessChrome|Firefox/(?:4[3-9]|[5-9]\d|\d{3,})(?:\.\d)*)\b}';

<<<<<<< HEAD
    protected static bool $initialized = false;
=======
    /** @var bool */
    protected static $initialized = false;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Tracks whether we sent too much data
     *
     * Chrome limits the headers to 4KB, so when we sent 3KB we stop sending
<<<<<<< HEAD
     */
    protected static bool $overflowed = false;

    /** @var mixed[] */
    protected static array $json = [
=======
     *
     * @var bool
     */
    protected static $overflowed = false;

    /** @var mixed[] */
    protected static $json = [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        'version' => self::VERSION,
        'columns' => ['label', 'log', 'backtrace', 'type'],
        'rows' => [],
    ];

<<<<<<< HEAD
    protected static bool $sendHeaders = true;

    /**
     * @throws \RuntimeException If the function json_encode does not exist
     */
    public function __construct(int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    /** @var bool */
    protected static $sendHeaders = true;

    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);
        if (!function_exists('json_encode')) {
            throw new \RuntimeException('PHP\'s json extension is required to use Monolog\'s ChromePHPHandler');
        }
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
        if (!$this->isWebRequest()) {
            return;
        }

        $messages = [];

        foreach ($records as $record) {
<<<<<<< HEAD
            if ($record->level < $this->level) {
                continue;
            }

=======
            if ($record['level'] < $this->level) {
                continue;
            }
            /** @var Record $message */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $message = $this->processRecord($record);
            $messages[] = $message;
        }

<<<<<<< HEAD
        if (\count($messages) > 0) {
=======
        if (!empty($messages)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $messages = $this->getFormatter()->formatBatch($messages);
            self::$json['rows'] = array_merge(self::$json['rows'], $messages);
            $this->send();
        }
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
        return new ChromePHPFormatter();
    }

    /**
     * Creates & sends header for a record
     *
     * @see sendHeader()
     * @see send()
     */
<<<<<<< HEAD
    protected function write(LogRecord $record): void
=======
    protected function write(array $record): void
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!$this->isWebRequest()) {
            return;
        }

<<<<<<< HEAD
        self::$json['rows'][] = $record->formatted;
=======
        self::$json['rows'][] = $record['formatted'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        $this->send();
    }

    /**
     * Sends the log header
     *
     * @see sendHeader()
     */
    protected function send(): void
    {
        if (self::$overflowed || !self::$sendHeaders) {
            return;
        }

        if (!self::$initialized) {
            self::$initialized = true;

            self::$sendHeaders = $this->headersAccepted();
            if (!self::$sendHeaders) {
                return;
            }

            self::$json['request_uri'] = $_SERVER['REQUEST_URI'] ?? '';
        }

        $json = Utils::jsonEncode(self::$json, Utils::DEFAULT_JSON_FLAGS & ~JSON_UNESCAPED_UNICODE, true);
        $data = base64_encode($json);
        if (strlen($data) > 3 * 1024) {
            self::$overflowed = true;

<<<<<<< HEAD
            $record = new LogRecord(
                message: 'Incomplete logs, chrome header size limit reached',
                level: Level::Warning,
                channel: 'monolog',
                datetime: new DateTimeImmutable(true),
            );
=======
            $record = [
                'message' => 'Incomplete logs, chrome header size limit reached',
                'context' => [],
                'level' => Logger::WARNING,
                'level_name' => Logger::getLevelName(Logger::WARNING),
                'channel' => 'monolog',
                'datetime' => new \DateTimeImmutable(),
                'extra' => [],
            ];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            self::$json['rows'][count(self::$json['rows']) - 1] = $this->getFormatter()->format($record);
            $json = Utils::jsonEncode(self::$json, Utils::DEFAULT_JSON_FLAGS & ~JSON_UNESCAPED_UNICODE, true);
            $data = base64_encode($json);
        }

        if (trim($data) !== '') {
            $this->sendHeader(static::HEADER_NAME, $data);
        }
    }

    /**
     * Send header string to the client
     */
    protected function sendHeader(string $header, string $content): void
    {
        if (!headers_sent() && self::$sendHeaders) {
            header(sprintf('%s: %s', $header, $content));
        }
    }

    /**
     * Verifies if the headers are accepted by the current user agent
     */
    protected function headersAccepted(): bool
    {
<<<<<<< HEAD
        if (!isset($_SERVER['HTTP_USER_AGENT'])) {
=======
        if (empty($_SERVER['HTTP_USER_AGENT'])) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            return false;
        }

        return preg_match(static::USER_AGENT_REGEX, $_SERVER['HTTP_USER_AGENT']) === 1;
    }
}
