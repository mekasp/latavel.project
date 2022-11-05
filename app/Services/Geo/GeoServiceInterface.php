<?php

namespace App\Services\Geo;

interface GeoServiceInterface
{
    public function getIsoCode(): ?string;

    public function getCountry(): ?string;

    public function parse(string $ip): void;
}

