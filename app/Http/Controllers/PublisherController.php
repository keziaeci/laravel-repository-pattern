<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StorePublisherRequest;
use App\Services\Publisher\PublisherService;
use App\Http\Requests\UpdatePublisherRequest;

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
        return Cache::remember('publishers', 60 , function () {
            return $this->publisherService->all()->toJson();
        });
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
