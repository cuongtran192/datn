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
use Closure;
use Monolog\Formatter\FormatterInterface;
use Monolog\LogRecord;
=======
use Monolog\Formatter\FormatterInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sampling handler
 *
 * A sampled event stream can be useful for logging high frequency events in
 * a production environment where you only need an idea of what is happening
 * and are not concerned with capturing every occurrence. Since the decision to
 * handle or not handle a particular event is determined randomly, the
 * resulting sampled log is not guaranteed to contain 1/N of the events that
 * occurred in the application, but based on the Law of large numbers, it will
 * tend to be close to this ratio with a large number of attempts.
 *
 * @author Bryan Davis <bd808@wikimedia.org>
 * @author Kunal Mehta <legoktm@gmail.com>
<<<<<<< HEAD
=======
 *
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
 */
class SamplingHandler extends AbstractHandler implements ProcessableHandlerInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;

    /**
<<<<<<< HEAD
     * Handler or factory Closure($record, $this)
     *
     * @phpstan-var (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface
     */
    protected Closure|HandlerInterface $handler;

    protected int $factor;

    /**
     * @phpstan-param (Closure(LogRecord|null, HandlerInterface): HandlerInterface)|HandlerInterface $handler
     *
     * @param Closure|HandlerInterface $handler Handler or factory Closure($record|null, $samplingHandler).
     * @param int                      $factor  Sample factor (e.g. 10 means every ~10th record is sampled)
     */
    public function __construct(Closure|HandlerInterface $handler, int $factor)
=======
     * @var HandlerInterface|callable
     * @phpstan-var HandlerInterface|callable(Record|array{level: Level}|null, HandlerInterface): HandlerInterface
     */
    protected $handler;

    /**
     * @var int $factor
     */
    protected $factor;

    /**
     * @psalm-param HandlerInterface|callable(Record|array{level: Level}|null, HandlerInterface): HandlerInterface $handler
     *
     * @param callable|HandlerInterface $handler Handler or factory callable($record|null, $samplingHandler).
     * @param int                       $factor  Sample factor (e.g. 10 means every ~10th record is sampled)
     */
    public function __construct($handler, int $factor)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct();
        $this->handler = $handler;
        $this->factor = $factor;
<<<<<<< HEAD
    }

    public function isHandling(LogRecord $record): bool
=======

        if (!$this->handler instanceof HandlerInterface && !is_callable($this->handler)) {
            throw new \RuntimeException("The given handler (".json_encode($this->handler).") is not a callable nor a Monolog\Handler\HandlerInterface object");
        }
    }

    public function isHandling(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        return $this->getHandler($record)->isHandling($record);
    }

<<<<<<< HEAD
    public function handle(LogRecord $record): bool
    {
        if ($this->isHandling($record) && mt_rand(1, $this->factor) === 1) {
            if (\count($this->processors) > 0) {
=======
    public function handle(array $record): bool
    {
        if ($this->isHandling($record) && mt_rand(1, $this->factor) === 1) {
            if ($this->processors) {
                /** @var Record $record */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                $record = $this->processRecord($record);
            }

            $this->getHandler($record)->handle($record);
        }

        return false === $this->bubble;
    }

    /**
     * Return the nested handler
     *
<<<<<<< HEAD
     * If the handler was provided as a factory, this will trigger the handler's instantiation.
     */
    public function getHandler(LogRecord $record = null): HandlerInterface
    {
        if (!$this->handler instanceof HandlerInterface) {
            $handler = ($this->handler)($record, $this);
            if (!$handler instanceof HandlerInterface) {
                throw new \RuntimeException("The factory Closure should return a HandlerInterface");
            }
            $this->handler = $handler;
=======
     * If the handler was provided as a factory callable, this will trigger the handler's instantiation.
     *
     * @phpstan-param Record|array{level: Level}|null $record
     *
     * @return HandlerInterface
     */
    public function getHandler(array $record = null)
    {
        if (!$this->handler instanceof HandlerInterface) {
            $this->handler = ($this->handler)($record, $this);
            if (!$this->handler instanceof HandlerInterface) {
                throw new \RuntimeException("The factory callable should return a HandlerInterface");
            }
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return $this->handler;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        $handler = $this->getHandler();
        if ($handler instanceof FormattableHandlerInterface) {
            $handler->setFormatter($formatter);

            return $this;
        }

        throw new \UnexpectedValueException('The nested handler of type '.get_class($handler).' does not support formatters.');
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getFormatter(): FormatterInterface
    {
        $handler = $this->getHandler();
        if ($handler instanceof FormattableHandlerInterface) {
            return $handler->getFormatter();
        }

        throw new \UnexpectedValueException('The nested handler of type '.get_class($handler).' does not support formatters.');
    }
}
