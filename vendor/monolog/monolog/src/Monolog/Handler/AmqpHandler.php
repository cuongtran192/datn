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
use Monolog\Formatter\JsonFormatter;
use PhpAmqpLib\Message\AMQPMessage;
use PhpAmqpLib\Channel\AMQPChannel;
use AMQPExchange;
<<<<<<< HEAD
use Monolog\LogRecord;

class AmqpHandler extends AbstractProcessingHandler
{
    protected AMQPExchange|AMQPChannel $exchange;

    /** @var array<string, mixed> */
    private array $extraAttributes = [];

    protected string $exchangeName;

    /**
     * @param AMQPExchange|AMQPChannel $exchange     AMQPExchange (php AMQP ext) or PHP AMQP lib channel, ready for use
     * @param string|null              $exchangeName Optional exchange name, for AMQPChannel (PhpAmqpLib) only
     */
    public function __construct(AMQPExchange|AMQPChannel $exchange, ?string $exchangeName = null, int|string|Level $level = Level::Debug, bool $bubble = true)
    {
        if ($exchange instanceof AMQPChannel) {
            $this->exchangeName = (string) $exchangeName;
        } elseif ($exchangeName !== null) {
            @trigger_error('The $exchangeName parameter can only be passed when using PhpAmqpLib, if using an AMQPExchange instance configure it beforehand', E_USER_DEPRECATED);
        }
        $this->exchange = $exchange;

        parent::__construct($level, $bubble);
    }
=======

/**
 * @phpstan-import-type Record from \Monolog\Logger
 */
class AmqpHandler extends AbstractProcessingHandler
{
    /**
     * @var AMQPExchange|AMQPChannel $exchange
     */
    protected $exchange;
    /** @var array<string, mixed> */
    private $extraAttributes = [];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @return array<string, mixed>
     */
    public function getExtraAttributes(): array
    {
        return $this->extraAttributes;
    }

    /**
     * Configure extra attributes to pass to the AMQPExchange (if you are using the amqp extension)
     *
     * @param array<string, mixed> $extraAttributes  One of content_type, content_encoding,
     *                                               message_id, user_id, app_id, delivery_mode,
     *                                               priority, timestamp, expiration, type
     *                                               or reply_to, headers.
<<<<<<< HEAD
     * @return $this
=======
     * @return AmqpHandler
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setExtraAttributes(array $extraAttributes): self
    {
        $this->extraAttributes = $extraAttributes;
        return $this;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $data = $record->formatted;
=======
     * @var string
     */
    protected $exchangeName;

    /**
     * @param AMQPExchange|AMQPChannel $exchange     AMQPExchange (php AMQP ext) or PHP AMQP lib channel, ready for use
     * @param string|null              $exchangeName Optional exchange name, for AMQPChannel (PhpAmqpLib) only
     */
    public function __construct($exchange, ?string $exchangeName = null, $level = Logger::DEBUG, bool $bubble = true)
    {
        if ($exchange instanceof AMQPChannel) {
            $this->exchangeName = (string) $exchangeName;
        } elseif (!$exchange instanceof AMQPExchange) {
            throw new \InvalidArgumentException('PhpAmqpLib\Channel\AMQPChannel or AMQPExchange instance required');
        } elseif ($exchangeName) {
            @trigger_error('The $exchangeName parameter can only be passed when using PhpAmqpLib, if using an AMQPExchange instance configure it beforehand', E_USER_DEPRECATED);
        }
        $this->exchange = $exchange;

        parent::__construct($level, $bubble);
    }

    /**
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $data = $record["formatted"];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        $routingKey = $this->getRoutingKey($record);

        if ($this->exchange instanceof AMQPExchange) {
            $attributes = [
                'delivery_mode' => 2,
                'content_type'  => 'application/json',
            ];
<<<<<<< HEAD
            if (\count($this->extraAttributes) > 0) {
=======
            if ($this->extraAttributes) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                $attributes = array_merge($attributes, $this->extraAttributes);
            }
            $this->exchange->publish(
                $data,
                $routingKey,
                0,
                $attributes
            );
        } else {
            $this->exchange->basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $routingKey
            );
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
        if ($this->exchange instanceof AMQPExchange) {
            parent::handleBatch($records);

            return;
        }

        foreach ($records as $record) {
            if (!$this->isHandling($record)) {
                continue;
            }

<<<<<<< HEAD
=======
            /** @var Record $record */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $record = $this->processRecord($record);
            $data = $this->getFormatter()->format($record);

            $this->exchange->batch_basic_publish(
                $this->createAmqpMessage($data),
                $this->exchangeName,
                $this->getRoutingKey($record)
            );
        }

        $this->exchange->publish_batch();
    }

    /**
     * Gets the routing key for the AMQP exchange
<<<<<<< HEAD
     */
    protected function getRoutingKey(LogRecord $record): string
    {
        $routingKey = sprintf('%s.%s', $record->level->name, $record->channel);
=======
     *
     * @phpstan-param Record $record
     */
    protected function getRoutingKey(array $record): string
    {
        $routingKey = sprintf('%s.%s', $record['level_name'], $record['channel']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return strtolower($routingKey);
    }

    private function createAmqpMessage(string $data): AMQPMessage
    {
        $attributes = [
            'delivery_mode' => 2,
            'content_type' => 'application/json',
        ];
<<<<<<< HEAD
        if (\count($this->extraAttributes) > 0) {
=======
        if ($this->extraAttributes) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $attributes = array_merge($attributes, $this->extraAttributes);
        }
        return new AMQPMessage($data, $attributes);
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
        return new JsonFormatter(JsonFormatter::BATCH_MODE_JSON, false);
    }
}
