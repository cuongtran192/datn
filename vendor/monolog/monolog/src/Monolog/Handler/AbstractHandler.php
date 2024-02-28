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
use Monolog\Logger;
use Monolog\ResettableInterface;
use Psr\Log\LogLevel;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\ResettableInterface;
use Psr\Log\LogLevel;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Base Handler class providing basic level/bubble support
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 */
abstract class AbstractHandler extends Handler implements ResettableInterface
{
    protected Level $level = Level::Debug;
    protected bool $bubble = true;

    /**
     * @param int|string|Level|LogLevel::* $level  The minimum logging level at which this handler will be triggered
     * @param bool                                   $bubble Whether the messages that are handled can bubble up the stack or not
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function __construct(int|string|Level $level = Level::Debug, bool $bubble = true)
=======
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
 */
abstract class AbstractHandler extends Handler implements ResettableInterface
{
    /**
     * @var int
     * @phpstan-var Level
     */
    protected $level = Logger::DEBUG;
    /** @var bool */
    protected $bubble = true;

    /**
     * @param int|string $level  The minimum logging level at which this handler will be triggered
     * @param bool       $bubble Whether the messages that are handled can bubble up the stack or not
     *
     * @phpstan-param Level|LevelName|LogLevel::* $level
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->setLevel($level);
        $this->bubble = $bubble;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function isHandling(LogRecord $record): bool
    {
        return $record->level->value >= $this->level->value;
=======
     * {@inheritDoc}
     */
    public function isHandling(array $record): bool
    {
        return $record['level'] >= $this->level;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    /**
     * Sets minimum logging level at which this handler will be triggered.
     *
<<<<<<< HEAD
     * @param Level|LogLevel::* $level Level or level name
     * @return $this
     *
     * @phpstan-param value-of<Level::VALUES>|value-of<Level::NAMES>|Level|LogLevel::* $level
     */
    public function setLevel(int|string|Level $level): self
=======
     * @param  Level|LevelName|LogLevel::* $level Level or level name
     * @return self
     */
    public function setLevel($level): self
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->level = Logger::toMonologLevel($level);

        return $this;
    }

    /**
     * Gets minimum logging level at which this handler will be triggered.
<<<<<<< HEAD
     */
    public function getLevel(): Level
=======
     *
     * @return int
     *
     * @phpstan-return Level
     */
    public function getLevel(): int
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return $this->level;
    }

    /**
     * Sets the bubbling behavior.
     *
<<<<<<< HEAD
     * @param bool $bubble true means that this handler allows bubbling.
     *                     false means that bubbling is not permitted.
     * @return $this
=======
     * @param  bool $bubble true means that this handler allows bubbling.
     *                      false means that bubbling is not permitted.
     * @return self
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setBubble(bool $bubble): self
    {
        $this->bubble = $bubble;

        return $this;
    }

    /**
     * Gets the bubbling behavior.
     *
     * @return bool true means that this handler allows bubbling.
     *              false means that bubbling is not permitted.
     */
    public function getBubble(): bool
    {
        return $this->bubble;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function reset(): void
=======
     * {@inheritDoc}
     */
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
    }
}
