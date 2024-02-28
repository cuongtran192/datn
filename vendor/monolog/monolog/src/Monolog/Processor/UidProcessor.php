<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

use Monolog\ResettableInterface;
<<<<<<< HEAD
use Monolog\LogRecord;
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

/**
 * Adds a unique identifier into records
 *
 * @author Simon Mönch <sm@webfactory.de>
 */
class UidProcessor implements ProcessorInterface, ResettableInterface
{
<<<<<<< HEAD
    /** @var non-empty-string */
    private string $uid;

    /**
     * @param int<1, 32> $length
     */
=======
    /** @var string */
    private $uid;

>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    public function __construct(int $length = 7)
    {
        if ($length > 32 || $length < 1) {
            throw new \InvalidArgumentException('The uid length must be an integer between 1 and 32');
        }

        $this->uid = $this->generateUid($length);
    }

    /**
<<<<<<< HEAD
     * @inheritDoc
     */
    public function __invoke(LogRecord $record): LogRecord
    {
        $record->extra['uid'] = $this->uid;
=======
     * {@inheritDoc}
     */
    public function __invoke(array $record): array
    {
        $record['extra']['uid'] = $this->uid;
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65

        return $record;
    }

    public function getUid(): string
    {
        return $this->uid;
    }

<<<<<<< HEAD
    public function reset(): void
=======
    public function reset()
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    {
        $this->uid = $this->generateUid(strlen($this->uid));
    }

<<<<<<< HEAD
    /**
     * @param  positive-int     $length
     * @return non-empty-string
     */
=======
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
    private function generateUid(int $length): string
    {
        return substr(bin2hex(random_bytes((int) ceil($length / 2))), 0, $length);
    }
}
