<?php

namespace App\Services;

class RateService
{
    public function getRateBTC()
    {
        $url = 'https://api.coinbase.com/v2/prices/BTC-UAH/spot';
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['data']['amount'])) {
            return ceil($data['data']['amount']);
        }
    }
}