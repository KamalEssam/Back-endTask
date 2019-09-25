<?php

namespace App\Http\Controllers\Api;

use App\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\dataResource;

class postController extends Controller
{
    use ApiResponseTrait;

    public function index($id){
        $post= post::find($id);
        if($post){
            return $this->apiResponse(new dataResource($post));
        }else{
            return $this->apiResponse(null,'not found',404);
        }
    } 

    public function show(){
        $post=  dataResource::collection(post::paginate($this->paginateNum)); 
        
        return $this->apiResponse($post);
    }

    public function store(Request $request ){
    
        $post=post::create($request->all());    
        if($post){
            return $this->apiResponse(new dataResource($post),null,201);
        }else{
            return $this->apiResponse(null,'Unknown',400);
        }
    }
}
