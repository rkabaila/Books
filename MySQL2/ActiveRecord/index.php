<?php
/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/7/16
 * Time: 11:40 PM
 */
require 'BooksList.php';

    $books = new BooksList();
    $books->load();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Books </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form method="get">
        <h3> Books list </h3>
        <ul>
            <?php foreach( $books->keys() as $key ): ?>
            <a href="bookInfo.php?bookId=<?php echo $books->getBook($key)['bookId']?>"> <li> <?php echo $books->getBook($key)['title'];?> </li> </a>
            <?php endforeach; ?>
        </ul>
    </form>
</body>
</html>
