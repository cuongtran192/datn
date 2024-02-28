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
 * Logs to a Redis key using rpush
 *
 * usage example:
 *
 *   $log = new Logger('application');
 *   $redis = new RedisHandler(new Predis\Client("tcp://localhost:6379"), "logs", "prod");
 *   $log->pushHandler($redis);
 *
 * @author Thomas Tourlourat <thomas@tourlourat.com>
<<<<<<< HEAD
 */
class RedisHandler extends AbstractProcessingHandler
{
    /** @var Predis<Predis>|Redis */
    private Predis|Redis $redisClient;
    private string $redisKey;
    protected int $capSize;

    /**
     * @param Predis<Predis>|Redis $redis   The redis instance
     * @param string               $key     The key name to push records to
     * @param int                  $capSize Number of entries to limit list size to, 0 = unlimited
     */
    public function __construct(Predis|Redis $redis, string $key, int|string|Level $level = Level::Debug, bool $bubble = true, int $capSize = 0)
    {
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
 */
class RedisHandler extends AbstractProcessingHandler
{
    /** @var \Predis\Client<\Predis\Client>|\Redis */
    private $redisClient;
    /** @var string */
    private $redisKey;
    /** @var int */
    protected $capSize;

    /**
     * @param \Predis\Client<\Predis\Client>|\Redis $redis   The redis instance
     * @param string                $key     The key name to push records to
     * @param int                   $capSize Number of entries to limit list size to, 0 = unlimited
     */
    public function __construct($redis, string $key, $level = Logger::DEBUG, bool $bubble = true, int $capSize = 0)
    {
        if (!(($redis instanceof \Predis\Client) || ($redis instanceof \Redis))) {
            throw new \InvalidArgumentException('Predis\Client or Redis instance required');
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        $this->redisClient = $redis;
        $this->redisKey = $key;
        $this->capSize = $capSize;

        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        if ($this->capSize > 0) {
            $this->writeCapped($record);
        } else {
            $this->redisClient->rpush($this->redisKey, $record->formatted);
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        if ($this->capSize) {
            $this->writeCapped($record);
        } else {
            $this->redisClient->rpush($this->redisKey, $record["formatted"]);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }
    }

    /**
     * Write and cap the collection
     * Writes the record to the redis list and caps its
<<<<<<< HEAD
     */
    protected function writeCapped(LogRecord $record): void
    {
        if ($this->redisClient instanceof Redis) {
            $mode = defined('Redis::MULTI') ? Redis::MULTI : 1;
            $this->redisClient->multi($mode)
                ->rPush($this->redisKey, $record->formatted)
=======
     *
     * @phpstan-param FormattedRecord $record
     */
    protected function writeCapped(array $record): void
    {
        if ($this->redisClient instanceof \Redis) {
            $mode = defined('\Redis::MULTI') ? \Redis::MULTI : 1;
            $this->redisClient->multi($mode)
                ->rpush($this->redisKey, $record["formatted"])
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                ->ltrim($this->redisKey, -$this->capSize, -1)
                ->exec();
        } else {
            $redisKey = $this->redisKey;
            $capSize = $this->capSize;
            $this->redisClient->transaction(function ($tx) use ($record, $redisKey, $capSize) {
<<<<<<< HEAD
                $tx->rpush($redisKey, $record->formatted);
=======
                $tx->rpush($redisKey, $record["formatted"]);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                $tx->ltrim($redisKey, -$capSize, -1);
            });
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
        return new LineFormatter();
    }
}
