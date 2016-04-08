<?php
/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/4/16
 * Time: 12:50 PM
 */
require 'Database.php';

$bookId = $_GET['bookId'];
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
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> Books </title>
</head>
<body>
    <form method="get">
        <h3> Book info </h3>
        <table>
            <tr>
                <th> Id: </th>
                <td> <?php echo $book['No']?> </td>
            </tr>
            <tr>
                <th> Author: </th>
                <td> <?php echo $book['Author']?> </td>
            </tr>
            <tr>
                <th> Title: </th>
                <td> <?php echo $book['Title']?> </td>
            </tr>
            <tr>
                <th> Year: </th>
                <td> <?php echo $book['Year']?> </td>
            </tr>
            <tr>
                <th> Genre: </th>
                <td> <?php echo $book['Genre']?> </td>
            </tr>
        </table>
        <a id="booksList" href="index.php"> Books list </a>
    </form>
</body>
</html>
