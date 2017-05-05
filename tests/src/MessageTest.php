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
use Resty\JsonApiError\Message;
use PHPUnit\Framework\TestCase;

/**
 * MessageTest
 *
 * @category  JsonApiError
 * @package   JsonApiError
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2017 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php):Error
 * @link      http://www.mostofreddy.com.ar
 */
class MessageTest extends TestCase
{
    /**
     * Test append method
     * 
     * @return void
     */
    public function testAppend()
    {
        $error = (new Error())
            ->setTitle("Test");

        $message = (new Message())
            ->append($error);

        foreach ($message as $errorMessage) {
            $this->assertEquals($error, $errorMessage);
        }
    }

    /**
     * Test add method
     * 
     * @return void
     */
    public function testAdd()
    {
        $title = "Test";
        $detail = "Unit Test";
        $expected = [
            "errors" => [
                [
                    'title' => $title,
                    'details' => $detail
                ]
            ]
        ];

        $message = new Message();
        $message->add($title, $detail);

        $this->assertEquals($expected, $message->toArray());
    }

    /**
     * Test jsonSerialize method
     * 
     * @return void
     */
    public function testJsonSerialize()
    {
        $title = "Test";
        $detail = "Unit Test";
        $expected = [
            "errors" => [
                [
                    'title' => $title,
                    'details' => $detail
                ]
            ]
        ];

        $message = new Message();
        $message->add($title, $detail);

        $this->assertEquals(json_encode($expected), json_encode($message));
    }

    /**
     * Test count method
     * 
     * @return void
     */
    public function testCount()
    {
        $title = "Test";
        $detail = "Unit Test";
        $expected = [
            "errors" => [
                [
                    'title' => $title,
                    'details' => $detail
                ]
            ]
        ];

        $message = new Message();
        $message->add($title, $detail);

        $this->assertEquals(count($expected), $message->count());
    }

    /**
     * Test serialize method
     * 
     * @return void
     */
    public function testSerialize()
    {
        $title = "Test";
        $detail = "Unit Test";
        $expected = [
            "errors" => [
                [
                    'title' => $title,
                    'details' => $detail
                ]
            ]
        ];

        $message = new Message();
        $message->add($title, $detail);

        $serialization = $message->serialize();

        $message2 = new Message();
        $message2->unserialize($serialization);

        $this->assertEquals($message, $message2);
    }
}
