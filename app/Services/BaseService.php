<?php

namespace App\Services;

use App\Models\DTO\ResponseDTO;

class BaseService
{
    protected $response;

    public function __construct()
    {
        $this->response = new ResponseDTO();
        $this->response->success = true;
        $this->response->status = 200;
    }
}