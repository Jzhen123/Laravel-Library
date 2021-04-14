<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    // Shows all Users
    public function index(){
      return User::All();
    }
  
    // Shows a specfic user using id
    public function show($id){
      return User::find($id);   
    }
  
    // Creates new user using values given from postman
    public function create(Request $request){
      $user = new User(); 
      if ($request->name != null) {$user->name = $request->name;}
      if ($request->email != null) {$user->email = $request->email;}
      if ($request->password != null) {$user->password = $request->password;}
      
      $user->save();
      return $user;
    }
}
