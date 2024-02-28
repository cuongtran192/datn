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
use Monolog\Level;
use Psr\Log\LogLevel;
use Monolog\Logger;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Blackhole
 *
 * Any record it can handle will be thrown away. This can be used
 * to put on top of an existing stack to override it temporarily.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 */
class NullHandler extends Handler
{
    private Level $level;

    /**
     * @param string|int|Level $level The minimum logging level at which this handler will be triggered
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function __construct(string|int|Level $level = Level::Debug)
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class NullHandler extends Handler
{
    /**
     * @var int
     */
    private $level;

    /**
     * @param string|int $level The minimum logging level at which this handler will be triggered
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
    public function isHandling(LogRecord $record): bool
    {
        return $record->level->value >= $this->level->value;
    }

    /**
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
    {
        return $record->level->value >= $this->level->value;
=======
     * {@inheritDoc}
     */
    public function isHandling(array $record): bool
    {
        return $record['level'] >= $this->level;
    }

    /**
     * {@inheritDoc}
     */
    public function handle(array $record): bool
    {
        return $record['level'] >= $this->level;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
