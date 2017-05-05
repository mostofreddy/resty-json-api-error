<?php
/**
 * ErrorTest
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
namespace Resty\JsonApiError\Test;

use Resty\JsonApiError\Error;
use PHPUnit\Framework\TestCase;

/**
 * ErrorTest
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php):Error
 * @link      http://www.mostofreddy.com.ar
 */
class ErrorTest extends TestCase
{
    /**
     * Test setId method
     * 
     * @return void
     */
    public function testSetId()
    {
        $id = 1234;
        $expected = ['id' => $id];

        $error = (new Error())
            ->setId($id);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setLink method
     * 
     * @return void
     */
    public function testSetLink()
    {
        $key = 'other';
        $link = 'www.google.com.ar';
        $method = 'post';
        $expected = [
            'links' => [
                $key => [
                    'link' => $link,
                    'method' => strtoupper($method)
                ]
            ]
        ];
        $error = (new Error())
            ->setLink($link, $key, $method);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setLink method
     * 
     * @return void
     */
    public function testSetLinkMultiple()
    {
        $links = [
            [
                'key' => 'other',
                'link' => 'www.google.com.ar',
                'method' => 'post'
            ],
            [
                'link' => 'www.other.com' 
            ]
        ];
        $expected = [
            'links' => [
                $links[0]['key'] => [
                    'link' => $links[0]['link'],
                    'method' => strtoupper($links[0]['method'])
                ],
                'self' => [
                    'link' => $links[1]['link'],
                    'method' => 'GET'
                ]
            ]
        ];
        $error = (new Error())
            ->setLink($links[0]['link'], $links[0]['key'], $links[0]['method'])
            ->setLink($links[1]['link']);

        $this->assertEquals($expected, $error->toArray());
    }

     /**
     * Test setStatus method
     * 
     * @return void
     */
    public function testSetStatus()
    {
        $status = 200;
        $expected = ['status' => $status];

        $error = (new Error())
            ->setStatus($status);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setCode method
     * 
     * @return void
     */
    public function testSetCode()
    {
        $code = 1234;
        $expected = ['code' => $code];

        $error = (new Error())
            ->setCode($code);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setTitle method
     * 
     * @return void
     */
    public function testSetTitle()
    {
        $title = 'Title error';
        $expected = ['title' => $title];

        $error = (new Error())
            ->setTitle($title);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setDetails method
     * 
     * @return void
     */
    public function testSetDetails()
    {
        $details = 'Details error';
        $expected = ['details' => $details];

        $error = (new Error())
            ->setDetails($details);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setSource method
     * 
     * @return void
     */
    public function testSetSource()
    {
        $source = ['line' => '000', 'file' => '...'];
        $expected = ['source' => $source];

        $error = (new Error())
            ->setSource($source);

        $this->assertEquals($expected, $error->toArray());
    }

    /**
     * Test setMeta method
     * 
     * @return void
     */
    public function testSetMeta()
    {
        $meta = ['line' => '000', 'file' => '...'];
        $expected = ['meta' => $meta];

        $error = (new Error())
            ->setMeta($meta);

        $this->assertEquals($expected, $error->toArray());
    }

     /**
     * Test multiple set values
     * 
     * @return void
     */
    public function testMultiple()
    {
        $code = 1234;
        $status = 500;
        $expected = [
            'code' => $code,
            'status' => $status
        ];

        $error = (new Error())
            ->setCode($code)
            ->setStatus($status);

        $this->assertEquals($expected, $error->toArray());
    }
}
