<?php

namespace App\Services\Game;

use App\Services\Game\GameService;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\Game\GameRepository;

class GameServiceImplement extends ServiceApi implements GameService{

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

    public function __construct(GameRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    function all() : GameService {
      $result = $this->mainRepository->all();

      if ($result->isEmpty()) {
        return $this->setStatus(false)
                    ->setCode(404)
                    ->setMessage('No Games Yet!');
      }
      
      return $this->setStatus(true) 
                  ->setCode(200)
                  ->setMessage('Games Retrieved Successfully')
                  ->setResult($result);
    }

    function findByTitle(string $title): GameService {
      try {
        $result = $this->mainRepository->findByTitle($title);
  
        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('Game not found!');
        }
  
        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('Game Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
    function findByGenre(string $genre): GameService {
      try {
        $result = $this->mainRepository->findByGenre($genre);
  
        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('Game not found!');
        }
  
        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('Game Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }

    function create($data) : GameService {
      try {
        $result = $this->mainRepository->create($data);

        return $this->setStatus(true)
        ->setCode(201)
        ->setMessage('Game Created Successfully')
        ->setResult($result);

      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }

    function update($id, $data) : GameService {
      try {
        $result = $this->mainRepository->update($id, $data);
        // dd($data);
        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('Game Updated Successfully')
        ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }

    function delete($id) : GameService {
      try {
        $this->mainRepository->delete($id);

        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('Game Deleted Successfully');
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
}
