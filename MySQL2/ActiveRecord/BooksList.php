<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/7/16
 * Time: 1:35 PM
 */
require 'Database.php';

class BooksList
{
    protected  $books = array();

    /**
     * @param $book
     */
    public function addBook($book)
    {
        $this->books[] = $book;
    }

    /**
     * @param $key
     * @return bool
     */
    public function getBook($key)
    {
        if (isset($this->books[$key]))
        {
            return $this->books[$key];
        }
        else
        {
            echo ("Invalid key $key.");
            return false;
        }
    }

    /**
     * @return array
     */
    public function keys()
    {
        return array_keys($this->books);
    }

    /**
     * @return array
     */
    public function getBooks()
    {
        $database = new Database();
        $conn = $database->Connect();
        $stmt = $conn->prepare("SELECT bookId, title from Books");
        $stmt->execute();
        $database->Close();

        return $stmt->fetchAll();
    }

    public function load()
    {
        $books = $this->getBooks();
        foreach ($books as $book)
        {
            $this->addBook($book);
        }
    }
}

