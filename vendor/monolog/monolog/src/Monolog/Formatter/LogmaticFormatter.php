<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

<<<<<<< HEAD
use Monolog\LogRecord;

=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
/**
 * Encodes message information into JSON in a format compatible with Logmatic.
 *
 * @author Julien Breux <julien.breux@gmail.com>
 */
class LogmaticFormatter extends JsonFormatter
{
    protected const MARKERS = ["sourcecode", "php"];

<<<<<<< HEAD
    protected string $hostname = '';

    protected string $appName = '';

    /**
     * @return $this
     */
=======
    /**
     * @var string
     */
    protected $hostname = '';

    /**
     * @var string
     */
    protected $appname = '';

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    public function setHostname(string $hostname): self
    {
        $this->hostname = $hostname;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return $this
     */
    public function setAppName(string $appName): self
    {
        $this->appName = $appName;
=======
    public function setAppname(string $appname): self
    {
        $this->appname = $appname;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $this;
    }

    /**
     * Appends the 'hostname' and 'appname' parameter for indexing by Logmatic.
     *
     * @see http://doc.logmatic.io/docs/basics-to-send-data
     * @see \Monolog\Formatter\JsonFormatter::format()
     */
<<<<<<< HEAD
    public function normalizeRecord(LogRecord $record): array
    {
        $record = parent::normalizeRecord($record);

        if ($this->hostname !== '') {
            $record["hostname"] = $this->hostname;
        }
        if ($this->appName !== '') {
            $record["appname"] = $this->appName;
=======
    public function format(array $record): string
    {
        if (!empty($this->hostname)) {
            $record["hostname"] = $this->hostname;
        }
        if (!empty($this->appname)) {
            $record["appname"] = $this->appname;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
        }

        $record["@marker"] = static::MARKERS;

<<<<<<< HEAD
        return $record;
=======
        return parent::format($record);
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    }
}
