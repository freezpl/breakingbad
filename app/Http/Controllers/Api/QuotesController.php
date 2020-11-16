<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use App\Services\Contracts\ICharactersService;
use App\Services\Contracts\IEpisodesService;
use App\Services\Contracts\IQuotesService;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    protected $quotes;
    protected $characters;

    public function __construct(IQuotesService $quotes, ICharactersService $characters)
    {
        $this->quotes = $quotes;
        $this->characters = $characters;
    }

    public function list(Request $request){
        $page = $request->has('page') ? $request->get('page') : config('app_settings.pagination.page');
        $limit = $request->has('limit') ? $request->get('limit') : config('app_settings.pagination.limit');
        $response = $this->quotes->list($page, $limit);    
        return response()->json($response, $response->status);
    }

    public function randomQuoteByAuthorName(Request $request){
        $name = $request->has('author') ? $request->get('author') : config('app_settings.pagination.page');
        $response = $this->characters->getByName($name);
        
        if($response->success && $response->data->count() > 0)
            $response = $this->quotes->randomQuoteByAuthor($response->data[0]);

        return response()->json($response, $response->status);
    }
}
