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

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Handles the encoding of a response body.
 */
class ResponseBody
{
    /**
     * Encode the response body according to the `response.json.encoding` configuration.
     *
     * @param array              $content   The response data to encode.
     * @param ContainerInterface $container The Container configuration.
     *
     * @return string The encoded resonse body.
     */
    public static function encode(array $content, ContainerInterface $container): string
    {
        $encoding = $container['response.json.encoding'];

        switch ($encoding) {
            default:
                return json_encode($content, $encoding);
        }
    }

    /**
     * Writes the response into the PSR-7 Response object.
     *
     * @param Response           $response   The PSR-7 response object.
     * @param int                $statusCode An HTTP status code.
     * @param ContainerInterface $container  The Container config.
     * @param array              $content    The content to encode, as an array.
     *
     * @return Response
     */
    public static function addResponse(Response $response, int $statusCode, ContainerInterface $container, array $content): Response // @codingStandardsIgnoreLine
    {
        $response = $response
            ->withStatus($statusCode)
            ->withHeader('Content-Type', $container['response.json.content_type']);

        $body = $response->getBody();
        $body->write(self::encode($content, $container));

        return $response;
    }
}
