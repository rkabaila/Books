<?php
/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/4/16
 * Time: 12:50 PM
 */
require 'Database.php';

$database = new Database();
$conn = $database->Connect();
$stmt = $conn->prepare("SELECT bookId, title from Books");
$stmt->execute();
$books = $stmt->fetchAll();
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
        <h3> Books list </h3>
        <ul>
            <?php foreach( $books as $book ): ?>
                <a href="book.php?bookId=<?php echo $book['bookId']?>"> <li> <?php echo $book['title'];?> </li> </a>
            <?php endforeach; ?>
        </ul>
    </form>
</body>
</html>