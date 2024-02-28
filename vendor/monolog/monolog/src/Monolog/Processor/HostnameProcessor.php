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
 * Injects value of gethostname in all records
 */
class HostnameProcessor implements ProcessorInterface
{
<<<<<<< HEAD
    private static string $host;
=======
    /** @var string */
    private static $host;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    public function __construct()
    {
        self::$host = (string) gethostname();
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra['hostname'] = self::$host;
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        $record['extra']['hostname'] = self::$host;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }
}
