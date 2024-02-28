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
use Psr\Log\LoggerInterface;
use Monolog\Formatter\FormatterInterface;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Monolog\Formatter\FormatterInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Proxies log messages to an existing PSR-3 compliant logger.
 *
 * If a formatter is configured, the formatter's output MUST be a string and the
 * formatted message will be fed to the wrapped PSR logger instead of the original
 * log record's message.
 *
 * @author Michael Moussa <michael.moussa@gmail.com>
 */
class PsrHandler extends AbstractHandler implements FormattableHandlerInterface
{
    /**
     * PSR-3 compliant logger
<<<<<<< HEAD
     */
    protected LoggerInterface $logger;

    protected FormatterInterface|null $formatter = null;
=======
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var FormatterInterface|null
     */
    protected $formatter;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param LoggerInterface $logger The underlying PSR-3 compliant logger to which messages will be proxied
     */
<<<<<<< HEAD
    public function __construct(LoggerInterface $logger, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    public function __construct(LoggerInterface $logger, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);

        $this->logger = $logger;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function handle(LogRecord $record): bool
=======
     * {@inheritDoc}
     */
    public function handle(array $record): bool
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!$this->isHandling($record)) {
            return false;
        }

<<<<<<< HEAD
        if ($this->formatter !== null) {
            $formatted = $this->formatter->format($record);
            $this->logger->log($record->level->toPsrLogLevel(), (string) $formatted, $record->context);
        } else {
            $this->logger->log($record->level->toPsrLogLevel(), $record->message, $record->context);
=======
        if ($this->formatter) {
            $formatted = $this->formatter->format($record);
            $this->logger->log(strtolower($record['level_name']), (string) $formatted, $record['context']);
        } else {
            $this->logger->log(strtolower($record['level_name']), $record['message'], $record['context']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return false === $this->bubble;
    }

    /**
     * Sets the formatter.
<<<<<<< HEAD
=======
     *
     * @param FormatterInterface $formatter
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * Gets the formatter.
<<<<<<< HEAD
     */
    public function getFormatter(): FormatterInterface
    {
        if ($this->formatter === null) {
=======
     *
     * @return FormatterInterface
     */
    public function getFormatter(): FormatterInterface
    {
        if (!$this->formatter) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            throw new \LogicException('No formatter has been set and this handler does not have a default formatter');
        }

        return $this->formatter;
    }
}
