<?php

namespace App\Http\Controllers\Api;


trait ApiResponseTrait
{
	public $paginateNum=10;
	public function apiResponse($data=null,$error=null,$code=200){
			$array=[
				'data'=>$data,
				'status'=> in_array($code, $this->successCode()) ? true : false,
				'error'=>$error
			];
			return response($array,$code);
	}
	public function successCode(){
		return [
			200,201,202
		];
	}	
}