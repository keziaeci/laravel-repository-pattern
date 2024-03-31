<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostGenreRequest;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Models\Genre;
use App\Services\Genre\GenreService;
use Illuminate\Http\JsonResponse;

class GenreController extends Controller
{
    protected $genreService;

    public function __construct(GenreService $genreService) {
        $this->genreService = $genreService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return $this->genreService->all()->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenreRequest $request)
    {
        return $this->genreService->create($request->validated())->toJson();
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenreRequest $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        //
    }
}
