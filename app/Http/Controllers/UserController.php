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
      if ($request->active != null) {$user->active = $request->active;} else {$user->active = 1;}
      
      $user->save();
      return $user;
    }
 
    // Updates a user using id and Postman
    public function update(Request $request, $id){
      $user = User::find($id);
      // Changes value of the key if there was an user input for the respective value and then reformats type to meet table structure
      if ($request->name != null) {$user->name = $request->name;}
      if ($request->email != null) {$user->email = $request->email;}
      if ($request->password != null) {$user->password = $request->password;}
      if ($request->active != null) {$user->active = $request->active;}
      
      $user->save();
      return $user;
    }
  
    // Deletes a user using an id
    public function delete($id){
      $name = User::find($id)->name;
      User::find($id)->delete();
      return "'$name'" . " With the id: $id deleted successfuly!";
    }
}
