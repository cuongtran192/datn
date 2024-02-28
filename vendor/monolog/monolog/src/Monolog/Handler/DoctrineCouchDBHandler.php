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
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Formatter\FormatterInterface;
use Doctrine\CouchDB\CouchDBClient;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Formatter\FormatterInterface;
use Doctrine\CouchDB\CouchDBClient;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * CouchDB handler for Doctrine CouchDB ODM
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 */
class DoctrineCouchDBHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    private CouchDBClient $client;

    public function __construct(CouchDBClient $client, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    /** @var CouchDBClient */
    private $client;

    public function __construct(CouchDBClient $client, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->client = $client;
        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->client->postDocument($record->formatted);
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->client->postDocument($record['formatted']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    protected function getDefaultFormatter(): FormatterInterface
    {
        return new NormalizerFormatter;
    }
}
