<?php
/**
 * Created by PhpStorm.
 * User: rimas
 * Date: 4/4/16
 * Time: 12:50 PM
 */
require 'Database.php';

$database = new Database();
if ($database->Connect($servername, $dbname, $username, $password)){
    $books = $database->GetBooks();
    $database->Close();
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title> Books </title>
    </head>

<body>
<form method="get">
    <h3> Books </h3>
    <ul>
        <?php foreach( $books as $book ): ?>
            <a href="book.php?bookId=<?php echo $book['bookId']?>"> <li> <?php echo $book['title'];?> </li> </a>
        <?php endforeach; ?>
    </ul>
</form>
</body>

</html>