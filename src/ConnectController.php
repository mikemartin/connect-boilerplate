<?php

namespace Mikemartin\Connect;

use Illuminate\Http\Request;
use Statamic\Http\Controllers\CP\CpController;
use Socialite;

class ConnectController extends CpController
{
    public function index() {

        $data = [
            'title' => __('Connect account'),
            'providers' => OAuth::providers(), /* TODO: Add OAuth Facade */
        ];

        return view('connect::index',$data);
    }
}