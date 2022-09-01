<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsers()
    {
        $month = \request()->month ?? Carbon::now()->format('m');
       return  $this->model->withCount(['attendances'=>function($q) use ($month){
           return $q->whereMonth('date', $month);
       }])->paginate(10);
    }

    function storeUser($userData)
    {
        $userData['password'] = bcrypt($userData['password']);
        return $this->model->create($userData);
    }

    function updateUser($id, $data)
    {
        if (array_key_exists('password', $data)){
            $data['password'] = bcrypt($data['password']);
        }
       $user =  $this->findByEncryptedId($id);
       $user->update($data);
       return $user;
    }
}
