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

use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Client;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\MongoDBFormatter;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\MongoDBFormatter;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Logs to a MongoDB database.
 *
 * Usage example:
 *
 *   $log = new \Monolog\Logger('application');
 *   $client = new \MongoDB\Client('mongodb://localhost:27017');
 *   $mongodb = new \Monolog\Handler\MongoDBHandler($client, 'logs', 'prod');
 *   $log->pushHandler($mongodb);
 *
 * The above examples uses the MongoDB PHP library's client class; however, the
 * MongoDB\Driver\Manager class from ext-mongodb is also supported.
 */
class MongoDBHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    private \MongoDB\Collection $collection;

    private Client|Manager $manager;

    private string|null $namespace = null;
=======
    /** @var \MongoDB\Collection */
    private $collection;
    /** @var Client|Manager */
    private $manager;
    /** @var string */
    private $namespace;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Constructor.
     *
     * @param Client|Manager $mongodb    MongoDB library or driver client
     * @param string         $database   Database name
     * @param string         $collection Collection name
     */
<<<<<<< HEAD
    public function __construct(Client|Manager $mongodb, string $database, string $collection, int|string|Level $level = Level::Debug, bool $bubble = true)
    {
=======
    public function __construct($mongodb, string $database, string $collection, $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!($mongodb instanceof Client || $mongodb instanceof Manager)) {
            throw new \InvalidArgumentException('MongoDB\Client or MongoDB\Driver\Manager instance required');
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        if ($mongodb instanceof Client) {
            $this->collection = $mongodb->selectCollection($database, $collection);
        } else {
            $this->manager = $mongodb;
            $this->namespace = $database . '.' . $collection;
        }

        parent::__construct($level, $bubble);
    }

<<<<<<< HEAD
    protected function write(LogRecord $record): void
    {
        if (isset($this->collection)) {
            $this->collection->insertOne($record->formatted);
=======
    protected function write(array $record): void
    {
        if (isset($this->collection)) {
            $this->collection->insertOne($record['formatted']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        if (isset($this->manager, $this->namespace)) {
            $bulk = new BulkWrite;
<<<<<<< HEAD
            $bulk->insert($record->formatted);
=======
            $bulk->insert($record["formatted"]);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $this->manager->executeBulkWrite($this->namespace, $bulk);
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
        return new MongoDBFormatter;
    }
}
