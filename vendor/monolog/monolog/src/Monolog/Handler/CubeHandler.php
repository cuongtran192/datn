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
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Logs to Cube.
 *
 * @link https://github.com/square/cube/wiki
 * @author Wan Chen <kami@kamisama.me>
 * @deprecated Since 2.8.0 and 3.2.0, Cube appears abandoned and thus we will drop this handler in Monolog 4
 */
class CubeHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    private ?\Socket $udpConnection = null;
    private ?\CurlHandle $httpConnection = null;
    private string $scheme;
    private string $host;
    private int $port;
    /** @var string[] */
    private array $acceptedSchemes = ['http', 'udp'];
=======
    /** @var resource|\Socket|null */
    private $udpConnection = null;
    /** @var resource|\CurlHandle|null */
    private $httpConnection = null;
    /** @var string */
    private $scheme;
    /** @var string */
    private $host;
    /** @var int */
    private $port;
    /** @var string[] */
    private $acceptedSchemes = ['http', 'udp'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Create a Cube handler
     *
     * @throws \UnexpectedValueException when given url is not a valid url.
     *                                   A valid url must consist of three parts : protocol://host:port
     *                                   Only valid protocols used by Cube are http and udp
     */
<<<<<<< HEAD
    public function __construct(string $url, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    public function __construct(string $url, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $urlInfo = parse_url($url);

        if ($urlInfo === false || !isset($urlInfo['scheme'], $urlInfo['host'], $urlInfo['port'])) {
            throw new \UnexpectedValueException('URL "'.$url.'" is not valid');
        }

<<<<<<< HEAD
        if (!in_array($urlInfo['scheme'], $this->acceptedSchemes, true)) {
=======
        if (!in_array($urlInfo['scheme'], $this->acceptedSchemes)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            throw new \UnexpectedValueException(
                'Invalid protocol (' . $urlInfo['scheme']  . ').'
                . ' Valid options are ' . implode(', ', $this->acceptedSchemes)
            );
        }

        $this->scheme = $urlInfo['scheme'];
        $this->host = $urlInfo['host'];
<<<<<<< HEAD
        $this->port = $urlInfo['port'];
=======
        $this->port = (int) $urlInfo['port'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        parent::__construct($level, $bubble);
    }

    /**
     * Establish a connection to an UDP socket
     *
     * @throws \LogicException           when unable to connect to the socket
     * @throws MissingExtensionException when there is no socket extension
     */
    protected function connectUdp(): void
    {
        if (!extension_loaded('sockets')) {
            throw new MissingExtensionException('The sockets extension is required to use udp URLs with the CubeHandler');
        }

        $udpConnection = socket_create(AF_INET, SOCK_DGRAM, 0);
        if (false === $udpConnection) {
            throw new \LogicException('Unable to create a socket');
        }

        $this->udpConnection = $udpConnection;
        if (!socket_connect($this->udpConnection, $this->host, $this->port)) {
            throw new \LogicException('Unable to connect to the socket at ' . $this->host . ':' . $this->port);
        }
    }

    /**
     * Establish a connection to an http server
     *
     * @throws \LogicException           when unable to connect to the socket
     * @throws MissingExtensionException when no curl extension
     */
    protected function connectHttp(): void
    {
        if (!extension_loaded('curl')) {
            throw new MissingExtensionException('The curl extension is required to use http URLs with the CubeHandler');
        }

        $httpConnection = curl_init('http://'.$this->host.':'.$this->port.'/1.0/event/put');
        if (false === $httpConnection) {
            throw new \LogicException('Unable to connect to ' . $this->host . ':' . $this->port);
        }

        $this->httpConnection = $httpConnection;
        curl_setopt($this->httpConnection, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($this->httpConnection, CURLOPT_RETURNTRANSFER, true);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $date = $record->datetime;

        $data = ['time' => $date->format('Y-m-d\TH:i:s.uO')];
        $context = $record->context;

        if (isset($context['type'])) {
            $data['type'] = $context['type'];
            unset($context['type']);
        } else {
            $data['type'] = $record->channel;
        }

        $data['data'] = $context;
        $data['data']['level'] = $record->level;
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $date = $record['datetime'];

        $data = ['time' => $date->format('Y-m-d\TH:i:s.uO')];
        unset($record['datetime']);

        if (isset($record['context']['type'])) {
            $data['type'] = $record['context']['type'];
            unset($record['context']['type']);
        } else {
            $data['type'] = $record['channel'];
        }

        $data['data'] = $record['context'];
        $data['data']['level'] = $record['level'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        if ($this->scheme === 'http') {
            $this->writeHttp(Utils::jsonEncode($data));
        } else {
            $this->writeUdp(Utils::jsonEncode($data));
        }
    }

    private function writeUdp(string $data): void
    {
<<<<<<< HEAD
        if (null === $this->udpConnection) {
            $this->connectUdp();
        }

        if (null === $this->udpConnection) {
            throw new \LogicException('No UDP socket could be opened');
        }

=======
        if (!$this->udpConnection) {
            $this->connectUdp();
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        socket_send($this->udpConnection, $data, strlen($data), 0);
    }

    private function writeHttp(string $data): void
    {
<<<<<<< HEAD
        if (null === $this->httpConnection) {
=======
        if (!$this->httpConnection) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $this->connectHttp();
        }

        if (null === $this->httpConnection) {
            throw new \LogicException('No connection could be established');
        }

        curl_setopt($this->httpConnection, CURLOPT_POSTFIELDS, '['.$data.']');
        curl_setopt($this->httpConnection, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen('['.$data.']'),
        ]);

        Curl\Util::execute($this->httpConnection, 5, false);
    }
}
