<?php
$member = $_POST['member'];
$book = $_POST['book'];
$borrowDate = $_POST['borrow_date'];
$dueDate = $_POST['due_date'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Borrow Success</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f4f8;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background: white;
      padding: 30px;
      border-radius: 12px;
      width: 400px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      color: #4f46e5;
      margin-bottom: 20px;
    }

    p {
      margin: 8px 0;
      color: #333;
    }

    .success {
      color: green;
      font-weight: bold;
      margin-top: 15px;
    }

    a {
      display: inline-block;
      margin-top: 20px;
      text-decoration: none;
      background: #4f46e5;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
    }
  </style>
</head>
<body>

  <div class="card">
    <h2>Borrow Successful</h2>
    <p><strong>Member:</strong> <?php echo $member; ?></p>
    <p><strong>Book:</strong> <?php echo $book; ?></p>
    <p><strong>Borrow Date:</strong> <?php echo $borrowDate; ?></p>
    <p><strong>Due Date:</strong> <?php echo $dueDate; ?></p>
    <p class="success">Inventory updated successfully</p>

    <a href="borrow.html">Borrow Another Book</a>
  </div>

</body>
</html>
