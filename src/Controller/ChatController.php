<?php

namespace App\Controller;

use App\QueryBuilder;
use App\Repository\AbstractRepository;

final class ChatController extends AbstractRepository {
    
    public function getMessages() : array
    {
        return $this->findAll();
    }
}