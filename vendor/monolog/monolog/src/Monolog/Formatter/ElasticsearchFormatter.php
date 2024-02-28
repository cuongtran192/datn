<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

use DateTimeInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Format a log message into an Elasticsearch record
 *
 * @author Avtandil Kikabidze <akalongman@gmail.com>
 */
class ElasticsearchFormatter extends NormalizerFormatter
{
    /**
     * @var string Elasticsearch index name
     */
<<<<<<< HEAD
    protected string $index;
=======
    protected $index;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var string Elasticsearch record type
     */
<<<<<<< HEAD
    protected string $type;
=======
    protected $type;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param string $index Elasticsearch index name
     * @param string $type  Elasticsearch record type
<<<<<<< HEAD
     *
     * @throws \RuntimeException If the function json_encode does not exist
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function __construct(string $index, string $type)
    {
        // Elasticsearch requires an ISO 8601 format date with optional millisecond precision.
        parent::__construct(DateTimeInterface::ISO8601);

        $this->index = $index;
        $this->type = $type;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function format(LogRecord $record)
=======
     * {@inheritDoc}
     */
    public function format(array $record)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $record = parent::format($record);

        return $this->getDocument($record);
    }

    /**
     * Getter index
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * Getter type
<<<<<<< HEAD
=======
     *
     * @return string
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Convert a log message into an Elasticsearch record
     *
     * @param  mixed[] $record Log message
     * @return mixed[]
     */
    protected function getDocument(array $record): array
    {
        $record['_index'] = $this->index;
        $record['_type'] = $this->type;

        return $record;
    }
}
