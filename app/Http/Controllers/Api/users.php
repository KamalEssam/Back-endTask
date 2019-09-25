<?php

namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\dataResource;
use Validator;
class users extends Controller
{
    use ApiResponseTrait;


    /**
    *this is first way for register 
    */
    //    public function register(Request $request){
    // 	$input=$request->all();
    // 	$validator= Validator::make($request->all(),[
    // 		'name'=>'required',
    // 		'email'=>'required|email',
    // 		'password'=>'required',
    // 		'c_password'=>'required|same:password',
    // 	]);
    // 	if ($validator->fails()) {
    // 		return $this->sendError('error validation',$validator->errors());

    // 	}
    // 	$input=$request->all();
    // 	$input['password']=bcrypt($input['password']);
    // 	$user=User::create($input);
    // 	$success['token']=$user->createToken('MyApp')->accessToken;
    // 	$success['name']=$user->name;
    // 	return  $this->apiResponse($success,null,201);
    // }

 /**
    * this is another way for register 
    */
    public function register(Request $request)
   {
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
       
   }

   

   public function login(Request $request)
   {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if(!auth()->attempt($loginData)) 
        {
            return response(['message'=>'Invalid credentials']);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

   }  

   

}
