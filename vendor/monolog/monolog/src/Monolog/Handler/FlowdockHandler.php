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
use Monolog\Utils;
use Monolog\Formatter\FlowdockFormatter;
use Monolog\Formatter\FormatterInterface;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
use Monolog\Formatter\FlowdockFormatter;
use Monolog\Formatter\FormatterInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends notifications through the Flowdock push API
 *
 * This must be configured with a FlowdockFormatter instance via setFormatter()
 *
 * Notes:
 * API token - Flowdock API token
 *
 * @author Dominik Liebler <liebler.dominik@gmail.com>
 * @see https://www.flowdock.com/api/push
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 * @deprecated Since 2.9.0 and 3.3.0, Flowdock was shutdown we will thus drop this handler in Monolog 4
 */
class FlowdockHandler extends SocketHandler
{
<<<<<<< HEAD
    protected string $apiToken;
=======
    /**
     * @var string
     */
    protected $apiToken;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @throws MissingExtensionException if OpenSSL is missing
     */
    public function __construct(
        string $apiToken,
<<<<<<< HEAD
        $level = Level::Debug,
=======
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
            throw new MissingExtensionException('The OpenSSL PHP extension is required to use the FlowdockHandler');
        }

        parent::__construct(
            'ssl://api.flowdock.com:443',
            $level,
            $bubble,
            $persistent,
            $timeout,
            $writingTimeout,
            $connectionTimeout,
            $chunkSize
        );
        $this->apiToken = $apiToken;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if (!$formatter instanceof FlowdockFormatter) {
            throw new \InvalidArgumentException('The FlowdockHandler requires an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
        }

        return parent::setFormatter($formatter);
    }

    /**
     * Gets the default formatter.
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        throw new \InvalidArgumentException('The FlowdockHandler must be configured (via setFormatter) with an instance of Monolog\Formatter\FlowdockFormatter to function correctly');
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
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
     * Builds the body of API call
<<<<<<< HEAD
     */
    private function buildContent(LogRecord $record): string
    {
        return Utils::jsonEncode($record->formatted);
=======
     *
     * @phpstan-param FormattedRecord $record
     */
    private function buildContent(array $record): string
    {
        return Utils::jsonEncode($record['formatted']['flowdock']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    /**
     * Builds the header of the API Call
     */
    private function buildHeader(string $content): string
    {
        $header = "POST /v1/messages/team_inbox/" . $this->apiToken . " HTTP/1.1\r\n";
        $header .= "Host: api.flowdock.com\r\n";
        $header .= "Content-Type: application/json\r\n";
        $header .= "Content-Length: " . strlen($content) . "\r\n";
        $header .= "\r\n";

        return $header;
    }
}
