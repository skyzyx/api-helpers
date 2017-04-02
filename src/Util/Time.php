<?php
/**
 * Copyright (c) 2010-2017 Ryan Parman
 * Copyright (c) 2016-2017 Lucky Rocketship Underpants, LLC.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * http://opensource.org/licenses/MIT
 */

declare(strict_types=1);

namespace Skyzyx\Api\Util;

use DateTime;
use DateTimeZone;

class Time
{
    // Multipliers
    public const SECOND  = 1;
    public const SECONDS = 1;
    public const MINUTE  = 60;
    public const MINUTES = 60;
    public const HOUR    = 3600;
    public const HOURS   = 3600;
    public const DAY     = 86400;
    public const DAYS    = 86400;
    public const WEEK    = 604800;
    public const WEEKS   = 604800;

    // Preferred format for UTC
    public const FORMAT_ISO8601 = 'Y-m-d\TH:i:s\Z';

    /**
     * Returns the current time as a DateTime object.
     *
     * @return DateTime The current time.
     */
    public static function now(): DateTime
    {
        /* @var \DateTime */
        return new DateTime('now', new DateTimeZone('UTC'));
    }
}
