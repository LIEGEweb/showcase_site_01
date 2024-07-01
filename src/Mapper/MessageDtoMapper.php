<?php

namespace App\Mapper;

use App\Dto\MessageDto;
use App\Entity\Message;

class MessageDtoMapper
{

    public static function toDto(Message $message): MessageDto
    {
        return new MessageDto(
            $message->getId(),
            $message->getName(),
            $message->getPhone(),
            $message->getMessage(),
            $message->getEmail()
        );
    }

    public static function toEntity(MessageDto $dto, ?Message $message = null): Message
    {
        if (!$message) {
            $message = new Message();
        }
        $message->setName($dto->getName());
        $message->setPhone($dto->getPhone());
        $message->setMessage($dto->getMessage());
        $message->setEmail($dto->getEmail());
        return $message;
    }
}