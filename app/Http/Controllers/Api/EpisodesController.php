<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\Contracts\IEpisodesService;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    protected $episodes;

    public function __construct(IEpisodesService $episodes)
    {
        $this->episodes = $episodes;
    }

    public function list(Request $request){
        $page = $request->has('page') ? $request->get('page') : config('app_settings.pagination.page');
        $limit = $request->has('limit') ? $request->get('limit') : config('app_settings.pagination.limit');
        $response = $this->episodes->list($page, $limit);    
        return response()->json($response, $response->status);
    }

    public function getById($id){
        $response = $this->episodes->getById($id);    
        return response()->json($response, $response->status);
    }
}
