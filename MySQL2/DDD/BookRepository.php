<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/8/16
 * Time: 12:26 AM
 */
require 'Book.php';
require 'Database.php';

class BookRepository
{
    /**
     * @param $bookId
     * @return Book
     */
    public function getBookById($bookId)
    {
        $database = new Database();
        $conn = $database->Connect();
        $stmt = $conn->prepare("SELECT Books.bookId AS No, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year, Genres.name AS Genre
                    FROM Books
                    LEFT JOIN Authors_Books ON Books.bookId=Authors_Books.bookId
                    LEFT JOIN Authors ON Authors.authorId=Authors_Books.authorId
                    LEFT JOIN Genres ON Books.genreId=Genres.genreId
                    WHERE Books.bookId = $bookId;");
        $stmt->execute();
        $bookInfo = $stmt->fetch(PDO::FETCH_ASSOC);
        $database->Close();

        $book = new Book();
        $book->setId($bookInfo['No']);
        $book->setAuthor($bookInfo['Author']);
        $book->setTitle($bookInfo['Title']);
        $book->setYear($bookInfo['Year']);
        $book->setGenre($bookInfo['Genre']);

        return $book;
    }
}
