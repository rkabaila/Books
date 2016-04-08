<?php
/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/7/16
 * Time: 11:43 PM
 */

require 'BookRepository.php';

$bookId = $_GET['bookId'];
$bookRepository = new BookRepository();
$book = $bookRepository->getBookById($bookId);
?>

<!DOCTYPE html>
<html>
<head>
    <title> Books </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form method="get">
        <h3> Book info </h3>
        <table>
            <tr>
                <th> Id: </th>
                <td> <?php echo $book->getId();?> </td>
            </tr>
            <tr>
                <th> Author: </th>
                <td> <?php echo $book->getAuthor();?> </td>
            </tr>
            <tr>
                <th> Title: </th>
                <td> <?php echo $book->getTitle();?> </td>
            </tr>
            <tr>
                <th> Year: </th>
                <td> <?php echo $book->getYear();?> </td>
            </tr>
            <tr>
                <th> Genre: </th>
                <td> <?php echo $book->getGenre();?> </td>
            </tr>
        </table>
        <a id="booksList" href="index.php"> Books list </a>
    </form>
</body>
</html>