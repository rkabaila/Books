<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/5/16
 * Time: 5:23 PM
 */
require 'Database.php';

class Book
{
    protected $id;
    protected $author;
    protected $title;
    protected $year;
    protected $genre;

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param $bookId
     * @return mixed
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
        $book = $stmt->fetch(PDO::FETCH_ASSOC);
        $database->Close();

        return $book;
    }

    /**
     * @param $bookId
     */
    public function load($bookId)
    {
        $book = $this->getBookById($bookId);
        $this->setId($book['No']);
        $this->setAuthor($book['Author']);
        $this->setTitle($book['Title']);
        $this->setYear($book['Year']);
        $this->setGenre($book['Genre']);
    }
}

