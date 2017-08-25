<?php
/**
 * Error
 *
 * PHP version 7+
 *
 * Copyright (c):Error 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php):Error
 * @link      http://www.mostofreddy.com.ar
 */
namespace Resty\JsonApiError;

/**
 * Error
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php):Error
 * @link      http://www.mostofreddy.com.ar
 * @abstract
 */
class Error
{
    protected $data = [];
    /**
     * Transform object to array
     * 
     * @return array
     */
    public function toArray():array
    {
        return $this->data;
    }
    /**
     * A unique identifier for this particular occurrence of the problem
     *
     * @param int $id Unique identifier
     * 
     * @return self
     */
    public function setId(int $id):Error
    {
        $this->data['id'] = $id;
        return $this;
    }

    /**
     * A links object containing the following members:
     *
     * @param string $link   Url link
     * @param string $key    Name. Default: self
     * @param string $method Http method. Default: GET
     *  
     * @return self
     */
    public function setLink(string $link, string $key = 'self', string $method = 'GET'):Error
    {
        if (!isset($this->data['links'])) {
            $this->data['links'] = [];
        }
        $this->data['links'][$key] = [
            'link' => $link,
            'method' => strtoupper($method)
        ];
        return $this;
    }

    /**
     * The HTTP status code applicable to this problem
     *
     * @param int $status HTTP status
     *
     * @return self
     */
    public function setStatus(int $status):Error
    {
        $this->data['status'] = $status;
        return $this;
    }

    /**
     * An application-specific error code
     *
     * @param string|integer $code Error code
     * 
     * @return self
     */
    public function setCode($code):Error
    {
        $this->data['code'] = $code;
        return $this;
    }

    /**
     * A short, human-readable summary of the problem
     *
     * @param string $title Title
     * 
     * @return self
     */
    public function setTitle(string $title):Error
    {
        $this->data['title'] = $title;
        return $this;
    }

    /**
     * A human-readable explanation specific to this occurrence of the problem
     *
     * @param mixed $detail Problem detail
     * 
     * @return self
     */
    public function setDetails($detail):Error
    {
        $this->data['details'] = $detail;
        return $this;
    }

    /**
     * An object containing references to the source of the error
     *
     * @param array $source References to the source
     * 
     * @return self
     */
    public function setSource(array $source):Error
    {
        $this->data['source'] = $source;
        return $this;
    }

    /**
     * A meta object containing non-standard meta-information about the error
     *
     * @param array $meta Meta info
     * 
     * @return self
     */
    public function setMeta(array $meta):Error
    {
        $this->data['meta'] = $meta;
        return $this;
    }

    public function set($key, $value):Error
    {
        $this->data[$key] = $value;
        return $this;
    }
}
