<?php

namespace App\Jobs;

use App\Models\Visit;
use App\Services\Geo\GeoServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mekas\UserAgent\Int\Test\UserAgentInterface;


class UserAgent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $ip;
    public $reader;
    public $userAgent;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $ip,$reader,$userAgent)
    {
        $this->ip = $ip;
        $this->reader = $reader;
        $this->userAgent = $userAgent;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->reader->parse($this->ip);
        $isoCode = $this->reader->getIsoCode();
        $country = $this->reader->getCountry();
        $browser = $this->userAgent->getBrowser();
        $system = $this->userAgent->getSystem();

        if (!empty($isoCode) && !empty($country)) {
            Visit::create([
                'ip' => $this->ip,
                'country_code' => $country,
                'continent_code' => $isoCode,
                'browser' => $browser,
                'system' => $system
            ]);
        }
    }
}
