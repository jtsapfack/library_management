<?php
$member = $_POST['member'];
$book = $_POST['book'];
$borrowDate = $_POST['borrow_date'];
$dueDate = $_POST['due_date'];

echo "<h3>Borrow Successful</h3>";
echo "Member: $member <br>";
echo "Book: $book <br>";
echo "Borrow Date: $borrowDate <br>";
echo "Due Date: $dueDate <br>";
echo "Inventory updated successfully.";
?>
