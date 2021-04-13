<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
      return Book::All();
    }
  
    public function show($id){
      return Book::find($id);   
    }
  
    public function create(Request $request){
      $book = new Book();
      $book->title = $request->input('title', 'None');
      $book->isbn = $request->input('isbn', 'None');
      $book->pages = $request->input('pages', 0);
      $book->cost = $request->input('cost', 0);
      $book->current_condition = $request->input('current_condition', 0);
      $book->excerpt = $request->input('excerpt', 'None');
      $book->genre = $request->input('genre', 0);
      
      $book->save();   
    }
  
    public function update(Request $request, $id){
      $inputs = $request->except('created_at', 'updated_at');
      print_r($inputs);
      foreach($inputs as $key => $value) {
        $book = Book::find($id);
        $book->$key = $value;
        $book->save();
      } 
    }
  
    public function delete($id){
      Book::find($id)->delete();
    }
}
