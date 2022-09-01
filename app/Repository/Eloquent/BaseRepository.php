<?php

namespace App\Repository\Eloquent;

use App\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    function findById($id, array $columns = ['*'])
    {
        return $this->model->select($columns)->findOrFail($id);
    }

    function findByEncryptedId($id, array $columns = ['*'])
    {
        return $this->model->select($columns)->findOrFail(decrypt($id));
    }

    function findByEmail($email, array $columns = ['*'])
    {
        return $this->model->select($columns)->where('email', $email)->first();
    }
}
