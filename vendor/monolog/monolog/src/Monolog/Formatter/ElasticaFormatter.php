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

use Elastica\Document;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Format a log message into an Elastica Document
 *
 * @author Jelle Vink <jelle.vink@gmail.com>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class ElasticaFormatter extends NormalizerFormatter
{
    /**
     * @var string Elastic search index name
     */
<<<<<<< HEAD
    protected string $index;

    /**
     * @var string|null Elastic search document type
     */
    protected string|null $type;
=======
    protected $index;

    /**
     * @var ?string Elastic search document type
     */
    protected $type;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param string  $index Elastic Search index name
     * @param ?string $type  Elastic Search document type, deprecated as of Elastica 7
<<<<<<< HEAD
     *
     * @throws \RuntimeException If the function json_encode does not exist
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function __construct(string $index, ?string $type)
    {
        // elasticsearch requires a ISO 8601 format date with optional millisecond precision.
        parent::__construct('Y-m-d\TH:i:s.uP');

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

    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @deprecated since Elastica 7 type has no effect
     */
    public function getType(): string
    {
        /** @phpstan-ignore-next-line */
        return $this->type;
    }

    /**
     * Convert a log message into an Elastica Document
     *
<<<<<<< HEAD
     * @param mixed[] $record
=======
     * @phpstan-param Record $record
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDocument(array $record): Document
    {
        $document = new Document();
        $document->setData($record);
        if (method_exists($document, 'setType')) {
<<<<<<< HEAD
=======
            /** @phpstan-ignore-next-line */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $document->setType($this->type);
        }
        $document->setIndex($this->index);

        return $document;
    }
}
