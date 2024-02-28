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

use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\HtmlFormatter;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Base class for all mail handlers
 *
 * @author Gyula Sallai
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
abstract class MailHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function handleBatch(array $records): void
    {
        $messages = [];

        foreach ($records as $record) {
<<<<<<< HEAD
            if ($record->level->isLowerThan($this->level)) {
                continue;
            }

=======
            if ($record['level'] < $this->level) {
                continue;
            }
            /** @var Record $message */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $message = $this->processRecord($record);
            $messages[] = $message;
        }

<<<<<<< HEAD
        if (\count($messages) > 0) {
=======
        if (!empty($messages)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $this->send((string) $this->getFormatter()->formatBatch($messages), $messages);
        }
    }

    /**
     * Send a mail with the given content
     *
     * @param string $content formatted email body to be sent
     * @param array  $records the array of log records that formed this content
     *
<<<<<<< HEAD
     * @phpstan-param non-empty-array<LogRecord> $records
=======
     * @phpstan-param Record[] $records
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    abstract protected function send(string $content, array $records): void;

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->send((string) $record->formatted, [$record]);
    }

    /**
     * @phpstan-param non-empty-array<LogRecord> $records
     */
    protected function getHighestRecord(array $records): LogRecord
    {
        $highestRecord = null;
        foreach ($records as $record) {
            if ($highestRecord === null || $record->level->isHigherThan($highestRecord->level)) {
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->send((string) $record['formatted'], [$record]);
    }

    /**
     * @phpstan-param non-empty-array<Record> $records
     * @phpstan-return Record
     */
    protected function getHighestRecord(array $records): array
    {
        $highestRecord = null;
        foreach ($records as $record) {
            if ($highestRecord === null || $highestRecord['level'] < $record['level']) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                $highestRecord = $record;
            }
        }

        return $highestRecord;
    }

    protected function isHtmlBody(string $body): bool
    {
        return ($body[0] ?? null) === '<';
    }

    /**
     * Gets the default formatter.
<<<<<<< HEAD
=======
     *
     * @return FormatterInterface
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new HtmlFormatter();
    }
}
