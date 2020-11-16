<?php

namespace App\Services;

use App\Models\Character;
use App\Models\DTO\ResponseDTO;
use App\Services\Contracts\ICharactersService;
use App\Services\Helpers\QueryHelper;
use Exception;

class CharactersService extends BaseService implements ICharactersService
{
    public function list($page = 0, $limit = 0) : ResponseDTO
    {   
        try {
            $query = Character::query();

            $query = QueryHelper::paged($query, $this->response, $page, $limit);
            
            $query = $query->with(['episodes' => function($q){
                return $q->get(['id']);
            } ], ['quotes' => function($q){
                return $q->get(['id']);
            } ]  );
            $this->response->data  = $query->get();

        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }

    public function getByName($name) : ResponseDTO
    {   
        try {
            $this->response->data = Character::where('name','LIKE','%'.$name.'%')
                    ->with(['episodes', 'quotes'])->get();
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }

    public function random() : ResponseDTO
    {   
        try {
            $this->response->data = Character::with(['episodes', 'quotes'])->inRandomOrder()->limit(1)->get();
        } catch (Exception $e) {
            $this->response->success = false;
            $this->response->status = 400;
            $this->response->error->message = $e->getMessage();
        }
        return $this->response;
    }
}