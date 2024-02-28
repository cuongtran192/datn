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

use Throwable;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Forwards records to at most one handler
 *
 * If a handler fails, the exception is suppressed and the record is forwarded to the next handler.
 *
 * As soon as one handler handles a record successfully, the handling stops there.
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class FallbackGroupHandler extends GroupHandler
{
    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
    {
        if (\count($this->processors) > 0) {
=======
     * {@inheritDoc}
     */
    public function handle(array $record): bool
    {
        if ($this->processors) {
            /** @var Record $record */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $record = $this->processRecord($record);
        }
        foreach ($this->handlers as $handler) {
            try {
<<<<<<< HEAD
                $handler->handle(clone $record);
=======
                $handler->handle($record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                break;
            } catch (Throwable $e) {
                // What throwable?
            }
        }

        return false === $this->bubble;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handleBatch(array $records): void
    {
        if (\count($this->processors) > 0) {
=======
     * {@inheritDoc}
     */
    public function handleBatch(array $records): void
    {
        if ($this->processors) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $processed = [];
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
            }
<<<<<<< HEAD
=======
            /** @var Record[] $records */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
            try {
<<<<<<< HEAD
                $handler->handleBatch(array_map(fn ($record) => clone $record, $records));
=======
                $handler->handleBatch($records);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                break;
            } catch (Throwable $e) {
                // What throwable?
            }
        }
    }
}
