<?php

namespace App\Entity;

use DateTime;

class Message{
    
    private $id;
    private $content;
    private $createdAt;
    private $author; 

    public function __construct()
    {
        $this->createdAt = new DateTime("now", new \DateTimeZone("Europe/Paris"));
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function setContent(string $content) : self
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt) : self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getAuthor() : string
    {
        return $this->author;
    }

    public function setAuthor(string $author) : self
    {
        $this->author = $author;
        return $this;
    }
}