<?php
namespace App\Message;


class SmsNotification
{
    public function __construct(
        private string $content,
        private int $id,
    ) {
    }

    public function getContent(): string
    {
        return $this->content;
    }
    public function getId(): string
    {
        return $this->id;
    }
}