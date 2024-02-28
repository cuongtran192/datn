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
 * Injects memory_get_peak_usage in all records
 *
 * @see Monolog\Processor\MemoryProcessor::__construct() for options
 * @author Rob Jensen
 */
class MemoryPeakUsageProcessor extends MemoryProcessor
{
    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $usage = memory_get_peak_usage($this->realUsage);

        if ($this->useFormatting) {
            $usage = $this->formatBytes($usage);
        }

<<<<<<< HEAD
        $record->extra['memory_peak_usage'] = $usage;
=======
        $record['extra']['memory_peak_usage'] = $usage;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }
}
