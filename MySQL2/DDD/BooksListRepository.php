<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/8/16
 * Time: 1:03 AM
 */
require 'BooksList.php';
require 'Database.php';

class BooksListRepository
{
    /**
     * @return BooksList
     */
    public function getBooks()
    {
        $database = new Database();
        $conn = $database->Connect();
        $stmt = $conn->prepare("SELECT bookId, title from Books");
        $stmt->execute();
        $database->Close();
        $books = $stmt->fetchAll();
        $booksList = new BooksList();
        foreach ($books as $book)
        {
            $booksList->addBook($book);
        }

        return $booksList;
    }
}
