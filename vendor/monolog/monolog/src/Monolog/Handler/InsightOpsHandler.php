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
use Monolog\LogRecord;
=======
use Monolog\Logger;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Inspired on LogEntriesHandler.
 *
 * @author Robert Kaufmann III <rok3@rok3.me>
 * @author Gabriel Machado <gabriel.ms1@hotmail.com>
 */
class InsightOpsHandler extends SocketHandler
{
<<<<<<< HEAD
    protected string $logToken;

    /**
     * @param string $token  Log token supplied by InsightOps
     * @param string $region Region where InsightOps account is hosted. Could be 'us' or 'eu'.
     * @param bool   $useSSL Whether or not SSL encryption should be used
=======
    /**
     * @var string
     */
    protected $logToken;

    /**
     * @param string     $token  Log token supplied by InsightOps
     * @param string     $region Region where InsightOps account is hosted. Could be 'us' or 'eu'.
     * @param bool       $useSSL Whether or not SSL encryption should be used
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     *
     * @throws MissingExtensionException If SSL encryption is set to true and OpenSSL is missing
     */
    public function __construct(
        string $token,
        string $region = 'us',
        bool $useSSL = true,
<<<<<<< HEAD
        $level = Level::Debug,
=======
        $level = Logger::DEBUG,
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        bool $bubble = true,
        bool $persistent = false,
        float $timeout = 0.0,
        float $writingTimeout = 10.0,
        ?float $connectionTimeout = null,
        ?int $chunkSize = null
    ) {
        if ($useSSL && !extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP plugin is required to use SSL encrypted connection for InsightOpsHandler');
        }

        $endpoint = $useSSL
            ? 'ssl://' . $region . '.data.logs.insight.rapid7.com:443'
            : $region . '.data.logs.insight.rapid7.com:80';

        parent::__construct(
            $endpoint,
            $level,
            $bubble,
            $persistent,
            $timeout,
            $writingTimeout,
            $connectionTimeout,
            $chunkSize
        );
        $this->logToken = $token;
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    protected function generateDataStream(LogRecord $record): string
    {
        return $this->logToken . ' ' . $record->formatted;
=======
     * {@inheritDoc}
     */
    protected function generateDataStream(array $record): string
    {
        return $this->logToken . ' ' . $record['formatted'];
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
