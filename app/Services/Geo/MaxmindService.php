<?php


namespace App\Services\Geo;

use GeoIp2\Database\Reader;
use GeoIp2\Model\Country;
use GeoIp2\Exception\AddressNotFoundException;

class MaxmindService implements GeoServiceInterface
{
    /** @var Reader */
    protected $_reader;
    /** @var Country */
    protected $_data;

    public function __construct()
    {
         $this->_reader = new Reader(
            base_path() . DIRECTORY_SEPARATOR .
            //'database' . DIRECTORY_SEPARATOR . 'geoip' . DIRECTORY_SEPARATOR . 'GeoLite2-City.mmdb'
            'database' . DIRECTORY_SEPARATOR . 'geoip' . DIRECTORY_SEPARATOR . 'GeoLite2-Country.mmdb'
         );
    }

    /**
     * @param string $ip
     * @return void
     */
    public function parse(string $ip): void
    {
        try {
            $this->_data = $this->_reader->country($ip);
        } catch (AddressNotFoundException $exception){
            //Log error
        }
    }

    /**
     * @return string|null
     */
    public function getIsoCode(): ?string
    {
        return $this->_data->continent->code ?? null;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->_data->country->isoCode ?? null;
    }
}

