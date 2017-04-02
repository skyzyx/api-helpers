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

namespace Skyzyx\Api\Dictionary;

use Exception;
use Skyzyx\Api\Enum\HttpStatus as Status;

/**
 * Dictionary of all supported HTTP statuses.
 *
 * @see https://github.com/phusion/nginx/blob/master/src/http/ngx_http_special_response.c
 */
class Http
{
    // Groupings
    public const INFORMATIONAL = 'informational';
    public const SUCCESS       = 'success';
    public const REDIRECTION   = 'redirection';
    public const CLIENT_ERROR  = 'client error';
    public const SERVER_ERROR  = 'server error';

    /** @var array */
    public static $statuses = [
        /*
         * @SWG\Response(
         *     response=100,
         *     description="Continue.",
         * ),
         */
        '100' => [
            'code'             => Status::CONTINUE,
            'phrase'           => 'Continue',
            'type'             => self::INFORMATIONAL,
            'standard_message' => null,
        ],

        /*
         * @SWG\Response(
         *     response=200,
         *     description="OK.",
         * ),
         */
        '200' => [
            'code'             => Status::OK,
            'phrase'           => 'OK',
            'type'             => self::SUCCESS,
            'standard_message' => null,
        ],

        /*
         * @SWG\Response(
         *     response=201,
         *     description="Created. The resource was created synchronously.",
         * ),
         */
        '201' => [
            'code'             => Status::CREATED,
            'phrase'           => 'Created',
            'type'             => self::SUCCESS,
            'standard_message' => 'The resource was created synchronously.',
        ],

        /*
         * @SWG\Response(
         *     response=202,
         *     description="Accepted. The request was accepted and is being processed asynchronously.",
         * ),
         */
        '202' => [
            'code'             => Status::ACCEPTED,
            'phrase'           => 'Accepted',
            'type'             => self::SUCCESS,
            'standard_message' => 'The request was accepted and is being processed asynchronously.',
        ],

        /*
         * @SWG\Response(
         *     response=204,
         *     description="No Content. The resource was successfully deleted.",
         * ),
         */
        '204' => [
            'code'             => Status::NO_CONTENT,
            'phrase'           => 'No Content',
            'type'             => self::SUCCESS,
            'standard_message' => 'The resource was successfully deleted.',
        ],

        /*
         * @SWG\Response(
         *     response=206,
         *     description="Partial Content. The requested `Range` of the resource has been fulfilled.",
         * ),
         */
        '206' => [
            'code'             => Status::PARTIAL_CONTENT,
            'phrase'           => 'Partial Content',
            'type'             => self::SUCCESS,
            'standard_message' => 'The requested `Range` of the resource has been fulfilled.',
        ],

        /*
         * @SWG\Response(
         *     response=301,
         *     description="Permanent Redirect. The resource has been permanently moved.",
         * ),
         */
        '301' => [
            'code'             => Status::PERMANENT_REDIRECT,
            'phrase'           => 'Permanent Redirect',
            'type'             => self::REDIRECTION,
            'standard_message' => 'The resource has been permanently moved.',
        ],

        /*
         * @SWG\Response(
         *     response=302,
         *     description="Temporary Redirect. The resource has been temporarily moved.",
         * ),
         */
        '302' => [
            'code'             => Status::TEMPORARY_REDIRECT,
            'phrase'           => 'Temporary Redirect',
            'type'             => self::REDIRECTION,
            'standard_message' => 'The resource has been temporarily moved.',
        ],

        /*
         * @SWG\Response(
         *     response=304,
         *     description="Not Modified. The requested resource has not been modified since it was last requested.",
         * ),
         */
        '304' => [
            'code'             => Status::NOT_MODIFIED,
            'phrase'           => 'Not Modified',
            'type'             => self::REDIRECTION,
            'standard_message' => 'The requested resource has not been modified since it was last requested.',
        ],

        /*
         * @SWG\Response(
         *     response=400,
         *     description="Bad Request. Unknown client error.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '400' => [
            'code'             => Status::BAD_REQUEST,
            'phrase'           => 'Bad Request',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'Unknown client error.',
        ],

        /*
         * @SWG\Response(
         *     response=401,
         *     description="Unauthorized. You are not authorized to access this resource or perform this action.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '401' => [
            'code'             => Status::UNAUTHORIZED,
            'phrase'           => 'Unauthorized',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'You are not authorized to access this resource or perform this action.',
        ],

        /*
         * @SWG\Response(
         *     response=402,
         *     description="Payment Required. You are not subscribed to a plan which allows access to this resource.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '402' => [
            'code'             => Status::PAYMENT_REQUIRED,
            'phrase'           => 'Payment Required',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'You are not subscribed to a plan which allows access to this resource.',
        ],

        /*
         * @SWG\Response(
         *     response=403,
         *     description="Forbidden. You are forbidden from accessing this resource.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '403' => [
            'code'             => Status::FORBIDDEN,
            'phrase'           => 'Forbidden',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'You are forbidden from accessing this resource.',
        ],

        /*
         * @SWG\Response(
         *     response=404,
         *     description="Not Found. The resource that you have requested does not exist.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '404' => [
            'code'             => Status::NOT_FOUND,
            'phrase'           => 'Not Found',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The resource that you have requested does not exist.',
        ],

        /*
         * @SWG\Response(
         *     response=405,
         *     description="Method Not Allowed. The client used an HTTP method to request this resource is not supported
         *                  or not permitted.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '405' => [
            'code'             => Status::METHOD_NOT_ALLOWED,
            'phrase'           => 'Method Not Allowed',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The client used an HTTP method to request this resource is not supported or not ' .
                                  'permitted.',
        ],

        /*
         * @SWG\Response(
         *     response=406,
         *     description="Not Acceptable. The value of the `Accept` header is unsupported.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '406' => [
            'code'             => Status::NOT_ACCEPTABLE,
            'phrase'           => 'Not Acceptable',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The value of the `Accept` header is unsupported.',
        ],

        /*
         * @SWG\Response(
         *     response=409,
         *     description="Conflict. A conflict occurred while updating the resource.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '409' => [
            'code'             => Status::CONFLICT,
            'phrase'           => 'Conflict',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'A conflict occurred while updating the resource.',
        ],

        /*
         * @SWG\Response(
         *     response=410,
         *     description="Gone. The resource was available a short time ago, but is no longer available. This is a
         *                  temporary response code.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '410' => [
            'code'             => Status::GONE,
            'phrase'           => 'Gone',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The resource was available a short time ago, but is no longer available. This is ' .
                                  'a temporary response code.',
        ],

        /*
         * @SWG\Response(
         *     response=411,
         *     description="Length Required. The client did not send a valid `Content-Length` header.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '411' => [
            'code'             => Status::LENGTH_REQUIRED,
            'phrase'           => 'Length Required',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The client did not send a valid `Content-Length` header.',
        ],

        /*
         * @SWG\Response(
         *     response=414,
         *     description="URI Too Long. The URI that was requested is too long.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '414' => [
            'code'             => Status::URI_TOO_LONG,
            'phrase'           => 'URI Too Long',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The URI that was requested is too long.',
        ],

        /*
         * @SWG\Response(
         *     response=415,
         *     description="Unsupported Media Type. The client did not request a supported media type.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '415' => [
            'code'             => Status::UNSUPPORTED_MEDIA_TYPE,
            'phrase'           => 'Unsupported Media Type',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The client did not request a supported media type.',
        ],

        /*
         * @SWG\Response(
         *     response=416,
         *     description="Range Not Satisfiable. The `Range` that was requested is not satisfiable by this resource.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '416' => [
            'code'             => Status::RANGE_NOT_SATISFIABLE,
            'phrase'           => 'Range Not Satisfiable',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The `Range` that was requested is not satisfiable by this resource.',
        ],

        /*
         * @SWG\Response(
         *     response=417,
         *     description="Expectation Failed. The `Expect` header should only be used for uploads.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '417' => [
            'code'             => Status::EXPECTATION_FAILED,
            'phrase'           => 'Expectation Failed',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The `Expect` header should only be used for uploads.',
        ],

        /*
         * @SWG\Response(
         *     response=422,
         *     description="",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '422' => [
            'code'             => Status::UNPROCESSABLE_ENTITY,
            'phrase'           => 'Unprocessable Entity',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The syntax of the request was correct, but the server was unable to process the ' .
                                  'contained instructions. This can occur when input is provided as the wrong type.',
        ],

        /*
         * @SWG\Response(
         *     response=426,
         *     description="Upgrade Required. The request MUST be HTTP/1.1 or HTTP/2, and use TLS 1.2 or newer.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '426' => [
            'code'             => Status::UPGRADE_REQUIRED,
            'phrase'           => 'Upgrade Required',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The request MUST be HTTP/1.1 or HTTP/2, and use TLS 1.2 or newer.',
        ],

        /*
         * @SWG\Response(
         *     response=428,
         *     description="Precondition Required. The resource could not be updated because the `If-Match` header did
         *                  not meet expectations.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '428' => [
            'code'             => Status::PRECONDITION_REQUIRED,
            'phrase'           => 'Precondition Required',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The resource could not be updated because the `If-Match` header did not meet ' .
                                  'expectations.',
        ],

        /*
         * @SWG\Response(
         *     response=429,
         *     description="Too Many Requests. The client has been rate-limited.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '429' => [
            'code'             => Status::TOO_MANY_REQUESTS,
            'phrase'           => 'Too Many Requests',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The client has been rate-limited.',
        ],

        /*
         * @SWG\Response(
         *     response=431,
         *     description="Request Header Fields Too Large. The request header values are too large.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '431' => [
            'code'             => Status::REQUEST_FIELDS_TOO_LARGE,
            'phrase'           => 'Request Header Fields Too Large',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The request header values are too large.',
        ],

        /*
         * @SWG\Response(
         *     response=444,
         *     description="No response.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '444' => [
            'code'             => Status::NO_RESPONSE,
            'phrase'           => 'No Response',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'No response.',
        ],

        /*
         * @SWG\Response(
         *     response=451,
         *     description="Unavailable For Legal Reasons. For unspecified legal reasons, this resource is not
         *                  currently available.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '451' => [
            'code'             => Status::UNAVAILABLE_FOR_LEGAL_REASONS,
            'phrase'           => 'Unavailable For Legal Reasons',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'For unspecified legal reasons, this resource is not currently available.',
        ],

        /*
         * @SWG\Response(
         *     response=494,
         *     description="Request Header Fields Too Large. The request header values are too large.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '494' => [
            'code'             => Status::REQUEST_FIELDS_TOO_LARGE_NGINX,
            'phrase'           => 'Request Header Fields Too Large',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'The request header values are too large.',
        ],

        /*
         * @SWG\Response(
         *     response=495,
         *     description="Nginx internal code used when SSL client certificate error occurred to distinguish it
         *                  from 4XX in a log and an error page redirection.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '495' => [
            'code'             => Status::CERTIFICATE_ERROR,
            'phrase'           => 'Certificate Error',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'Nginx internal code used when SSL client certificate error occurred to ' .
                                  'distinguish it from 4XX in a log and an error page redirection.',
        ],

        /*
         * @SWG\Response(
         *     response=496,
         *     description="Nginx internal code used when client didn't provide certificate to distinguish it from 4XX
         *                  in a log and an error page redirection.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '496' => [
            'code'             => Status::NO_CERTIFICATE,
            'phrase'           => 'No Certificate',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'Nginx internal code used when client didn\'t provide certificate to distinguish ' .
                                  'it from 4XX in a log and an error page redirection.',
        ],

        /*
         * @SWG\Response(
         *     response=497,
         *     description="HTTP Request Sent to HTTPS Port. All client requests MUST be sent over HTTPS.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '497' => [
            'code'             => Status::HTTP_REQUEST_SENT_TO_HTTPS_PORT,
            'phrase'           => 'HTTP Request Sent to HTTPS Port',
            'type'             => self::CLIENT_ERROR,
            'standard_message' => 'All client requests MUST be sent over HTTPS.',
        ],

        /*
         * @SWG\Response(
         *     response=500,
         *     description="Internal Server Error. Unknown server error.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '500' => [
            'code'             => Status::INTERNAL_SERVER_ERROR,
            'phrase'           => 'Internal Server Error',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'Unknown server error.',
        ],

        /*
         * @SWG\Response(
         *     response=501,
         *     description="Not Implemented. The action you are attempting to perform has not been implemented.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '501' => [
            'code'             => Status::NOT_IMPLEMENTED,
            'phrase'           => 'Not Implemented',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'The action you are attempting to perform has not been implemented.',
        ],

        /*
         * @SWG\Response(
         *     response=502,
         *     description="The server is acting as a proxy and did not receive an acceptable response from the
         *                  upstream server.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '502' => [
            'code'             => Status::BAD_GATEWAY,
            'phrase'           => 'Bad Gateway',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'The server is acting as a proxy and did not receive an acceptable response from ' .
                                  'the upstream server.',
        ],

        /*
         * @SWG\Response(
         *     response=503,
         *     description="Service Unavailable. The service is undergoing maintenance.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '503' => [
            'code'             => Status::SERVICE_UNAVAILABLE,
            'phrase'           => 'Service Unavailable',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'The service is undergoing maintenance.',
        ],

        /*
         * @SWG\Response(
         *     response=504,
         *     description="The server is acting as a proxy and did not receive a response from the upstream server.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '504' => [
            'code'             => Status::GATEWAY_TIMEOUT,
            'phrase'           => 'Gateway Time-out',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'The server is acting as a proxy and did not receive a response from the ' .
                                  'upstream server.',
        ],

        /*
         * @SWG\Response(
         *     response=505,
         *     description="HTTP Version Not Supported. The request MUST be HTTP/1.1 or HTTP/2, and use TLS 1.2
         *                  or newer.",
         *     @SWG\Schema(
         *         ref="#/definitions/ErrorContainer"
         *     )
         * ),
         */
        '505' => [
            'code'             => Status::HTTP_VERSION_NOT_SUPPORTED,
            'phrase'           => 'HTTP Version Not Supported',
            'type'             => self::SERVER_ERROR,
            'standard_message' => 'The request MUST be HTTP/1.1 or HTTP/2, and use TLS 1.2 or newer.',
        ],
    ];

    /**
     * Get the information associated with an HTTP status code.
     *
     * @param int $code The status code to look-up.
     *
     * @return array An array of metadata about an HTTP status code.
     */
    public static function getStatus(int $code): array
    {
        if (isset(self::$statuses[(string) $code])) {
            return self::$statuses[(string) $code];
        }

        throw new Exception(sprintf('The HTTP status code `%s` is not defined.', $code));
    }
}
