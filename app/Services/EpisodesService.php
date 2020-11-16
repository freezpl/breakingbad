<?php

namespace App\Services;

use App\Models\Character;
use App\Models\DTO\ResponseDTO;
use App\Models\Episode;
use App\Services\Contracts\IEpisodesService;
use App\Services\Helpers\QueryHelper;
use Exception;

class EpisodesService extends BaseService implements IEpisodesService
{
    public function list($page = 0, $limit = 0) : ResponseDTO
    {   
        try {
            $query = Character::query();
            $query = QueryHelper::paged($query, $this->response, $page, $limit);
            $this->response->data  = $query->get();
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }

    public function getById($id) : ResponseDTO
    {   
        try {
            $this->response->data = Episode::where('id', $id)->with(['characters', 'characters.quotes' => 
            function($query) use ($id) {
                $query->where('id', $id);
            }, 'quotes'])->get();
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }
}