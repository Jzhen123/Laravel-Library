<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    // Shows all checkouts
    public function index(){
      return Checkout::All();
    }
    
    // Shows a specfic checkout using id
    public function show($id){
      return Checkout::find($id);   
    }
  
    // Show all active checkouts by referencing returned_date
    public function active_checkouts(){
      return Checkout::All()->where('returned_date', null);
    }

    // Show all past checkouts by referencing returned_date
    public function past_checkouts(){
      return Checkout::All()->where('returned_date', '!=', null);
    }
  
    // Creates new checkout using values given from postman
    public function create(Request $request){
      $checkout = new Checkout();
        if ($request->user_id != null) {$checkout->user_id = $request->user_id;}
        if ($request->book_id != null) {$checkout->book_id = $request->book_id;}
        if ($request->checked_out != null) {$checkout->checked_out = $request->checked_out;} else {$checkout->checked_out = Carbon::now();}
        if ($request->due_date != null) {$checkout->due_date = $request->due_date;} else {$checkout->due_date = Carbon::createFromTime(96);}  
        if ($request->returned_date != null) {$checkout->returned_date = $request->returned_date;} else {$checkout->returned_date = null;}  
        if ($request->checked_out_condition != null) {$checkout->checked_out_condition = $request->checked_out_condition;}
        if ($request->checked_in_condition != null) {$checkout->checked_in_condition = $request->checked_in_condition;} else {$checkout->checked_in_condition = null;}  
      
      $checkout->save();
      return $checkout;
    }

    // Updates a checkout using id and Postman
    public function update(Request $request, $id){
      $checkout = Checkout::find($id);
        if ($request->user_id != null) {$checkout->user_id = $request->user_id;}
        if ($request->book_id != null) {$checkout->book_id = $request->book_id;}
        if ($request->checked_out != null) {$checkout->checked_out = $request->checked_out;}
        if ($request->due_date != null) {$checkout->due_date = $request->due_date;}
        if ($request->returned_date != null) {$checkout->returned_date = $request->returned_date;}
        if ($request->checked_out_condition != null) {$checkout->checked_out_condition = $request->checked_out_condition;}
        if ($request->checked_in_condition != null) {$checkout->checked_in_condition = $request->checked_in_condition;}
      
      $checkout->save();
      return $checkout;
    }
  
    // Returns a book by using its id
    public function check_in(Request $request, $id){
      $checkout = Checkout::find($id);
        if ($request->returned_date != null) {$checkout->returned_date = $request->returned_date;} else {$checkout->returned_date = Carbon::now();}  
        if ($request->checked_in_condition != null) {$checkout->checked_in_condition = $request->checked_in_condition;}
      
      $checkout->save();
      return $checkout;
    }
  
    // Deletes a book using its id
    public function delete($id){
      Checkout::find($id)->delete();
    }
}
