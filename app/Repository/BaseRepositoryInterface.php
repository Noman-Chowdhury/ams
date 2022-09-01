<?php

namespace App\Repository;

interface BaseRepositoryInterface
{
    public function findById($id, array $columns = ['*']);

    public function findByEncryptedId($id, array $columns = ['*']);

    public function findByEmail($email, array $columns = ['*']);
}
