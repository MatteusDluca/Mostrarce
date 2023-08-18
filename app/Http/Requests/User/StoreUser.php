<?php

namespace App\Http\Requests\User;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illumunate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class StoreUser extends FormRequest{



    // Função que vai permitir a requisição
    public function authorize(){
        return true;
    }


    // Função que vai validar a requisição

    public function rules(){
        return [
            'email' => 'unique:users,email|required',
            'name' => 'required',
            'cpf' => 'required|unique:users,cpf',
        ];
    }


    // Resposta que enviamos para o usuário em caso de falha

    public function withValidator($validator){
        if($validator->fails()){
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum caompo obrigatório não foi preenchido',
                'status' => false,
                'errors' => $validator->errors(),
                'url' => route('users.store')
            ], 403));
        }
    }
    
}