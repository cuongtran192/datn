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

use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\JsonFormatter;
<<<<<<< HEAD
use Monolog\Level;
use Monolog\LogRecord;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * CouchDB handler
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
<<<<<<< HEAD
 * @phpstan-type Options array{
 *     host: string,
 *     port: int,
 *     dbname: string,
 *     username: string|null,
 *     password: string|null
 * }
 * @phpstan-type InputOptions array{
 *     host?: string,
 *     port?: int,
 *     dbname?: string,
 *     username?: string|null,
 *     password?: string|null
 * }
 */
class CouchDBHandler extends AbstractProcessingHandler
{
    /**
     * @var mixed[]
     * @phpstan-var Options
     */
    private array $options;

    /**
     * @param mixed[] $options
     *
     * @phpstan-param InputOptions $options
     */
    public function __construct(array $options = [], int|string|Level $level = Level::Debug, bool $bubble = true)
=======
 */
class CouchDBHandler extends AbstractProcessingHandler
{
    /** @var mixed[] */
    private $options;

    /**
     * @param mixed[] $options
     */
    public function __construct(array $options = [], $level = Logger::DEBUG, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->options = array_merge([
            'host'     => 'localhost',
            'port'     => 5984,
            'dbname'   => 'logger',
            'username' => null,
            'password' => null,
        ], $options);

        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
    {
        $basicAuth = null;
        if (null !== $this->options['username'] && null !== $this->options['password']) {
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $basicAuth = null;
        if ($this->options['username']) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $basicAuth = sprintf('%s:%s@', $this->options['username'], $this->options['password']);
        }

        $url = 'http://'.$basicAuth.$this->options['host'].':'.$this->options['port'].'/'.$this->options['dbname'];
        $context = stream_context_create([
            'http' => [
                'method'        => 'POST',
<<<<<<< HEAD
                'content'       => $record->formatted,
=======
                'content'       => $record['formatted'],
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                'ignore_errors' => true,
                'max_redirects' => 0,
                'header'        => 'Content-type: application/json',
            ],
        ]);

        if (false === @file_get_contents($url, false, $context)) {
            throw new \RuntimeException(sprintf('Could not connect to %s', $url));
        }
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
=======
     * {@inheritDoc}
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new JsonFormatter(JsonFormatter::BATCH_MODE_JSON, false);
    }
}
