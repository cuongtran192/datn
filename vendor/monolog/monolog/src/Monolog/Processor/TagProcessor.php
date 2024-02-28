<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

<<<<<<< HEAD
use Monolog\LogRecord;

=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
/**
 * Adds a tags array into record
 *
 * @author Martijn Riemers
 */
class TagProcessor implements ProcessorInterface
{
    /** @var string[] */
<<<<<<< HEAD
    private array $tags;
=======
    private $tags;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param string[] $tags
     */
    public function __construct(array $tags = [])
    {
        $this->setTags($tags);
    }

    /**
     * @param string[] $tags
<<<<<<< HEAD
     * @return $this
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function addTags(array $tags = []): self
    {
        $this->tags = array_merge($this->tags, $tags);

        return $this;
    }

    /**
     * @param string[] $tags
<<<<<<< HEAD
     * @return $this
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setTags(array $tags = []): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra['tags'] = $this->tags;
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        $record['extra']['tags'] = $this->tags;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }
}
