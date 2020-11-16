<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\Contracts\ICharactersService;
use App\Services\Contracts\IEpisodesService;
use Illuminate\Http\Request;

class CharactersController extends Controller
{
    protected $characters;

    public function __construct(ICharactersService $characters)
    {
        $this->characters = $characters;
    }

    public function list(Request $request){

        if($request->has('name'))
            $response = $this->characters->getByName($request->get('name'));    
        else{
            $page = $request->has('page') ? $request->get('page') : config('app_settings.pagination.page');
            $limit = $request->has('limit') ? $request->get('limit') : config('app_settings.pagination.limit');
            $response = $this->characters->list($page, $limit);    
        }
        return response()->json($response, $response->status);
    }

    public function random(){
        $response = $this->characters->random();    
        return response()->json($response, $response->status);
    }
}
