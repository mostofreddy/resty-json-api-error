<?php
/**
 * Message
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

use Resty\JsonApiError\Error;
/**
 * Message
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php): Error
 * @link      http://www.mostofreddy.com.ar
 * @abstract
 */
class Message implements \Serializable, \Iterator, \Countable, \JsonSerializable
{
    protected $errors = [];

    /**
     * Append error
     *
     * @param Error $error Error object
     * 
     * @return Message
     */
    public function append(Error $error):Message
    {
        $this->errors[] = $error;
        return $this;
    }
    /**
     * [add description]
     * 
     * @param string $title  A short, human-readable summary of the problem
     * @param string $detail A human-readable explanation specific to this occurrence of the problem. Default: ''
     *
     * @return Error
     */
    public function add(string $title, string $detail = ''):Error
    {
        $err = (new Error())
            ->setTitle($title)
            ->setDetails($detail);

        $this->errors[] = $err;
        return $err;
    }

    /**********************************************************************************
     * Implement JsonSerializable interface
     *********************************************************************************/

    /**
     * Transform collection errors to array
     * 
     * @return array
     */
    public function toArray():array
    {
        return [
            "errors" => array_map(
                function ($el) {
                    return $el->toArray();
                },
                $this->errors
            )
        ];
    }
    /**
     * Serializa a Json el objeto
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**********************************************************************************
     * Implement Countable interface
     *********************************************************************************/

    /**
     * Return error count
     * 
     * @return int
     */
    public function count()
    {
        return count($this->errors);
    }
    

    /**********************************************************************************
     * Implement Iterator interface
     *********************************************************************************/

    /**
     * Return current element
     *
     * @return \Resty\JsonApiError\Error
     */
    public function current()
    {
        return current($this->errors);
    }
    /**
     * Return current key
     * 
     * @return int
     */
    public function key()
    {
        return key($this->errors);
    }
    /**
     * Next element
     * 
     * @return void
     */
    public function next()
    {
        next($this->errors);
    }
    /**
     * Reset errors position
     * 
     * @return void
     */
    public function rewind()
    {
        reset($this->errors);
    }
    /**
     * Is valid current element
     * 
     * @return boolean
     */
    public function valid()
    {
        return isset($this->errors[$this->key()]);
    }

    /**********************************************************************************
     * Implement Serializable interface
     *********************************************************************************/

    /**
     * Error serialization
     * 
     * @return string
     */
    public function serialize()
    {
        return serialize($this->errors);
    }
    /**
     * Error unserialization
     * 
     * @param string $errors Error
     * 
     * @return self
     */
    public function unserialize($errors)
    {
        $this->errors = unserialize($errors);
        return $this;
    }
}
