<?php
/**
 * Created by PhpStorm.
 * User: shay
 * Date: 11/6/18
 * Time: 1:38 PM
 */

namespace App\lib;

class Randomizer
{
    public static function make($length = 7)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}