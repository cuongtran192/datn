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
use Monolog\Level;
use Monolog\Logger;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Injects Hg branch and Hg revision number in all records
 *
 * @author Jonathan A. Schweder <jonathanschweder@gmail.com>
<<<<<<< HEAD
 */
class MercurialProcessor implements ProcessorInterface
{
    private Level $level;
=======
 *
 * @phpstan-import-type LevelName from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 */
class MercurialProcessor implements ProcessorInterface
{
    /** @var Level */
    private $level;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    /** @var array{branch: string, revision: string}|array<never>|null */
    private static $cache = null;

    /**
<<<<<<< HEAD
     * @param int|string|Level $level The minimum logging level at which this Processor will be triggered
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function __construct(int|string|Level $level = Level::Debug)
=======
     * @param int|string $level The minimum logging level at which this Processor will be triggered
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function __construct($level = Logger::DEBUG)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->level = Logger::toMonologLevel($level);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        // return if the level is not high enough
        if ($record->level->isLowerThan($this->level)) {
            return $record;
        }

        $record->extra['hg'] = self::getMercurialInfo();
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
            return $record;
        }

        $record['extra']['hg'] = self::getMercurialInfo();
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }

    /**
     * @return array{branch: string, revision: string}|array<never>
     */
    private static function getMercurialInfo(): array
    {
<<<<<<< HEAD
        if (self::$cache !== null) {
            return self::$cache;
        }

        $result = explode(' ', trim((string) shell_exec('hg id -nb')));
=======
        if (self::$cache) {
            return self::$cache;
        }

        $result = explode(' ', trim(`hg id -nb`));
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        if (count($result) >= 3) {
            return self::$cache = [
                'branch' => $result[1],
                'revision' => $result[2],
            ];
        }

        return self::$cache = [];
    }
}
