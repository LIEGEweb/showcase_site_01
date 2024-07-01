<?php

namespace App\Dto;


use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;

class MessageDto
{
    private $id;

    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $name;
    #[Assert\NotBlank]
    private ?string $phone;
    #[Assert\NotBlank]
    private ?string $message;
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MessageDto
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): MessageDto
    {
        $this->name = $name;
        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): MessageDto
    {
        $this->phone = $phone;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): MessageDto
    {
        $this->message = $message;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): MessageDto
    {
        $this->email = $email;
        return $this;
    }

}