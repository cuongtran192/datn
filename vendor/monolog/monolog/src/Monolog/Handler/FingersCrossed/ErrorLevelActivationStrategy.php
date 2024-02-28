<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler\FingersCrossed;

<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Monolog\Logger;
use Psr\Log\LogLevel;

/**
 * Error level based activation strategy.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
<<<<<<< HEAD
 */
class ErrorLevelActivationStrategy implements ActivationStrategyInterface
{
    private Level $actionLevel;

    /**
     * @param int|string|Level $actionLevel Level or name or value
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $actionLevel
     */
    public function __construct(int|string|Level $actionLevel)
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class ErrorLevelActivationStrategy implements ActivationStrategyInterface
{
    /**
     * @var Level
     */
    private $actionLevel;

    /**
     * @param int|string $actionLevel Level or name or value
     *
     * @phpstan-param Level|LevelName|LogLevel::* $actionLevel
     */
    public function __construct($actionLevel)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->actionLevel = Logger::toMonologLevel($actionLevel);
    }

<<<<<<< HEAD
    public function isHandlerActivated(LogRecord $record): bool
    {
        return $record->level->value >= $this->actionLevel->value;
=======
    public function isHandlerActivated(array $record): bool
    {
        return $record['level'] >= $this->actionLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
