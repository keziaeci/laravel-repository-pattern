<?php

namespace App\Services\Genre;

use LaravelEasyRepository\ServiceApi;
use App\Repositories\Genre\GenreRepository;
use App\Services\User\UserService;

class GenreServiceImplement extends ServiceApi implements GenreService{

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

    public function __construct(GenreRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    function all() : GenreService {
      $result = $this->mainRepository->all();
      
      if ($result->isEmpty()) {
        return $this->setStatus(false)
                    ->setCode(404)
                    ->setMessage('No Users Yet!');
      }
      
      return $this->setStatus(true) 
                  ->setCode(200)
                  ->setMessage('Users Retrieved Successfully')
                  ->setResult($result);
    }

    function create($data) : GenreService {
      try {
        $result = $this->mainRepository->create($data);

        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('Genre Created Successfully')
        ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
    
} 
