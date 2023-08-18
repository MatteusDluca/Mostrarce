<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;
use App\Services\UserService;
use App\Transformers\User\UserResourceCollection;
use App\Transformers\User\UserResourcer;
use App\Service\ResponseService;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    

    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUser $request)
    {
        try {
            $user = $this->user->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'cpf' => Hash::make($request->get('cpf')),
            ]);
        } catch (\Throwable|\Exception $e) {
            return ResponseService::exception('users.store',null,$e);
            }


            return new UserResourcer($user, array('type' => 'store', 'route' => 'users.store'));
    }






    public function login(Request $request)
    {
        $credentials = $request->only('email', 'cpf');
            try {
                $token = $this
                ->user
                ->login($credentials);
        } catch (\Throwable|\Exception $e) {
            return ResponseService::exception('users.login',null,$e);
        }
        return response()->json(compact('token'));
    }
}
