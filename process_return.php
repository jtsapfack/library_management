<?php
$member = $_POST['member'];
$book = $_POST['book'];
$returnDate = $_POST['return_date'];

echo "<h3>Return Successful</h3>";
echo "Member: $member <br>";
echo "Book: $book <br>";
echo "Return Date: $returnDate <br>";
echo "Inventory increased successfully.";
?>
