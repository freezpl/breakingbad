<?php

namespace App\Services;

use App\Models\DTO\ResponseDTO;
use App\Models\Quote;
use App\Services\Contracts\IQuotesService;
use App\Services\Helpers\QueryHelper;
use Exception;

class QuotesService extends BaseService implements IQuotesService
{
    public function list($page = 0, $limit = 0) : ResponseDTO
    {   
        try {
            $query = Quote::query();
            $query = QueryHelper::paged($query, $this->response, $page, $limit);
            $this->response->data  = $query->get();
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }

    public function randomQuoteByAuthor($author) : ResponseDTO
    {   
        try {
            $this->response->data = $author->quotes->random(1);
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }
}