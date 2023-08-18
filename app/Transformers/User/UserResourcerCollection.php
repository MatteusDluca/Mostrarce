<?php



namespace App\Transformers\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Service\ResponseService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResourcerCollection extends ResourceCollection{
    public function toArrays($request){
    return ['data'=> $this->collection];
    }



    public function with($request){
        return[
            'status' => true,
            'msg' => 'Logado',
            'url' => route('users.index')
        ];
    }



    public function withResponse($request, $response){
        $response->setStatusCode(200);
    }



}