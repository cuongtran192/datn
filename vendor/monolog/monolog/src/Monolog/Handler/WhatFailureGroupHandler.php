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
use Monolog\LogRecord;
use Throwable;

=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
/**
 * Forwards records to multiple handlers suppressing failures of each handler
 * and continuing through to give every handler a chance to succeed.
 *
 * @author Craig D'Amelio <craig@damelio.ca>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class WhatFailureGroupHandler extends GroupHandler
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
            } catch (Throwable) {
=======
                $handler->handle($record);
            } catch (\Throwable $e) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                // What failure?
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
            $processed = [];
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
            }
=======
     * {@inheritDoc}
     */
    public function handleBatch(array $records): void
    {
        if ($this->processors) {
            $processed = array();
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
            }
            /** @var Record[] $records */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
            try {
<<<<<<< HEAD
                $handler->handleBatch(array_map(fn ($record) => clone $record, $records));
            } catch (Throwable) {
=======
                $handler->handleBatch($records);
            } catch (\Throwable $e) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                // What failure?
            }
        }
    }

    /**
     * {@inheritDoc}
     */
    public function close(): void
    {
        foreach ($this->handlers as $handler) {
            try {
                $handler->close();
            } catch (\Throwable $e) {
                // What failure?
            }
        }
    }
}
