<?php
/**
 * Created by PhpStorm.
 * User: shay
 * Date: 11/6/18
 * Time: 11:59 AM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\lib\Randomizer;

class Url extends Model
{
    protected $table = 'urls';

    protected $fillable = [
        'full_url',
        'short_uri'
    ];

    public static function shorten($url)
    {
        $checkExists = Url::where('full_url', $url)->first();

        if( ! empty($checkExists)) {
            return $checkExists->short_uri;
        }

        $randomString = Randomizer::make();

        $newUrl = new Url();
        $newUrl->full_url = $url;
        $newUrl->short_uri = $randomString;
        $newUrl->save();

        return $randomString;
    }
}