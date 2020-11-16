<?php

namespace App\Services\Contracts;

use App\Models\DTO\ResponseDTO;

interface IQuotesService {
    public function list($page = 0, $limit = 0) : ResponseDTO;
    public function randomQuoteByAuthor($author) : ResponseDTO;
}