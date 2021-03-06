## Objective

  Create an API that acts as a hub for librarians to know the status of books in their library, and update books and their information.
  Establish table relationships using dbdiagram.io
  Table called "users" for all the library card holders
  Table called "available\_books" to show all books that can be checked out
  Table called "checkouts" to show checkout out books and other data like when it was checkedout and how many times it has been checked out
  Use Eloquent to implement foreign key relations

## CRUD Ideas
  
  Create: books, users, checkouts
  
  Read: all books, checkedout books, available books
  
  Update: book details user's checkedout books, checkout status, user's book history(?), 
  
  Delete: books, users, checkouts
  
  
## Database Diagram
![Library Database Diagram](./Laravel Library .png)

#### 

## Routes/Actions
Show all books
  /api/books/all
  
Create a book
  /api/books/new?title={title}&isbn={isbn}&pages={pages}&cost={cost}&excerpt={excerpt}&genre={genre}&current_condition={condition}
  
Read a book 
  /api/books/show/{id}
  
Update a book
  /api/books/{id}

Delete a book
  /api/books/delete/{id}
  
  
Show all checkouts
  /api/checkouts/all

Create a checkout
  /api/checkouts/new?user_id={id}&book_id={id}&checked_out_condition={id}
  
Read a checkout 
  api/checkouts/show/{id}
  
Update a checkout
  /api/checkouts/update/{id}?checked_in_condition={id}
  
Delete a checkout
  /api/checkouts/delete/{id}




