<?php
/**
 * Created by PhpStorm.
 * User: shay
 * Date: 11/6/18
 * Time: 2:33 PM
 */

class UrlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShortUrlString()
    {
        $url = 'https://google.com';
        $short_url_string = \App\Url::shorten($url);

        $this->assertNotEmpty($short_url_string);
        $this->assertTrue(is_string($short_url_string));
    }
}