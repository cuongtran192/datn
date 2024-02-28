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

use Aws\Sqs\SqsClient;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\Utils;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Writes to any sqs queue.
 *
 * @author Martijn van Calker <git@amvc.nl>
 */
class SqsHandler extends AbstractProcessingHandler
{
    /** 256 KB in bytes - maximum message size in SQS */
    protected const MAX_MESSAGE_SIZE = 262144;
    /** 100 KB in bytes - head message size for new error log */
    protected const HEAD_MESSAGE_SIZE = 102400;

<<<<<<< HEAD
    private SqsClient $client;
    private string $queueUrl;

    public function __construct(SqsClient $sqsClient, string $queueUrl, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    /** @var SqsClient */
    private $client;
    /** @var string */
    private $queueUrl;

    public function __construct(SqsClient $sqsClient, string $queueUrl, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);

        $this->client = $sqsClient;
        $this->queueUrl = $queueUrl;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        if (!isset($record->formatted) || 'string' !== gettype($record->formatted)) {
            throw new \InvalidArgumentException('SqsHandler accepts only formatted records as a string' . Utils::getRecordMessageForException($record));
        }

        $messageBody = $record->formatted;
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        if (!isset($record['formatted']) || 'string' !== gettype($record['formatted'])) {
            throw new \InvalidArgumentException('SqsHandler accepts only formatted records as a string' . Utils::getRecordMessageForException($record));
        }

        $messageBody = $record['formatted'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        if (strlen($messageBody) >= static::MAX_MESSAGE_SIZE) {
            $messageBody = Utils::substr($messageBody, 0, static::HEAD_MESSAGE_SIZE);
        }

        $this->client->sendMessage([
            'QueueUrl' => $this->queueUrl,
            'MessageBody' => $messageBody,
        ]);
    }
}
