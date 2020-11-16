<?php

namespace App\Models\DTO;

class ResponseDTO
{
    public $success;
    public $status;
    public $data;
    public $pagination;
    public $error;

    function __construct()
    {
        $this->pagination = new PaginationDTO();
        $this->error = new ErrorDTO();
    }


}