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

use Monolog\Formatter\LineFormatter;
use Monolog\Formatter\FormatterInterface;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
use Predis\Client as Predis;
use Redis;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends the message to a Redis Pub/Sub channel using PUBLISH
 *
 * usage example:
 *
 *   $log = new Logger('application');
<<<<<<< HEAD
 *   $redis = new RedisPubSubHandler(new Predis\Client("tcp://localhost:6379"), "logs", Level::Warning);
=======
 *   $redis = new RedisPubSubHandler(new Predis\Client("tcp://localhost:6379"), "logs", Logger::WARNING);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 *   $log->pushHandler($redis);
 *
 * @author Gaëtan Faugère <gaetan@fauge.re>
 */
class RedisPubSubHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    /** @var Predis<Predis>|Redis */
    private Predis|Redis $redisClient;
    private string $channelKey;

    /**
     * @param Predis<Predis>|Redis $redis The redis instance
     * @param string               $key   The channel key to publish records to
     */
    public function __construct(Predis|Redis $redis, string $key, int|string|Level $level = Level::Debug, bool $bubble = true)
    {
=======
    /** @var \Predis\Client<\Predis\Client>|\Redis */
    private $redisClient;
    /** @var string */
    private $channelKey;

    /**
     * @param \Predis\Client<\Predis\Client>|\Redis $redis The redis instance
     * @param string                $key   The channel key to publish records to
     */
    public function __construct($redis, string $key, $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!(($redis instanceof \Predis\Client) || ($redis instanceof \Redis))) {
            throw new \InvalidArgumentException('Predis\Client or Redis instance required');
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        $this->redisClient = $redis;
        $this->channelKey = $key;

        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->redisClient->publish($this->channelKey, $record->formatted);
    }

    /**
     * @inheritDoc
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->redisClient->publish($this->channelKey, $record["formatted"]);
    }

    /**
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new LineFormatter();
    }
}
