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
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }

        for ($index = 0; $index < 11; $index++) {
            UserAgent::dispatch($ip,$reader,$userAgent)->onQueue('parsing');
        }
    }
}

