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

/**
 * Interface to describe loggers that have a formatter
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 */
interface FormattableHandlerInterface
{
    /**
     * Sets the formatter.
     *
<<<<<<< HEAD
     * @return HandlerInterface self
=======
     * @param  FormatterInterface $formatter
     * @return HandlerInterface   self
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface;

    /**
     * Gets the formatter.
<<<<<<< HEAD
=======
     *
     * @return FormatterInterface
>>>>>>> ffc421df8b2673130290487edd180df2ab612c65
     */
    public function getFormatter(): FormatterInterface;
}
