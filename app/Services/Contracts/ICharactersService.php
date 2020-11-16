<?php

namespace App\Services\Contracts;

use App\Models\DTO\ResponseDTO;

interface ICharactersService {
    public function list($page = 0, $limit = 0) : ResponseDTO;
    public function getByName($name) : ResponseDTO;
    public function random() : ResponseDTO;
}