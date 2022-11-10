<?php

namespace App\Http\Controllers\Admin;

use App\Models\Visit;
use App\Services\Geo\GeoServiceInterface;
use Mekas\UserAgent\Int\Test\UserAgentInterface;

class GeoIpController
{
    public function index(GeoServiceInterface $reader,UserAgentInterface $userAgent)
    {
        $ip = request()->ip();
        if ($ip == '127.0.0.1') {
            $ip = request()->server->get('HTTP_X_FORWARDED_FOR');
        }

        $ip = '98.76.188.248';

        $reader->parse($ip);
        $isoCode = $reader->getIsoCode();
        $country = $reader->getCountry();
        $browser = $userAgent->getBrowser();
        $system = $userAgent->getSystem();

        if (!empty($isoCode) && !empty($country)) {
            Visit::create([
                'ip' => $ip,
                'country_code' => $country,
                'continent_code' => $isoCode,
                'browser' => $browser,
                'system' => $system
            ]);
        }
    }
}

