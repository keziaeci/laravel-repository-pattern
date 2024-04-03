<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Services\Game\GameService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class GameController extends Controller
{
    protected $gameService;

    public function __construct(GameService $gameService) {
        $this->gameService = $gameService;
    }

    
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return Cache::remember('games', 60 , function () {
            return $this->gameService->all()->toJson();
        });
    }

    function findTitle($title) : JsonResponse {
        return $this->gameService->findByTitle($title)->toJson();   
    }

    function findGenre($genre) : JsonResponse {
        return $this->gameService->findByGenre($genre)->toJson();   
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request) : JsonResponse {
        return $this->gameService->create($request->validated())->toJson();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, $id) : JsonResponse
    {
        return $this->gameService->update($id, $request->validated())->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        
    }
}
