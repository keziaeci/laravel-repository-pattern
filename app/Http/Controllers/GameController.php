<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Services\Game\GameService;
use Illuminate\Http\JsonResponse;

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
        return $this->gameService->all()->toJson();
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
    public function store(StoreGameRequest $request) : JsonResponse
    {
        return $this->gameService->create($request->validated())->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
