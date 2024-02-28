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
use Monolog\Formatter\LineFormatter;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends logs to Fleep.io using Webhook integrations
 *
 * You'll need a Fleep.io account to use this handler.
 *
 * @see https://fleep.io/integrations/webhooks/ Fleep Webhooks Documentation
 * @author Ando Roots <ando@sqroot.eu>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class FleepHookHandler extends SocketHandler
{
    protected const FLEEP_HOST = 'fleep.io';

    protected const FLEEP_HOOK_URI = '/hook/';

    /**
     * @var string Webhook token (specifies the conversation where logs are sent)
     */
<<<<<<< HEAD
    protected string $token;
=======
    protected $token;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Construct a new Fleep.io Handler.
     *
     * For instructions on how to create a new web hook in your conversations
     * see https://fleep.io/integrations/webhooks/
     *
<<<<<<< HEAD
     * @param  string                    $token Webhook token
     * @throws MissingExtensionException if OpenSSL is missing
     */
    public function __construct(
        string $token,
        $level = Level::Debug,
=======
     * @param  string                    $token  Webhook token
     * @throws MissingExtensionException
     */
    public function __construct(
        string $token,
        $level = Logger::DEBUG,
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        bool $bubble = true,
        bool $persistent = false,
        float $timeout = 0.0,
        float $writingTimeout = 10.0,
        ?float $connectionTimeout = null,
        ?int $chunkSize = null
    ) {
        if (!extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP extension is required to use the FleepHookHandler');
        }

        $this->token = $token;

        $connectionString = 'ssl://' . static::FLEEP_HOST . ':443';
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
    }

    /**
     * Returns the default formatter to use with this handler
     *
     * Overloaded to remove empty context and extra arrays from the end of the log message.
     *
     * @return LineFormatter
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LineFormatter(null, null, true, true);
    }

    /**
     * Handles a log record
     */
<<<<<<< HEAD
    public function write(LogRecord $record): void
=======
    public function write(array $record): void
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::write($record);
        $this->closeSocket();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function generateDataStream(LogRecord $record): string
=======
     * {@inheritDoc}
     */
    protected function generateDataStream(array $record): string
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $content = $this->buildContent($record);

        return $this->buildHeader($content) . $content;
    }

    /**
     * Builds the header of the API Call
     */
    private function buildHeader(string $content): string
    {
        $header = "POST " . static::FLEEP_HOOK_URI . $this->token . " HTTP/1.1\r\n";
        $header .= "Host: " . static::FLEEP_HOST . "\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }

    /**
     * Builds the body of API call
<<<<<<< HEAD
     */
    private function buildContent(LogRecord $record): string
    {
        $dataArray = [
            'message' => $record->formatted,
=======
     *
     * @phpstan-param FormattedRecord $record
     */
    private function buildContent(array $record): string
    {
        $dataArray = [
            'message' => $record['formatted'],
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        ];

        return http_build_query($dataArray);
    }
}
