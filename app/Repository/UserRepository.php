<?php

namespace App\Repository;


use App\User;

class UserRepository
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function all()
    {
        return $this->model->paginate(4);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $user = $this->model->find($id)->fill($data);
        $user->save();

        return $user;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}