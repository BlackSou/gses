<?php

namespace App\Services;

class EmailService
{
    private $emailsFile = __DIR__ . '/../../data/emails.json';

    public function subscribeEmail($email)
    {
        $emails = $this->getEmails();
        if (in_array($email, $emails, true)) {
            return false;
        }

        $emails[] = $email;
        $this->saveEmails($emails);
    }

    public function getEmails()
    {
        if (!file_exists($this->emailsFile)) {
            return [];
        }

        $emails = file_get_contents($this->emailsFile);
        $emails = json_decode($emails, true);

        return is_array($emails) ? $emails : [];
    }

    private function saveEmails($emails)
    {
        file_put_contents($this->emailsFile, json_encode($emails));
    }
}