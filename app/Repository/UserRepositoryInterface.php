<?php

namespace App\Repository;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllUsers();

    public function storeUser($userData);

    public function updateUser($encrypted_id, $data);
}
