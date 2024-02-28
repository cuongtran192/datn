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
use Monolog\Logger;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Channel and Error level based monolog activation strategy. Allows to trigger activation
 * based on level per channel. e.g. trigger activation on level 'ERROR' by default, except
 * for records of the 'sql' channel; those should trigger activation on level 'WARN'.
 *
 * Example:
 *
 * <code>
 *   $activationStrategy = new ChannelLevelActivationStrategy(
<<<<<<< HEAD
 *       Level::Critical,
 *       array(
 *           'request' => Level::Alert,
 *           'sensitive' => Level::Error,
=======
 *       Logger::CRITICAL,
 *       array(
 *           'request' => Logger::ALERT,
 *           'sensitive' => Logger::ERROR,
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 *       )
 *   );
 *   $handler = new FingersCrossedHandler(new StreamHandler('php://stderr'), $activationStrategy);
 * </code>
 *
 * @author Mike Meessen <netmikey@gmail.com>
<<<<<<< HEAD
 */
class ChannelLevelActivationStrategy implements ActivationStrategyInterface
{
    private Level $defaultActionLevel;
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
class ChannelLevelActivationStrategy implements ActivationStrategyInterface
{
    /**
     * @var Level
     */
    private $defaultActionLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @var array<string, Level>
     */
<<<<<<< HEAD
    private array $channelToActionLevel;

    /**
     * @param int|string|Level|LogLevel::*                $defaultActionLevel   The default action level to be used if the record's category doesn't match any
     * @param array<string, int|string|Level|LogLevel::*> $channelToActionLevel An array that maps channel names to action levels.
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $defaultActionLevel
     * @phpstan-param array<string, value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::*> $channelToActionLevel
     */
    public function __construct(int|string|Level $defaultActionLevel, array $channelToActionLevel = [])
    {
        $this->defaultActionLevel = Logger::toMonologLevel($defaultActionLevel);
        $this->channelToActionLevel = array_map(Logger::toMonologLevel(...), $channelToActionLevel);
    }

    public function isHandlerActivated(LogRecord $record): bool
    {
        if (isset($this->channelToActionLevel[$record->channel])) {
            return $record->level->value >= $this->channelToActionLevel[$record->channel]->value;
        }

        return $record->level->value >= $this->defaultActionLevel->value;
=======
    private $channelToActionLevel;

    /**
     * @param int|string         $defaultActionLevel   The default action level to be used if the record's category doesn't match any
     * @param array<string, int> $channelToActionLevel An array that maps channel names to action levels.
     *
     * @phpstan-param array<string, Level>        $channelToActionLevel
     * @phpstan-param Level|LevelName|LogLevel::* $defaultActionLevel
     */
    public function __construct($defaultActionLevel, array $channelToActionLevel = [])
    {
        $this->defaultActionLevel = Logger::toMonologLevel($defaultActionLevel);
        $this->channelToActionLevel = array_map('Monolog\Logger::toMonologLevel', $channelToActionLevel);
    }

    /**
     * @phpstan-param Record $record
     */
    public function isHandlerActivated(array $record): bool
    {
        if (isset($this->channelToActionLevel[$record['channel']])) {
            return $record['level'] >= $this->channelToActionLevel[$record['channel']];
        }

        return $record['level'] >= $this->defaultActionLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
