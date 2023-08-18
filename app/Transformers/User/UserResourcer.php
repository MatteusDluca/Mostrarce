<?php

namespace App\Transformers\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class UserResourcer extends JsonResource{


    private $config;
    public function __construct($resource, $config = array()){
        parent::__construct($resource);
        $this->config = $config;
    }



    public function toArray($request){
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'cpf' => '999.999.999-99'
        ];
    }


    public function with($request)
    {
        return ResponseService::default($this->config, $this->id);
    }



    public function withResponse($request, $response){
        $response->setStatusCode(200);
    }



}