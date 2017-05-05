<?php
/**
 * ErrorMessage
 *
 * PHP version 7+
 *
 * Copyright (c): Error 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php): Error
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\JsonApiError;

use Resty\JsonApiError\Message;
/**
 * ErrorMessage
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php): Error
 * @link      http://www.mostofreddy.com.ar
 * @abstract
 */
class ErrorMessage
{
    /**
     * Error
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * @param int    $status  The HTTP status code applicable to this problem
     * 
     * @return Message
     */
    protected static function error(string $title, string $details, $code='', int $status = 500):Message
    {
        $message = new Message();
        $message->add($title, $details)
            ->setCode($code)
            ->setStatus(500);
        return $message;
    }

    /**
     * Not found
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * 
     * @return Message
     */
    public static function notFound(string $title, string $details, $code=''):Message
    {
        return static::error($title, $details, $code, 404);
    }

    /**
     * Bad request
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * 
     * @return Message
     */
    public static function badRequest(string $title, string $details, $code=''):Message
    {
        return static::error($title, $details, $code, 400);
    }

    /**
     * Unauthorized
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * 
     * @return Message
     */
    public static function unauthorized(string $title, string $details, $code=''):Message
    {
        return static::error($title, $details, $code, 401);
    }

    /**
     * Forbidden
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * 
     * @return Message
     */
    public static function forbidden(string $title, string $details, $code=''):Message
    {
        return static::error($title, $details, $code, 403);
    }

    /**
     * Method not allowed
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * 
     * @return Message
     */
    public static function methodNotAllowed(string $title, string $details, $code=''):Message
    {
        return static::error($title, $details, $code, 405);
    }

    /**
     * Server error
     * 
     * @param string $title   A short, human-readable summary of the problem
     * @param string $details A human-readable explanation specific to this occurrence of the problem.
     * @param int    $code    An application-specific error code
     * @param int    $status  The HTTP status code applicable to this problem
     * 
     * @return Message
     */
    public static function internal(string $title, string $details, $code='', int $status = 500):Message
    {
        return static::error($title, $details, $code, $status);
    }
}
