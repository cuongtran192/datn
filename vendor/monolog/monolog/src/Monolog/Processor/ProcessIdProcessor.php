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
 * Adds value of getmypid into records
 *
 * @author Andreas Hörnicke
 */
class ProcessIdProcessor implements ProcessorInterface
{
    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra['process_id'] = getmypid();
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        $record['extra']['process_id'] = getmypid();
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }
}
