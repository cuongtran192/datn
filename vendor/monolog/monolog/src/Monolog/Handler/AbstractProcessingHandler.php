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

=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
/**
 * Base Handler class providing the Handler structure, including processors and formatters
 *
 * Classes extending it should (in most cases) only implement write($record)
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Christophe Coevoet <stof@notk.org>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type LevelName from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-type FormattedRecord array{message: string, context: mixed[], level: Level, level_name: LevelName, channel: string, datetime: \DateTimeImmutable, extra: mixed[], formatted: mixed}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
abstract class AbstractProcessingHandler extends AbstractHandler implements ProcessableHandlerInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;
    use FormattableHandlerTrait;

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
=======
     * {@inheritDoc}
     */
    public function handle(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        if (\count($this->processors) > 0) {
            $record = $this->processRecord($record);
        }

        $record->formatted = $this->getFormatter()->format($record);
=======
        if ($this->processors) {
            /** @var Record $record */
            $record = $this->processRecord($record);
        }

        $record['formatted'] = $this->getFormatter()->format($record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        $this->write($record);

        return false === $this->bubble;
    }

    /**
<<<<<<< HEAD
     * Writes the (already formatted) record down to the log of the implementing handler
     */
    abstract protected function write(LogRecord $record): void;

    public function reset(): void
=======
     * Writes the record down to the log of the implementing handler
     *
     * @phpstan-param FormattedRecord $record
     */
    abstract protected function write(array $record): void;

    /**
     * @return void
     */
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::reset();

        $this->resetProcessors();
    }
}
