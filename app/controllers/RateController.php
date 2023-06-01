<?php

namespace App\Controllers;

use App\Services\RateService;

class RateController extends BaseController
{
    private $rateService;

    public function __construct()
    {
        $this->rateService = new RateService();
    }

    public function getCurrentRate()
    {
        try {
            $rate = $this->rateService->getRateBTC();
            $this->jsonResponse(['success' => true, 'rate' => $rate]);
        } catch (\Exception $e) {
            error_log($e->getMessage());
            $this->jsonResponse(['success' => false], 500);
        }
    }
}