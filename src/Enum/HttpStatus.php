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

namespace Skyzyx\Api\Enum;

class HttpStatus
{
    // Names-to-codes
    public const CONTINUE                        = 100;
    public const OK                              = 200;
    public const CREATED                         = 201;
    public const ACCEPTED                        = 202;
    public const NO_CONTENT                      = 204;
    public const PARTIAL_CONTENT                 = 206;
    public const PERMANENT_REDIRECT              = 301;
    public const TEMPORARY_REDIRECT              = 302;
    public const NOT_MODIFIED                    = 304;
    public const BAD_REQUEST                     = 400;
    public const UNAUTHORIZED                    = 401;
    public const PAYMENT_REQUIRED                = 402;
    public const FORBIDDEN                       = 403;
    public const NOT_FOUND                       = 404;
    public const METHOD_NOT_ALLOWED              = 405;
    public const NOT_ACCEPTABLE                  = 406;
    public const CONFLICT                        = 409;
    public const GONE                            = 410;
    public const LENGTH_REQUIRED                 = 411;
    public const URI_TOO_LONG                    = 414;
    public const UNSUPPORTED_MEDIA_TYPE          = 415;
    public const RANGE_NOT_SATISFIABLE           = 416;
    public const EXPECTATION_FAILED              = 417;
    public const UNPROCESSABLE_ENTITY            = 422;
    public const UPGRADE_REQUIRED                = 426;
    public const PRECONDITION_REQUIRED           = 428;
    public const TOO_MANY_REQUESTS               = 429;
    public const REQUEST_FIELDS_TOO_LARGE        = 431;
    public const NO_RESPONSE                     = 444;
    public const UNAVAILABLE_FOR_LEGAL_REASONS   = 451;
    public const REQUEST_FIELDS_TOO_LARGE_NGINX  = 494;
    public const CERTIFICATE_ERROR               = 495;
    public const NO_CERTIFICATE                  = 496;
    public const HTTP_REQUEST_SENT_TO_HTTPS_PORT = 497;
    public const INTERNAL_SERVER_ERROR           = 500;
    public const NOT_IMPLEMENTED                 = 501;
    public const BAD_GATEWAY                     = 502;
    public const SERVICE_UNAVAILABLE             = 503;
    public const GATEWAY_TIMEOUT                 = 504;
    public const HTTP_VERSION_NOT_SUPPORTED      = 505;
}
