<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog;

<<<<<<< HEAD
use Closure;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;

/**
 * Monolog error handler
 *
 * A facility to enable logging of runtime errors, exceptions and fatal errors.
 *
 * Quick setup: <code>ErrorHandler::register($logger);</code>
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
class ErrorHandler
{
<<<<<<< HEAD
    private Closure|null $previousExceptionHandler = null;

    /** @var array<class-string, LogLevel::*> an array of class name to LogLevel::* constant mapping */
    private array $uncaughtExceptionLevelMap = [];

    /** @var Closure|true|null */
    private Closure|bool|null $previousErrorHandler = null;

    /** @var array<int, LogLevel::*> an array of E_* constant to LogLevel::* constant mapping */
    private array $errorLevelMap = [];

    private bool $handleOnlyReportedErrors = true;

    private bool $hasFatalErrorHandler = false;

    private string $fatalLevel = LogLevel::ALERT;

    private string|null $reservedMemory = null;

    /** @var ?array{type: int, message: string, file: string, line: int, trace: mixed} */
    private array|null $lastFatalData = null;

    private const FATAL_ERRORS = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];

    public function __construct(
        private LoggerInterface $logger
    ) {
=======
    /** @var LoggerInterface */
    private $logger;

    /** @var ?callable */
    private $previousExceptionHandler = null;
    /** @var array<class-string, LogLevel::*> an array of class name to LogLevel::* constant mapping */
    private $uncaughtExceptionLevelMap = [];

    /** @var callable|true|null */
    private $previousErrorHandler = null;
    /** @var array<int, LogLevel::*> an array of E_* constant to LogLevel::* constant mapping */
    private $errorLevelMap = [];
    /** @var bool */
    private $handleOnlyReportedErrors = true;

    /** @var bool */
    private $hasFatalErrorHandler = false;
    /** @var LogLevel::* */
    private $fatalLevel = LogLevel::ALERT;
    /** @var ?string */
    private $reservedMemory = null;
    /** @var ?array{type: int, message: string, file: string, line: int, trace: mixed} */
    private $lastFatalData = null;
    /** @var int[] */
    private static $fatalErrors = [E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR];

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }

    /**
     * Registers a new ErrorHandler for a given Logger
     *
     * By default it will handle errors, exceptions and fatal errors
     *
<<<<<<< HEAD
     * @param  array<int, LogLevel::*>|false          $errorLevelMap     an array of E_* constant to LogLevel::* constant mapping, or false to disable error handling
     * @param  array<class-string, LogLevel::*>|false $exceptionLevelMap an array of class name to LogLevel::* constant mapping, or false to disable exception handling
     * @param  LogLevel::*|null|false                 $fatalLevel        a LogLevel::* constant, null to use the default LogLevel::ALERT or false to disable fatal error handling
     * @return static
=======
     * @param  LoggerInterface                        $logger
     * @param  array<int, LogLevel::*>|false          $errorLevelMap     an array of E_* constant to LogLevel::* constant mapping, or false to disable error handling
     * @param  array<class-string, LogLevel::*>|false $exceptionLevelMap an array of class name to LogLevel::* constant mapping, or false to disable exception handling
     * @param  LogLevel::*|null|false                 $fatalLevel        a LogLevel::* constant, null to use the default LogLevel::ALERT or false to disable fatal error handling
     * @return ErrorHandler
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public static function register(LoggerInterface $logger, $errorLevelMap = [], $exceptionLevelMap = [], $fatalLevel = null): self
    {
        /** @phpstan-ignore-next-line */
        $handler = new static($logger);
        if ($errorLevelMap !== false) {
            $handler->registerErrorHandler($errorLevelMap);
        }
        if ($exceptionLevelMap !== false) {
            $handler->registerExceptionHandler($exceptionLevelMap);
        }
        if ($fatalLevel !== false) {
            $handler->registerFatalHandler($fatalLevel);
        }

        return $handler;
    }

    /**
     * @param  array<class-string, LogLevel::*> $levelMap an array of class name to LogLevel::* constant mapping
     * @return $this
     */
    public function registerExceptionHandler(array $levelMap = [], bool $callPrevious = true): self
    {
        $prev = set_exception_handler(function (\Throwable $e): void {
            $this->handleException($e);
        });
        $this->uncaughtExceptionLevelMap = $levelMap;
        foreach ($this->defaultExceptionLevelMap() as $class => $level) {
            if (!isset($this->uncaughtExceptionLevelMap[$class])) {
                $this->uncaughtExceptionLevelMap[$class] = $level;
            }
        }
<<<<<<< HEAD
        if ($callPrevious && null !== $prev) {
            $this->previousExceptionHandler = $prev(...);
=======
        if ($callPrevious && $prev) {
            $this->previousExceptionHandler = $prev;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return $this;
    }

    /**
     * @param  array<int, LogLevel::*> $levelMap an array of E_* constant to LogLevel::* constant mapping
     * @return $this
     */
    public function registerErrorHandler(array $levelMap = [], bool $callPrevious = true, int $errorTypes = -1, bool $handleOnlyReportedErrors = true): self
    {
<<<<<<< HEAD
        $prev = set_error_handler($this->handleError(...), $errorTypes);
        $this->errorLevelMap = array_replace($this->defaultErrorLevelMap(), $levelMap);
        if ($callPrevious) {
            $this->previousErrorHandler = $prev !== null ? $prev(...) : true;
=======
        $prev = set_error_handler([$this, 'handleError'], $errorTypes);
        $this->errorLevelMap = array_replace($this->defaultErrorLevelMap(), $levelMap);
        if ($callPrevious) {
            $this->previousErrorHandler = $prev ?: true;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        } else {
            $this->previousErrorHandler = null;
        }

        $this->handleOnlyReportedErrors = $handleOnlyReportedErrors;

        return $this;
    }

    /**
     * @param LogLevel::*|null $level              a LogLevel::* constant, null to use the default LogLevel::ALERT
     * @param int              $reservedMemorySize Amount of KBs to reserve in memory so that it can be freed when handling fatal errors giving Monolog some room in memory to get its job done
<<<<<<< HEAD
     * @return $this
     */
    public function registerFatalHandler($level = null, int $reservedMemorySize = 20): self
    {
        register_shutdown_function($this->handleFatalError(...));
=======
     */
    public function registerFatalHandler($level = null, int $reservedMemorySize = 20): self
    {
        register_shutdown_function([$this, 'handleFatalError']);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        $this->reservedMemory = str_repeat(' ', 1024 * $reservedMemorySize);
        $this->fatalLevel = null === $level ? LogLevel::ALERT : $level;
        $this->hasFatalErrorHandler = true;

        return $this;
    }

    /**
     * @return array<class-string, LogLevel::*>
     */
    protected function defaultExceptionLevelMap(): array
    {
        return [
            'ParseError' => LogLevel::CRITICAL,
            'Throwable' => LogLevel::ERROR,
        ];
    }

    /**
     * @return array<int, LogLevel::*>
     */
    protected function defaultErrorLevelMap(): array
    {
        return [
            E_ERROR             => LogLevel::CRITICAL,
            E_WARNING           => LogLevel::WARNING,
            E_PARSE             => LogLevel::ALERT,
            E_NOTICE            => LogLevel::NOTICE,
            E_CORE_ERROR        => LogLevel::CRITICAL,
            E_CORE_WARNING      => LogLevel::WARNING,
            E_COMPILE_ERROR     => LogLevel::ALERT,
            E_COMPILE_WARNING   => LogLevel::WARNING,
            E_USER_ERROR        => LogLevel::ERROR,
            E_USER_WARNING      => LogLevel::WARNING,
            E_USER_NOTICE       => LogLevel::NOTICE,
            E_STRICT            => LogLevel::NOTICE,
            E_RECOVERABLE_ERROR => LogLevel::ERROR,
            E_DEPRECATED        => LogLevel::NOTICE,
            E_USER_DEPRECATED   => LogLevel::NOTICE,
        ];
    }

<<<<<<< HEAD
    private function handleException(\Throwable $e): never
=======
    /**
     * @phpstan-return never
     */
    private function handleException(\Throwable $e): void
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $level = LogLevel::ERROR;
        foreach ($this->uncaughtExceptionLevelMap as $class => $candidate) {
            if ($e instanceof $class) {
                $level = $candidate;
                break;
            }
        }

        $this->logger->log(
            $level,
            sprintf('Uncaught Exception %s: "%s" at %s line %s', Utils::getClass($e), $e->getMessage(), $e->getFile(), $e->getLine()),
            ['exception' => $e]
        );

<<<<<<< HEAD
        if (null !== $this->previousExceptionHandler) {
=======
        if ($this->previousExceptionHandler) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            ($this->previousExceptionHandler)($e);
        }

        if (!headers_sent() && in_array(strtolower((string) ini_get('display_errors')), ['0', '', 'false', 'off', 'none', 'no'], true)) {
            http_response_code(500);
        }

        exit(255);
    }

<<<<<<< HEAD
    private function handleError(int $code, string $message, string $file = '', int $line = 0): bool
    {
        if ($this->handleOnlyReportedErrors && 0 === (error_reporting() & $code)) {
=======
    /**
     * @private
     *
     * @param mixed[] $context
     */
    public function handleError(int $code, string $message, string $file = '', int $line = 0, ?array $context = []): bool
    {
        if ($this->handleOnlyReportedErrors && !(error_reporting() & $code)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            return false;
        }

        // fatal error codes are ignored if a fatal error handler is present as well to avoid duplicate log entries
<<<<<<< HEAD
        if (!$this->hasFatalErrorHandler || !in_array($code, self::FATAL_ERRORS, true)) {
=======
        if (!$this->hasFatalErrorHandler || !in_array($code, self::$fatalErrors, true)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $level = $this->errorLevelMap[$code] ?? LogLevel::CRITICAL;
            $this->logger->log($level, self::codeToString($code).': '.$message, ['code' => $code, 'message' => $message, 'file' => $file, 'line' => $line]);
        } else {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            array_shift($trace); // Exclude handleError from trace
            $this->lastFatalData = ['type' => $code, 'message' => $message, 'file' => $file, 'line' => $line, 'trace' => $trace];
        }

        if ($this->previousErrorHandler === true) {
            return false;
<<<<<<< HEAD
        }
        if ($this->previousErrorHandler instanceof Closure) {
            return (bool) ($this->previousErrorHandler)($code, $message, $file, $line);
=======
        } elseif ($this->previousErrorHandler) {
            return (bool) ($this->previousErrorHandler)($code, $message, $file, $line, $context);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        return true;
    }

    /**
     * @private
     */
    public function handleFatalError(): void
    {
        $this->reservedMemory = '';

        if (is_array($this->lastFatalData)) {
            $lastError = $this->lastFatalData;
        } else {
            $lastError = error_get_last();
        }
<<<<<<< HEAD
        if (is_array($lastError) && in_array($lastError['type'], self::FATAL_ERRORS, true)) {
=======

        if ($lastError && in_array($lastError['type'], self::$fatalErrors, true)) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
            $trace = $lastError['trace'] ?? null;
            $this->logger->log(
                $this->fatalLevel,
                'Fatal Error ('.self::codeToString($lastError['type']).'): '.$lastError['message'],
                ['code' => $lastError['type'], 'message' => $lastError['message'], 'file' => $lastError['file'], 'line' => $lastError['line'], 'trace' => $trace]
            );

            if ($this->logger instanceof Logger) {
                foreach ($this->logger->getHandlers() as $handler) {
                    $handler->close();
                }
            }
        }
    }

<<<<<<< HEAD
    private static function codeToString(int $code): string
    {
        return match ($code) {
            E_ERROR => 'E_ERROR',
            E_WARNING => 'E_WARNING',
            E_PARSE => 'E_PARSE',
            E_NOTICE => 'E_NOTICE',
            E_CORE_ERROR => 'E_CORE_ERROR',
            E_CORE_WARNING => 'E_CORE_WARNING',
            E_COMPILE_ERROR => 'E_COMPILE_ERROR',
            E_COMPILE_WARNING => 'E_COMPILE_WARNING',
            E_USER_ERROR => 'E_USER_ERROR',
            E_USER_WARNING => 'E_USER_WARNING',
            E_USER_NOTICE => 'E_USER_NOTICE',
            E_STRICT => 'E_STRICT',
            E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
            E_DEPRECATED => 'E_DEPRECATED',
            E_USER_DEPRECATED => 'E_USER_DEPRECATED',
            default => 'Unknown PHP error',
        };
=======
    /**
     * @param int $code
     */
    private static function codeToString($code): string
    {
        switch ($code) {
            case E_ERROR:
                return 'E_ERROR';
            case E_WARNING:
                return 'E_WARNING';
            case E_PARSE:
                return 'E_PARSE';
            case E_NOTICE:
                return 'E_NOTICE';
            case E_CORE_ERROR:
                return 'E_CORE_ERROR';
            case E_CORE_WARNING:
                return 'E_CORE_WARNING';
            case E_COMPILE_ERROR:
                return 'E_COMPILE_ERROR';
            case E_COMPILE_WARNING:
                return 'E_COMPILE_WARNING';
            case E_USER_ERROR:
                return 'E_USER_ERROR';
            case E_USER_WARNING:
                return 'E_USER_WARNING';
            case E_USER_NOTICE:
                return 'E_USER_NOTICE';
            case E_STRICT:
                return 'E_STRICT';
            case E_RECOVERABLE_ERROR:
                return 'E_RECOVERABLE_ERROR';
            case E_DEPRECATED:
                return 'E_DEPRECATED';
            case E_USER_DEPRECATED:
                return 'E_USER_DEPRECATED';
        }

        return 'Unknown PHP error';
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
