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
 * IFTTTHandler uses cURL to trigger IFTTT Maker actions
 *
 * Register a secret key and trigger/event name at https://ifttt.com/maker
 *
 * value1 will be the channel from monolog's Logger constructor,
 * value2 will be the level name (ERROR, WARNING, ..)
 * value3 will be the log record's message
 *
 * @author Nehal Patel <nehal@nehalpatel.me>
 */
class IFTTTHandler extends AbstractProcessingHandler
{
<<<<<<< HEAD
    private string $eventName;
    private string $secretKey;
=======
    /** @var string */
    private $eventName;
    /** @var string */
    private $secretKey;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param string $eventName The name of the IFTTT Maker event that should be triggered
     * @param string $secretKey A valid IFTTT secret key
<<<<<<< HEAD
     *
     * @throws MissingExtensionException If the curl extension is missing
     */
    public function __construct(string $eventName, string $secretKey, int|string|Level $level = Level::Error, bool $bubble = true)
=======
     */
    public function __construct(string $eventName, string $secretKey, $level = Logger::ERROR, bool $bubble = true)
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        if (!extension_loaded('curl')) {
            throw new MissingExtensionException('The curl extension is needed to use the IFTTTHandler');
        }

        $this->eventName = $eventName;
        $this->secretKey = $secretKey;

        parent::__construct($level, $bubble);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function write(LogRecord $record): void
    {
        $postData = [
            "value1" => $record->channel,
            "value2" => $record["level_name"],
            "value3" => $record->message,
=======
     * {@inheritDoc}
     */
    public function write(array $record): void
    {
        $postData = [
            "value1" => $record["channel"],
            "value2" => $record["level_name"],
            "value3" => $record["message"],
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        ];
        $postString = Utils::jsonEncode($postData);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://maker.ifttt.com/trigger/" . $this->eventName . "/with/key/" . $this->secretKey);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
        ]);

        Curl\Util::execute($ch);
    }
}
