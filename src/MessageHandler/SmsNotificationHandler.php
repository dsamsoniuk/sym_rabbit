<?php
namespace App\MessageHandler;

use App\Message\SmsNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __invoke(SmsNotification $message)
    {
        sleep(5);
        echo 'wiadomosc' . $message->getContent();

        // ... do some work - like sending an SMS message!
    }
}