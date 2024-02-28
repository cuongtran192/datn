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
 * An optional interface to allow labelling Monolog processors.
 *
 * @author Nicolas Grekas <p@tchwork.com>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
interface ProcessorInterface
{
    /**
<<<<<<< HEAD
     * @return LogRecord The processed record
     */
    public function __invoke(LogRecord $record);
=======
     * @return array The processed record
     *
     * @phpstan-param  Record $record
     * @phpstan-return Record
     */
    public function __invoke(array $record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
}
