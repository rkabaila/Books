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
if ($database->Connect($servername, $dbname, $username, $password)){
    $book = $database->GetBookInfo($bookId);
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
    <h3> Book </h3>

    Id: <?php echo $book['No']?> <br>
    Author: <?php echo $book['Author']?> <br>
    Title: <?php echo $book['Title']?> <br>
    Year: <?php echo $book['Year']?> <br>
    Genre: <?php echo $book['Genre']?> <br>

</form>
</body>

</html>
