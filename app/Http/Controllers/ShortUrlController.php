<?php
/**
 * Created by PhpStorm.
 * User: shay
 * Date: 11/6/18
 * Time: 11:12 AM
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Url;
use Illuminate\Support\Facades\Validator;

class ShortUrlController extends Controller
{
    /**
     * Serving the redirection action to the full URL
     *
     * @param Request $request
     * @param $uri
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function redirect(Request $request, $uri)
    {
        //checking if the short URI string actually exists in the DB
        $url = Url::where('short_uri', $uri)->first();

        if(empty($url)) {
            return redirect("404");
        }

        //URI exists, redirect to the full url saved in the database under this URI
        return redirect($url->full_url);
    }

    /**
     * Getting a full URL and shortening it
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function shorten(Request $request)
    {
        session_start();

        //Validation
        $validation = Validator::make($request->all(), [
            'url' => ['required', 'max:65535', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/']
        ]);

        if($validation->fails()) {
            $_SESSION['errors'] = $validation->messages()->all();
            return redirect('/');
        }

        unset($_SESSION['errors']);

        //shortening the URL and saving it to the database. Will get back the URI random string
        $uri = Url::shorten($request->get('url'));

        //building the shortened URL and saving it to a session
        $_SESSION['short_url'] = "http://" . $request->getHttpHost() . '/' . $uri;

        return redirect('/');
    }
}