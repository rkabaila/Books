<?php

/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/7/16
 * Time: 1:35 PM
 */

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
}

