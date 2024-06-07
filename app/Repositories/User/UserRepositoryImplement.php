<?php

namespace App\Repositories\User;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\User;

class UserRepositoryImplement extends Eloquent implements UserRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)

    function all() {
        return $this->model->all();
    }

    function find($id) : ?User {
        return $this->model->find($id);
    }

    function findByName(string $name): ?User {
        return $this->model->where('name' , 'LIKE' , "%$name%")->first();
    }

    function findByEmail(string $email): ?User {
        return $this->model->where('email', 'LIKE' ,  "%$email%")->first();
    }

    function findByUsername(string $username): ?User {
        return $this->model->where('username', 'LIKE' , "%$username%")->first();
    }

    function create($data) : User {
        return $this->model->create($data);
    }
    
    function update($id , $data) : User {
        // return $this->model->findOrFail($id)->update($data);
        // return $this->update($id,$data);
        $user = tap($this->model->findOrFail($id))->update($data);
        return $user;
        // $user = tap($this->model)->update($data);
        // return $this->model->tap($this->model)->update($id,$data);
    }

    function delete($id) {
        return $this->model->destroy($id);
        // delete() wont work
        // return $this->model->delete($id);
    }
}
