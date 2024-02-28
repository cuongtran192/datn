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

use Monolog\ResettableInterface;
use Monolog\Processor\ProcessorInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Helper trait for implementing ProcessableInterface
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
trait ProcessableHandlerTrait
{
    /**
     * @var callable[]
<<<<<<< HEAD
     * @phpstan-var array<(callable(LogRecord): LogRecord)|ProcessorInterface>
     */
    protected array $processors = [];

    /**
     * @inheritDoc
=======
     * @phpstan-var array<ProcessorInterface|callable(Record): Record>
     */
    protected $processors = [];

    /**
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function pushProcessor(callable $callback): HandlerInterface
    {
        array_unshift($this->processors, $callback);

        return $this;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function popProcessor(): callable
    {
        if (\count($this->processors) === 0) {
=======
     * {@inheritDoc}
     */
    public function popProcessor(): callable
    {
        if (!$this->processors) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            throw new \LogicException('You tried to pop from an empty processor stack.');
        }

        return array_shift($this->processors);
    }

<<<<<<< HEAD
    protected function processRecord(LogRecord $record): LogRecord
=======
    /**
     * Processes a record.
     *
     * @phpstan-param  Record $record
     * @phpstan-return Record
     */
    protected function processRecord(array $record): array
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        foreach ($this->processors as $processor) {
            $record = $processor($record);
        }

        return $record;
    }

    protected function resetProcessors(): void
    {
        foreach ($this->processors as $processor) {
            if ($processor instanceof ResettableInterface) {
                $processor->reset();
            }
        }
    }
}
