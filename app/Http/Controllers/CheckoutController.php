<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
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
        $id = $request->book_id;
        $checkouts = Checkout::all();
        foreach($checkouts as $checkout_book_id) {
          if ($checkout_book_id->book_id == $id && $checkout_book_id->returned_date == null) return "Book is already checked out!"; // Makes sure the book is returned before it can be checked out again
        }
        
      $checkout = new Checkout();
      if ($request->user_id != null) {$checkout->user_id = $request->user_id;}
      if ($request->book_id != null) {$checkout->book_id = $request->book_id;}
      if ($request->checked_out != null) {$checkout->checked_out = $request->checked_out;} else {$checkout->checked_out = Carbon::now();}
      if ($request->due_date != null) {$checkout->due_date = $request->due_date;} else {$checkout->due_date = Carbon::createFromTime(96);}  
      if ($request->returned_date != null) {$checkout->returned_date = $request->returned_date;} else {$checkout->returned_date = null;}  
      if ($request->checked_out_condition != null) {$checkout->checked_out_condition = $request->checked_out_condition;}
      if ($request->checked_in_condition != null) {$checkout->checked_in_condition = $request->checked_in_condition;} else {$checkout->checked_in_condition = null;}  
      $checkout->save();
      
      $book = Book::find($id); // Changes availability of the book we just checked in
      $book->available = 0;
      $book->save();
      
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
      $book = Book::find($id);
      $checkout = Checkout::where('book_id', $book->id)->get()->last();
        if ($request->returned_date != null) {$checkout->returned_date = $request->returned_date;} else {$checkout->returned_date = Carbon::now();}  
        if ($request->checked_in_condition != null) {$checkout->checked_in_condition = $request->checked_in_condition;} else {}
      
      $checkout->save();
      $book->available = 1;
      $book->save();
      return $checkout;
    }
  
    // Deletes a book using its id
    public function delete($id){
      Checkout::find($id)->delete();
    }
}
