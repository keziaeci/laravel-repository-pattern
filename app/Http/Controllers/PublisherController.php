<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use App\Services\Publisher\PublisherService;
use Illuminate\Http\JsonResponse;

class PublisherController extends Controller
{
    protected $publisherService;
    public function __construct(PublisherService $publisherService) {
        $this->publisherService = $publisherService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index() : JsonResponse
    {
        return $this->publisherService->all()->toJson();
    }

    function findName($name) : JsonResponse {
        return $this->publisherService->findByName($name)->toJson();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        return $this->publisherService->create($request->validated())->toJson();
    }
    
}
