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

use Elastic\Elasticsearch\Response\Elasticsearch;
use Throwable;
use RuntimeException;
<<<<<<< HEAD
use Monolog\Level;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\ElasticsearchFormatter;
use InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException as ElasticsearchRuntimeException;
use Elasticsearch\Client;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Elastic\Elasticsearch\Exception\InvalidArgumentException as ElasticInvalidArgumentException;
use Elastic\Elasticsearch\Client as Client8;

/**
 * Elasticsearch handler
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
 *
 * Simple usage example:
 *
 *    $client = \Elasticsearch\ClientBuilder::create()
 *        ->setHosts($hosts)
 *        ->build();
 *
 *    $options = array(
 *        'index' => 'elastic_index_name',
 *        'type'  => 'elastic_doc_type',
 *    );
 *    $handler = new ElasticsearchHandler($client, $options);
 *    $log = new Logger('application');
 *    $log->pushHandler($handler);
 *
 * @author Avtandil Kikabidze <akalongman@gmail.com>
<<<<<<< HEAD
 * @phpstan-type Options array{
 *     index: string,
 *     type: string,
 *     ignore_error: bool,
 *     op_type: 'index'|'create'
 * }
 * @phpstan-type InputOptions array{
 *     index?: string,
 *     type?: string,
 *     ignore_error?: bool,
 *     op_type?: 'index'|'create'
 * }
 */
class ElasticsearchHandler extends AbstractProcessingHandler
{
    protected Client|Client8 $client;

    /**
     * @var mixed[] Handler config options
     * @phpstan-var Options
     */
    protected array $options;
=======
 */
class ElasticsearchHandler extends AbstractProcessingHandler
{
    /**
     * @var Client|Client8
     */
    protected $client;

    /**
     * @var mixed[] Handler config options
     */
    protected $options = [];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var bool
     */
    private $needsType;

    /**
     * @param Client|Client8 $client  Elasticsearch Client object
     * @param mixed[]        $options Handler configuration
<<<<<<< HEAD
     *
     * @phpstan-param InputOptions $options
     */
    public function __construct(Client|Client8 $client, array $options = [], int|string|Level $level = Level::Debug, bool $bubble = true)
    {
=======
     */
    public function __construct($client, array $options = [], $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!$client instanceof Client && !$client instanceof Client8) {
            throw new \TypeError('Elasticsearch\Client or Elastic\Elasticsearch\Client instance required');
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        parent::__construct($level, $bubble);
        $this->client = $client;
        $this->options = array_merge(
            [
                'index'        => 'monolog', // Elastic index name
                'type'         => '_doc',    // Elastic document type
                'ignore_error' => false,     // Suppress Elasticsearch exceptions
<<<<<<< HEAD
                'op_type'      => 'index',   // Elastic op_type (index or create) (https://www.elastic.co/guide/en/elasticsearch/reference/current/docs-index_.html#docs-index-api-op_type)
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            ],
            $options
        );

        if ($client instanceof Client8 || $client::VERSION[0] === '7') {
            $this->needsType = false;
            // force the type to _doc for ES8/ES7
            $this->options['type'] = '_doc';
        } else {
            $this->needsType = true;
        }
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->bulkSend([$record->formatted]);
    }

    /**
     * @inheritDoc
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->bulkSend([$record['formatted']]);
    }

    /**
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($formatter instanceof ElasticsearchFormatter) {
            return parent::setFormatter($formatter);
        }

        throw new InvalidArgumentException('ElasticsearchHandler is only compatible with ElasticsearchFormatter');
    }

    /**
     * Getter options
     *
     * @return mixed[]
<<<<<<< HEAD
     *
     * @phpstan-return Options
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getOptions(): array
    {
        return $this->options;
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
        return new ElasticsearchFormatter($this->options['index'], $this->options['type']);
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
        $documents = $this->getFormatter()->formatBatch($records);
        $this->bulkSend($documents);
    }

    /**
     * Use Elasticsearch bulk API to send list of documents
     *
<<<<<<< HEAD
     * @param  array<array<mixed>> $records Records + _index/_type keys
=======
     * @param  array[]           $records Records + _index/_type keys
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     * @throws \RuntimeException
     */
    protected function bulkSend(array $records): void
    {
        try {
            $params = [
                'body' => [],
            ];

            foreach ($records as $record) {
                $params['body'][] = [
<<<<<<< HEAD
                    $this->options['op_type'] => $this->needsType ? [
=======
                    'index' => $this->needsType ? [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                        '_index' => $record['_index'],
                        '_type'  => $record['_type'],
                    ] : [
                        '_index' => $record['_index'],
                    ],
                ];
                unset($record['_index'], $record['_type']);

                $params['body'][] = $record;
            }

            /** @var Elasticsearch */
            $responses = $this->client->bulk($params);

            if ($responses['errors'] === true) {
                throw $this->createExceptionFromResponses($responses);
            }
        } catch (Throwable $e) {
            if (! $this->options['ignore_error']) {
                throw new RuntimeException('Error sending messages to Elasticsearch', 0, $e);
            }
        }
    }

    /**
     * Creates elasticsearch exception from responses array
     *
     * Only the first error is converted into an exception.
     *
     * @param mixed[]|Elasticsearch $responses returned by $this->client->bulk()
     */
    protected function createExceptionFromResponses($responses): Throwable
    {
        foreach ($responses['items'] ?? [] as $item) {
            if (isset($item['index']['error'])) {
                return $this->createExceptionFromError($item['index']['error']);
            }
        }

        if (class_exists(ElasticInvalidArgumentException::class)) {
            return new ElasticInvalidArgumentException('Elasticsearch failed to index one or more records.');
        }

        return new ElasticsearchRuntimeException('Elasticsearch failed to index one or more records.');
    }

    /**
     * Creates elasticsearch exception from error array
     *
     * @param mixed[] $error
     */
    protected function createExceptionFromError(array $error): Throwable
    {
        $previous = isset($error['caused_by']) ? $this->createExceptionFromError($error['caused_by']) : null;

        if (class_exists(ElasticInvalidArgumentException::class)) {
            return new ElasticInvalidArgumentException($error['type'] . ': ' . $error['reason'], 0, $previous);
        }

        return new ElasticsearchRuntimeException($error['type'] . ': ' . $error['reason'], 0, $previous);
    }
}
