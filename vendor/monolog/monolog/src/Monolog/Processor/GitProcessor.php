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
 * Injects Git branch and Git commit SHA in all records
 *
 * @author Nick Otter
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 */
class GitProcessor implements ProcessorInterface
{
    private Level $level;
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class GitProcessor implements ProcessorInterface
{
    /** @var int */
    private $level;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    /** @var array{branch: string, commit: string}|array<never>|null */
    private static $cache = null;

    /**
<<<<<<< HEAD
     * @param int|string|Level|LogLevel::* $level The minimum logging level at which this Processor will be triggered
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function __construct(int|string|Level $level = Level::Debug)
=======
     * @param string|int $level The minimum logging level at which this Processor will be triggered
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

        $record->extra['git'] = self::getGitInfo();
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        // return if the level is not high enough
        if ($record['level'] < $this->level) {
            return $record;
        }

        $record['extra']['git'] = self::getGitInfo();
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }

    /**
     * @return array{branch: string, commit: string}|array<never>
     */
    private static function getGitInfo(): array
    {
<<<<<<< HEAD
        if (self::$cache !== null) {
            return self::$cache;
        }

        $branches = shell_exec('git branch -v --no-abbrev');
        if (is_string($branches) && 1 === preg_match('{^\* (.+?)\s+([a-f0-9]{40})(?:\s|$)}m', $branches, $matches)) {
=======
        if (self::$cache) {
            return self::$cache;
        }

        $branches = `git branch -v --no-abbrev`;
        if ($branches && preg_match('{^\* (.+?)\s+([a-f0-9]{40})(?:\s|$)}m', $branches, $matches)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            return self::$cache = [
                'branch' => $matches[1],
                'commit' => $matches[2],
            ];
        }

        return self::$cache = [];
    }
}
