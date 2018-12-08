<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zarinpal\Laravel\Facade\Zarinpal;


class ZarrinController extends Controller
{
    public function pay()
    {

        $results = Zarinpal::request(
            route('index'),          //required
            1000,                                  //required
            'testing',                             //required
            'me@example.com',                      //optional
            '09000000000'                       //optional

        );
// save $results['Authority'] for verifying step
        Zarinpal::redirect(); // redirect user to zarinpal

// after that verify transaction by that $results['Authority']
        Zarinpal::verify('OK',1000,$results['Authority']);
    }
}
