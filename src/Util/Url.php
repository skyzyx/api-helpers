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

use Psr\Http\Message\ServerRequestInterface as Request;

class Url
{
    /**
     * Gets the complete URL that was requested.
     *
     * @param Response $response The PSR-7 response object.
     *
     * @return string The complete URL that was requested.
     */
    public static function getCompleteUrl(Request $request): string
    {
        $uri = $request->getUri();

        return sprintf('%s://%s%s%s%s',
            $uri->getScheme(),
            $uri->getHost(),
            $uri->getPath(),
            ($uri->getQuery() ? '?' . $uri->getQuery() : ''),
            ($uri->getFragment() ? '#' . $uri->getFragment() : '')
        );
    }
}