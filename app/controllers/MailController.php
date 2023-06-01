<?php

namespace App\Controllers;

use App\Services\EmailService;
use App\Services\MailService;
use App\Services\RateService;

class MailController extends BaseController
{
    private $emailService;
    private $mailService;
    private $rateService;

    public function __construct()
    {
        $this->emailService = new EmailService();
        $this->mailService = new MailService();
        $this->rateService = new RateService();
    }

    public function sendRateEmails()
    {
        try {
            $emails = $this->emailService->getEmails();
            $rate = $this->rateService->getRateBTC();

            foreach ($emails as $email) {
                $subject = 'Rate Update';
                $body = "The current rate BTC is: {$rate} UAH";

                $this->mailService->sendEmail($email, $subject, $body);
            }

            $this->jsonResponse(['success' => true, 'message' => 'Current rate has been sent to subscribers']);
        } catch (\Exception $e) {
            error_log($e->getMessage());

            $this->jsonResponse(['success' => false], 500);
        }
    }
}