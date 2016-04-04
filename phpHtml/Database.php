<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/4/16
 * Time: 1:03 PM
 */
require 'config.php';

class Database
{
    protected $conn;
    protected $table;

    public function Connect($servername, $dbname, $username, $password)
    {

        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;
        } catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }
    }


    public function GetBooks()
    {
        try {

            $stmt = $this->conn->prepare("SELECT bookId, title from Books");
            $stmt->execute();
            return $stmt->fetchAll();

        }catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }
    }

    public function GetBookInfo($bookId){
        try {

            $stmt = $this->conn->prepare("SELECT Books.bookId AS No, GROUP_CONCAT(Authors.name) AS Author, Books.title AS Title, Books.year AS Year, Genres.name AS Genre
                    FROM Books
                    LEFT JOIN Authors_Books ON Books.bookId=Authors_Books.bookId
                    LEFT JOIN Authors ON Authors.authorId=Authors_Books.authorId
                    LEFT JOIN Genres ON Books.genreId=Genres.genreId
                    GROUP BY Title;");
            $stmt->execute();
            do {
                $book = $stmt->fetch(PDO::FETCH_ASSOC);
            } while ($book['No'] != $bookId);
            return $book;

        }catch (PDOException $e) {
            echo 'Error ' . $e->getMessage();
            return false;
        }

    }

    public function Close(){
        $this->conn = null;
    }
}


