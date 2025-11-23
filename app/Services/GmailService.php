<?php

namespace App\Services;

use Google\Client;
use Google\Service\Gmail;
use Google\Service\Gmail\Message;

class GmailService
{
    protected $client;
    protected $gmail;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setApplicationName('Stokki-Life');
        $this->client->setScopes(Gmail::GMAIL_SEND);
        $this->client->setAuthConfig(storage_path('app/google/credentials.json'));
        $this->client->setAccessType('offline');

        $this->gmail = new Gmail($this->client);
    }

    /**
     * Envia email usando Gmail API
     */
    public function sendEmail($to, $subject, $body, $from = 'me')
    {
        $rawMessageString = "To: $to\r\n";
        $rawMessageString .= "Subject: $subject\r\n";
        $rawMessageString .= "MIME-Version: 1.0\r\n";
        $rawMessageString .= "Content-Type: text/html; charset=utf-8\r\n\r\n";
        $rawMessageString .= $body;

        $rawMessage = base64_encode($rawMessageString);
        $rawMessage = str_replace(['+', '/', '='], ['-', '_', ''], $rawMessage);

        $message = new Message();
        $message->setRaw($rawMessage);

        return $this->gmail->users_messages->send($from, $message);
    }
}
