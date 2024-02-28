<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler\SyslogUdp;

use Monolog\Utils;
use Socket;

class UdpSocket
{
    protected const DATAGRAM_MAX_LENGTH = 65023;

<<<<<<< HEAD
    protected string $ip;
    protected int $port;
    protected ?Socket $socket = null;
=======
    /** @var string */
    protected $ip;
    /** @var int */
    protected $port;
    /** @var resource|Socket|null */
    protected $socket = null;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    public function __construct(string $ip, int $port = 514)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

<<<<<<< HEAD
    public function write(string $line, string $header = ""): void
=======
    /**
     * @param  string $line
     * @param  string $header
     * @return void
     */
    public function write($line, $header = "")
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->send($this->assembleMessage($line, $header));
    }

    public function close(): void
    {
<<<<<<< HEAD
        if ($this->socket instanceof Socket) {
=======
        if (is_resource($this->socket) || $this->socket instanceof Socket) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            socket_close($this->socket);
            $this->socket = null;
        }
    }

<<<<<<< HEAD
    protected function getSocket(): Socket
=======
    /**
     * @return resource|Socket
     */
    protected function getSocket()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (null !== $this->socket) {
            return $this->socket;
        }

        $domain = AF_INET;
        $protocol = SOL_UDP;
        // Check if we are using unix sockets.
        if ($this->port === 0) {
            $domain = AF_UNIX;
            $protocol = IPPROTO_IP;
        }

<<<<<<< HEAD
        $socket = socket_create($domain, SOCK_DGRAM, $protocol);
        if ($socket instanceof Socket) {
            return $this->socket = $socket;
        }

        throw new \RuntimeException('The UdpSocket to '.$this->ip.':'.$this->port.' could not be opened via socket_create');
=======
        $this->socket = socket_create($domain, SOCK_DGRAM, $protocol) ?: null;
        if (null === $this->socket) {
            throw new \RuntimeException('The UdpSocket to '.$this->ip.':'.$this->port.' could not be opened via socket_create');
        }

        return $this->socket;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    protected function send(string $chunk): void
    {
        socket_sendto($this->getSocket(), $chunk, strlen($chunk), $flags = 0, $this->ip, $this->port);
    }

    protected function assembleMessage(string $line, string $header): string
    {
        $chunkSize = static::DATAGRAM_MAX_LENGTH - strlen($header);

        return $header . Utils::substr($line, 0, $chunkSize);
    }
}
