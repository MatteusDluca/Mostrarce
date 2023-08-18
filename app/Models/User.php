<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Facades\JWTAuth;

class User extends Authenticatable implements JWTSubject
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'cpf',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'cpf',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function create($fields){
        return parent::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'cpf' => Hash::make($fields['cpf']),
        ]);
    }

    public function login($credentials){
      if (!$token = JWTAuth::attempt($credentials)) {
        throw new \Exception('Credencias incorretas, verifique-as e tente novamente.', -404);
      }
      return $token;
    }
    public function getJWTIdentifier()
    {
      return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
      return [];
    }
}
