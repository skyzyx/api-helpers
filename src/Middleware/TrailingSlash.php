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

namespace Skyzyx\Api\Middleware;

use Skyzyx\Api\Enum\HttpStatus as Status;
use Skyzyx\Api\Util\Url;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TrailingSlash extends AbstractMiddleware
{
    /**
     * TrailingSlash is Middleware which is responsible for ensuring the
     * trailing slash is removed from the url via redirect.
     *
     * @param Request  $request  The PSR-7 request object.
     * @param Response $response The PSR-7 response object.
     * @param callable $next     The next middleware in the stack.
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, callable $next): Response
    {
        $uri  = $request->getUri();
        $path = $uri->getPath();

        if ($path !== '/' && mb_substr($path, -1) === '/') {
            if ($request->getMethod() === 'GET') {
                return $response->withRedirect(
                    mb_substr(URL::getCompleteUrl($request), 0, -1),
                    Status::PERMANENT_REDIRECT
                );
            }

            return $next($request->withUri($uri), $response);
        }

        return $next($request, $response);
    }
}
