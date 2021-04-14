<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index(){
      return Checkout::All();
    }
  
    public function show($id){
      return Checkout::find($id);   
    }
  
    public function create(Request $request){
      $checkout = new Checkout();
      $checkout->user_id = $request->input('user_id');
      $checkout->book_id = $request->input('book_id');
      $checkout->checked_out = Carbon::now();
      $checkout->due_date = Carbon::createFromTime(96);
      $checkout->returned_date = null;
      $checkout->checked_out_condition = $request->input('checked_out_condition');
      $checkout->checked_in_condition = null;
      
      $checkout->save();   
    }
  
  
    public function update(Request $request, $id){
      $inputs = $request->except('created_at', 'updated_at');
      foreach($inputs as $key => $value) {
        $checkout = Checkout::find($id);
        $checkout->$key = $value;
        $checkout->save();
      } 
      $checkout->returned_date = Carbon::now();
      $checkout->save();
    }
  
    public function delete($id){
      Checkout::find($id)->delete();
    }
}
