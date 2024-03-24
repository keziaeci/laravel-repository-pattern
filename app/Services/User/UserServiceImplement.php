<?php

namespace App\Services\User;

use App\Http\Requests\PostUserRequest;
use App\Models\User;
use LaravelEasyRepository\ServiceApi;
use App\Repositories\User\UserRepository;

class UserServiceImplement extends ServiceApi implements UserService{

    /**
     * set message api for CRUD
     * @param string $title
     * @param string $create_message
     * @param string $update_message
     * @param string $delete_message
     */
     protected $title = "User";
     protected $create_message = "Created Successfuly";
     protected $update_message = "Updated Successfuly";
     protected $delete_message = "Deleted Successfuly";

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */
     protected $mainRepository;

    public function __construct(UserRepository $mainRepository)
    {
      $this->mainRepository = $mainRepository;
    }

    // Define your custom methods :)

    function all() : UserService {
      $data = $this->mainRepository->all();
      
      if (empty($data)) {
        return $this->setStatus(false)
                    ->setCode(404)
                    ->setMessage('No Users Yet!');
      }
      
      return $this->setStatus(true) 
                  ->setCode(200)
                  ->setMessage('Users Retrieved Successfully')
                  ->setResult($data);
    }

    function find($id) : UserService {
      $data = $this->mainRepository->find($id);

      if (empty($data)) {
        return $this->setStatus(false)
                    ->setCode(404)
                    ->setMessage('User not found!');
      }

      return $this->setStatus(true)
                  ->setCode(200)
                  ->setMessage('User Retrieved Successfully')
                  ->setResult($data);
    }
    function findByName(string $name) : UserService {
      try {
        $result = $this->mainRepository->findByName($name);
        
        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('User not found!');
        }

        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('User Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
          return $this->exceptionResponse($e);
      }
    }
    function findByEmail(string $email) : UserService {
      try {
        $result = $this->mainRepository->findByEmail($email);

        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('User not found!');
        }

        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('User Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
          return $this->exceptionResponse($e);
      }
    }
    function findByUsername(string $username): UserService {
      try {
        $result = $this->mainRepository->findByUsername($username);
        
        if (empty($result)) {
          return $this->setStatus(false)
                      ->setCode(404)
                      ->setMessage('User not found!');
        }

        return $this->setStatus(true)
                    ->setCode(200)
                    ->setMessage('User Retrieved Successfully')
                    ->setResult($result);
      } catch (\Exception $e) {
          return $this->exceptionResponse($e);
      }
    }

    function create($data) : UserService {
      try {
        $data['email_verified_at'] = null;
        
        $result = $this->mainRepository->create($data);
        // $token = $result->createToken('myToken');
        // $result['token'] = $token->plainTextToken;

        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('User Created Successfully')
        ->setResult($result);

      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }

    function update($id,$data) : UserService {
      try {
        $result = $this->mainRepository->update($id, $data);
  
        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('User Created Successfully')
        ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
    function delete($id) : UserService {
      try {
        $result = $this->mainRepository->delete($id);
  
        return $this->setStatus(true)
        ->setCode(200)
        ->setMessage('User Deleted Successfully')
        ->setResult($result);
      } catch (\Exception $e) {
        return $this->exceptionResponse($e);
      }
    }
}
