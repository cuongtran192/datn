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

<<<<<<< HEAD
use Monolog\LogRecord;

=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
/**
 * Interface for formatters
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
interface FormatterInterface
{
    /**
     * Formats a log record.
     *
<<<<<<< HEAD
     * @param  LogRecord $record A record to format
     * @return mixed     The formatted record
     */
    public function format(LogRecord $record);
=======
     * @param  array $record A record to format
     * @return mixed The formatted record
     *
     * @phpstan-param Record $record
     */
    public function format(array $record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * Formats a set of log records.
     *
<<<<<<< HEAD
     * @param  array<LogRecord> $records A set of records to format
     * @return mixed            The formatted set of records
=======
     * @param  array $records A set of records to format
     * @return mixed The formatted set of records
     *
     * @phpstan-param Record[] $records
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function formatBatch(array $records);
}
