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
use Monolog\Utils;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Stores to any stream resource
 *
 * Can be used to store into php://stderr, remote and local files, etc.
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 */
class StreamHandler extends AbstractProcessingHandler
{
    protected const MAX_CHUNK_SIZE = 2147483647;
    /** 10MB */
    protected const DEFAULT_CHUNK_SIZE = 10 * 1024 * 1024;
    protected int $streamChunkSize;
    /** @var resource|null */
    protected $stream;
    protected string|null $url = null;
    private string|null $errorMessage = null;
    protected int|null $filePermission;
    protected bool $useLocking;
    /** @var true|null */
    private bool|null $dirCreated = null;
=======
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
 */
class StreamHandler extends AbstractProcessingHandler
{
    /** @const int */
    protected const MAX_CHUNK_SIZE = 2147483647;
    /** @const int 10MB */
    protected const DEFAULT_CHUNK_SIZE = 10 * 1024 * 1024;
    /** @var int */
    protected $streamChunkSize;
    /** @var resource|null */
    protected $stream;
    /** @var ?string */
    protected $url = null;
    /** @var ?string */
    private $errorMessage = null;
    /** @var ?int */
    protected $filePermission;
    /** @var bool */
    protected $useLocking;
    /** @var true|null */
    private $dirCreated = null;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param resource|string $stream         If a missing path can't be created, an UnexpectedValueException will be thrown on first write
     * @param int|null        $filePermission Optional file permissions (default (0644) are only for owner read/write)
     * @param bool            $useLocking     Try to lock log file before doing any writes
     *
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
<<<<<<< HEAD
    public function __construct($stream, int|string|Level $level = Level::Debug, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
=======
    public function __construct($stream, $level = Logger::DEBUG, bool $bubble = true, ?int $filePermission = null, bool $useLocking = false)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        parent::__construct($level, $bubble);

        if (($phpMemoryLimit = Utils::expandIniShorthandBytes(ini_get('memory_limit'))) !== false) {
            if ($phpMemoryLimit > 0) {
                // use max 10% of allowed memory for the chunk size, and at least 100KB
                $this->streamChunkSize = min(static::MAX_CHUNK_SIZE, max((int) ($phpMemoryLimit / 10), 100 * 1024));
            } else {
                // memory is unlimited, set to the default 10MB
                $this->streamChunkSize = static::DEFAULT_CHUNK_SIZE;
            }
        } else {
            // no memory limit information, set to the default 10MB
            $this->streamChunkSize = static::DEFAULT_CHUNK_SIZE;
        }

        if (is_resource($stream)) {
            $this->stream = $stream;

            stream_set_chunk_size($this->stream, $this->streamChunkSize);
        } elseif (is_string($stream)) {
            $this->url = Utils::canonicalizePath($stream);
        } else {
            throw new \InvalidArgumentException('A stream must either be a resource or a string.');
        }

        $this->filePermission = $filePermission;
        $this->useLocking = $useLocking;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function close(): void
    {
        if (null !== $this->url && is_resource($this->stream)) {
=======
     * {@inheritDoc}
     */
    public function close(): void
    {
        if ($this->url && is_resource($this->stream)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            fclose($this->stream);
        }
        $this->stream = null;
        $this->dirCreated = null;
    }

    /**
     * Return the currently active stream if it is open
     *
     * @return resource|null
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * Return the stream URL if it was configured with a URL and not an active resource
<<<<<<< HEAD
=======
     *
     * @return string|null
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

<<<<<<< HEAD
=======
    /**
     * @return int
     */
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    public function getStreamChunkSize(): int
    {
        return $this->streamChunkSize;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function write(LogRecord $record): void
=======
     * {@inheritDoc}
     */
    protected function write(array $record): void
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!is_resource($this->stream)) {
            $url = $this->url;
            if (null === $url || '' === $url) {
                throw new \LogicException('Missing stream url, the stream can not be opened. This may be caused by a premature call to close().' . Utils::getRecordMessageForException($record));
            }
            $this->createDir($url);
            $this->errorMessage = null;
            set_error_handler([$this, 'customErrorHandler']);
            try {
                $stream = fopen($url, 'a');
                if ($this->filePermission !== null) {
                    @chmod($url, $this->filePermission);
                }
            } finally {
                restore_error_handler();
            }
            if (!is_resource($stream)) {
                $this->stream = null;

                throw new \UnexpectedValueException(sprintf('The stream or file "%s" could not be opened in append mode: '.$this->errorMessage, $url) . Utils::getRecordMessageForException($record));
            }
            stream_set_chunk_size($stream, $this->streamChunkSize);
            $this->stream = $stream;
        }

        $stream = $this->stream;
<<<<<<< HEAD
=======
        if (!is_resource($stream)) {
            throw new \LogicException('No stream was opened yet' . Utils::getRecordMessageForException($record));
        }

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        if ($this->useLocking) {
            // ignoring errors here, there's not much we can do about them
            flock($stream, LOCK_EX);
        }

        $this->streamWrite($stream, $record);

        if ($this->useLocking) {
            flock($stream, LOCK_UN);
        }
    }

    /**
     * Write to stream
     * @param resource $stream
<<<<<<< HEAD
     */
    protected function streamWrite($stream, LogRecord $record): void
    {
        fwrite($stream, (string) $record->formatted);
=======
     * @param array    $record
     *
     * @phpstan-param FormattedRecord $record
     */
    protected function streamWrite($stream, array $record): void
    {
        fwrite($stream, (string) $record['formatted']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    private function customErrorHandler(int $code, string $msg): bool
    {
        $this->errorMessage = preg_replace('{^(fopen|mkdir)\(.*?\): }', '', $msg);

        return true;
    }

    private function getDirFromStream(string $stream): ?string
    {
        $pos = strpos($stream, '://');
        if ($pos === false) {
            return dirname($stream);
        }

        if ('file://' === substr($stream, 0, 7)) {
            return dirname(substr($stream, 7));
        }

        return null;
    }

    private function createDir(string $url): void
    {
        // Do not try to create dir if it has already been tried.
<<<<<<< HEAD
        if (true === $this->dirCreated) {
=======
        if ($this->dirCreated) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            return;
        }

        $dir = $this->getDirFromStream($url);
        if (null !== $dir && !is_dir($dir)) {
            $this->errorMessage = null;
            set_error_handler([$this, 'customErrorHandler']);
            $status = mkdir($dir, 0777, true);
            restore_error_handler();
            if (false === $status && !is_dir($dir) && strpos((string) $this->errorMessage, 'File exists') === false) {
                throw new \UnexpectedValueException(sprintf('There is no existing directory at "%s" and it could not be created: '.$this->errorMessage, $dir));
            }
        }
        $this->dirCreated = true;
    }
}
