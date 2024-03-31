<?php

namespace App\Services\Publisher;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Publisher\PublisherRepository;

class PublisherServiceImplement extends ServiceApi implements PublisherService{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     */
     protected $title = "";
     protected $create_message = "";
     protected $update_message = "";
     protected $delete_message = "";

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(PublisherRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    function all() : PublisherService {
      $result = $this->mainRepository->all();

      if ($result->isEmpty()) {
        return $this->setStatus(false)
        ->setCode(404)
        ->setMessage('No Publishers Yet!');
      }

      return $this->setStatus(true) 
      ->setCode(200)
      ->setMessage('Publishers Retrieved Successfully')
      ->setResult($result);
    }

    function findByName(string $name): PublisherService {
      try {
        $result = $this->mainRepository->findByName($name);
        
        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('Publisher not found!');
        }

        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('Publisher Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
          return $this->exceptionResponse($e);
      }
    }
    
    function create($data) : PublisherService {
      try {
        $result = $this->mainRepository->create($data);

        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('Publisher Created Successfully')
        ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }

}
