<?php

namespace App\Services\Helpers;

use App\Models\DTO\ResponseDTO;

class QueryHelper
{
    public static function paged($query, $responce, $page, $limit)
    {
        $responce->pagination->total = $query->count();
        if($responce->pagination->total == 0)
            return $query;

        if($page > 0)
        {
            $query = $query->offset($page * $limit);
            $responce->pagination->currentPage = $page;
        }
        
        if($limit > 0)
        {
            $query = $query->take($limit);
            $responce->pagination->perPage = $limit;
            $responce->pagination->totalPages = ceil($responce->pagination->total/$responce->pagination->perPage);
        }

        return $query;
    }
}