<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler\Curl;

use CurlHandle;

/**
 * This class is marked as internal and it is not under the BC promise of the package.
 *
 * @internal
 */
final class Util
{
    /** @var array<int> */
<<<<<<< HEAD
    private static array $retriableErrorCodes = [
=======
    private static $retriableErrorCodes = [
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        CURLE_COULDNT_RESOLVE_HOST,
        CURLE_COULDNT_CONNECT,
        CURLE_HTTP_NOT_FOUND,
        CURLE_READ_ERROR,
        CURLE_OPERATION_TIMEOUTED,
        CURLE_HTTP_POST_ERROR,
        CURLE_SSL_CONNECT_ERROR,
    ];

    /**
     * Executes a CURL request with optional retries and exception on failure
     *
<<<<<<< HEAD
     * @param  CurlHandle  $ch curl handler
     * @return bool|string @see curl_exec
     */
    public static function execute(CurlHandle $ch, int $retries = 5, bool $closeAfterDone = true)
=======
     * @param  resource|CurlHandle $ch             curl handler
     * @param  int                 $retries
     * @param  bool                $closeAfterDone
     * @return bool|string         @see curl_exec
     */
    public static function execute($ch, int $retries = 5, bool $closeAfterDone = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        while ($retries--) {
            $curlResponse = curl_exec($ch);
            if ($curlResponse === false) {
                $curlErrno = curl_errno($ch);

<<<<<<< HEAD
                if (false === in_array($curlErrno, self::$retriableErrorCodes, true) || $retries === 0) {
=======
                if (false === in_array($curlErrno, self::$retriableErrorCodes, true) || !$retries) {
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
                    $curlError = curl_error($ch);

                    if ($closeAfterDone) {
                        curl_close($ch);
                    }

                    throw new \RuntimeException(sprintf('Curl error (code %d): %s', $curlErrno, $curlError));
                }

                continue;
            }

            if ($closeAfterDone) {
                curl_close($ch);
            }

            return $curlResponse;
        }

        return false;
    }
}
