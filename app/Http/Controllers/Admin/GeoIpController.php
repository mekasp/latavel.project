<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\UserAgent;
use App\Mail\WelcomeMail;
use App\Models\Visit;
use App\Services\Geo\GeoServiceInterface;
use Illuminate\Support\Facades\Mail;
use Mekas\UserAgent\Int\Test\UserAgentInterface;

class GeoIpController
{
    public function index(GeoServiceInterface $reader,UserAgentInterface $userAgent)
    {

        $ip = request()->ip();
        $userAgent = request()->userAgent();

        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }


        UserAgent::dispatch($ip,$userAgent)->onQueue('parsing');

    }
}

