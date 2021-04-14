<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    // Shows all books
    public function index(){
      return Book::All();
    }
  
    // Shows a specfic book using id
    public function show($id){
      return Book::find($id);   
    }
  
    // Creates new book using values given from postman
    public function create(Request $request){
      $book = new Book(); 
      if ($request->title != null) {$book->title = $request->title;}
      if ($request->ISBN != null) {$book->ISBN = $request->ISBN;}
      if ($request->pages != null) {$book->pages = $request->pages;}
      if ($request->cost != null) {$book->cost = $request->cost;}
      if ($request->excerpt != null) {$book->excerpt = $request->excerpt;} else {$book->excerpt = "Nothing Given";} // Default since excerpt isn't really mandatory
      if ($request->genre != null) {$book->genre = $request->genre;}
      if ($request->current_condition != null) {$book->current_condition = $request->current_condition;}
      
      $book->save();
      return $book;
    }
    
    // Updates a book using id and Postman
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
      
      $book->save();
      return $book;
    }
    
    // Deletes a book using an id
    public function delete($id){
      $title = Book::find($id)->title;
      Book::find($id)->delete();
      return "'$title'" . " With the id: $id deleted successfuly!";
    }
}
