<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUsers()
    {
        $month = \request()->month ?? Carbon::now()->format('m');
        return $this->model->withCount(['attendances' => function ($q) use ($month) {
            return $q->whereMonth('date', $month);
        }])->paginate(10);
    }

    function storeUser($userData)
    {
        if (array_key_exists('avatar', $userData)) {
            $userData['avatar'] = $this->uploadImage($userData['avatar']);
        }
        $userData['password'] = bcrypt($userData['password']);
        return $this->model->create($userData);
    }

    function updateUser($id, $data)
    {
        if (array_key_exists('password', $data)) {
            $data['password'] = bcrypt($data['password']);
        }
        $user = $this->findByEncryptedId($id);
        if (array_key_exists('avatar', $data)){
            if ($user->avatar){
                $this->removeImage($user->avatar);
            }
            $data['avatar'] = $this->uploadImage($data['avatar']);
        }

        $user->update($data);
        return $user;
    }

    function uploadImage($image)
    {
        $ext = $image->getClientOriginalExtension();
        $filename = date('Ymdhms') . Str::random(6) . '.' . $ext;
        Storage::disk('public')->putFileAs('user/avatar/', $image,$filename,'public' );
        return $filename;
    }

    function removeImage($filename){
        return Storage::disk('public')->delete('user/avatar/'.$filename);
    }
}
