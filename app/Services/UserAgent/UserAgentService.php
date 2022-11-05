<?php

namespace App\Services\UserAgent;

use donatj\UserAgent\UserAgentParser;

class UserAgentService implements UserAgentInterface
{
    protected $_data;

    public function __construct()
    {
        $this->_data = new UserAgentParser();
        $this->_data = $this->_data->parse();
    }

    public function getBrowser(): ?string
    {
        return $this->_data->browser() ?? null;
    }

    public function getSystem(): ?string
    {
        return $this->_data->platform() ?? null;
    }
}

