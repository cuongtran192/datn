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

use Gelf\PublisherInterface;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\FormatterInterface;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Formatter\GelfMessageFormatter;
use Monolog\Formatter\FormatterInterface;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Handler to send messages to a Graylog2 (http://www.graylog2.org) server
 *
 * @author Matt Lehner <mlehner@gmail.com>
 * @author Benjamin Zikarsky <benjamin@zikarsky.de>
 */
class GelfHandler extends AbstractProcessingHandler
{
    /**
     * @var PublisherInterface the publisher object that sends the message to the server
     */
<<<<<<< HEAD
    protected PublisherInterface $publisher;
=======
    protected $publisher;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param PublisherInterface $publisher a gelf publisher object
     */
<<<<<<< HEAD
    public function __construct(PublisherInterface $publisher, int|string|Level $level = Level::Debug, bool $bubble = true)
=======
    public function __construct(PublisherInterface $publisher, $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);

        $this->publisher = $publisher;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $this->publisher->publish($record->formatted);
    }

    /**
     * @inheritDoc
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->publisher->publish($record['formatted']);
    }

    /**
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new GelfMessageFormatter();
    }
}
