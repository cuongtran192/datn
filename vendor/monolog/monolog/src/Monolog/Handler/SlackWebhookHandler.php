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
<<<<<<< HEAD
use Monolog\Level;
use Monolog\Utils;
use Monolog\Handler\Slack\SlackRecord;
use Monolog\LogRecord;
=======
use Monolog\Logger;
use Monolog\Utils;
use Monolog\Handler\Slack\SlackRecord;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Sends notifications through Slack Webhooks
 *
 * @author Haralan Dobrev <hkdobrev@gmail.com>
 * @see    https://api.slack.com/incoming-webhooks
 */
class SlackWebhookHandler extends AbstractProcessingHandler
{
    /**
     * Slack Webhook token
<<<<<<< HEAD
     */
    private string $webhookUrl;

    /**
     * Instance of the SlackRecord util class preparing data for Slack API.
     */
    private SlackRecord $slackRecord;
=======
     * @var string
     */
    private $webhookUrl;

    /**
     * Instance of the SlackRecord util class preparing data for Slack API.
     * @var SlackRecord
     */
    private $slackRecord;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

    /**
     * @param string      $webhookUrl             Slack Webhook URL
     * @param string|null $channel                Slack channel (encoded ID or name)
     * @param string|null $username               Name of a bot
     * @param bool        $useAttachment          Whether the message should be added to Slack as attachment (plain text otherwise)
     * @param string|null $iconEmoji              The emoji name to use (or null)
     * @param bool        $useShortAttachment     Whether the the context/extra messages added to Slack as attachments are in a short style
     * @param bool        $includeContextAndExtra Whether the attachment should include context and extra data
     * @param string[]    $excludeFields          Dot separated list of fields to exclude from slack message. E.g. ['context.field1', 'extra.field2']
<<<<<<< HEAD
     *
     * @throws MissingExtensionException If the curl extension is missing
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function __construct(
        string $webhookUrl,
        ?string $channel = null,
        ?string $username = null,
        bool $useAttachment = true,
        ?string $iconEmoji = null,
        bool $useShortAttachment = false,
        bool $includeContextAndExtra = false,
<<<<<<< HEAD
        $level = Level::Critical,
        bool $bubble = true,
        array $excludeFields = []
=======
        $level = Logger::CRITICAL,
        bool $bubble = true,
        array $excludeFields = array()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    ) {
        if (!extension_loaded('curl')) {
            throw new MissingExtensionException('The curl extension is needed to use the SlackWebhookHandler');
        }

        parent::__construct($level, $bubble);

        $this->webhookUrl = $webhookUrl;

        $this->slackRecord = new SlackRecord(
            $channel,
            $username,
            $useAttachment,
            $iconEmoji,
            $useShortAttachment,
            $includeContextAndExtra,
            $excludeFields
        );
    }

    public function getSlackRecord(): SlackRecord
    {
        return $this->slackRecord;
    }

    public function getWebhookUrl(): string
    {
        return $this->webhookUrl;
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
        $postData = $this->slackRecord->getSlackData($record);
        $postString = Utils::jsonEncode($postData);

        $ch = curl_init();
<<<<<<< HEAD
        $options = [
            CURLOPT_URL => $this->webhookUrl,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-type: application/json'],
            CURLOPT_POSTFIELDS => $postString,
        ];
=======
        $options = array(
            CURLOPT_URL => $this->webhookUrl,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json'),
            CURLOPT_POSTFIELDS => $postString,
        );
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        if (defined('CURLOPT_SAFE_UPLOAD')) {
            $options[CURLOPT_SAFE_UPLOAD] = true;
        }

        curl_setopt_array($ch, $options);

        Curl\Util::execute($ch);
    }

    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        parent::setFormatter($formatter);
        $this->slackRecord->setFormatter($formatter);

        return $this;
    }

    public function getFormatter(): FormatterInterface
    {
        $formatter = parent::getFormatter();
        $this->slackRecord->setFormatter($formatter);

        return $formatter;
    }
}
