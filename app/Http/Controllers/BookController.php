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
      
      $book = Book::find($id);
      
      // Changes value of the key if there was an user input for the respective value and then reformats type to meet table structure
      if ($request->title != null) {$book->title = $request->title;}
      if ($request->ISBN != null) {$book->ISBN = $request->ISBN;}
      if ($request->pages != null) {$book->pages = $request->pages;}
      if ($request->cost != null) {$book->cost = $request->cost;}
      if ($request->excerpt != null) {$book->excerpt = $request->excerpt;}
      if ($request->genre != null) {$book->genre = $request->genre;}
      if ($request->current_condition != null) {$book->current_condition = $request->current_condition;}
      
//         $book->title = $request->title;
//         $book->ISBN = $request->ISBN;
//         $book->pages = $request->pages;
//         $book->cost = $request->cost;
//         $book->excerpt = $request->excerpt;
//         $book->genre = $request->genre;
//         $book->current_condition = $request->current_condition;
        
        $book->save();
        return $book;
    }
  
    public function delete($id){
      Book::find($id)->delete();
    }
}
