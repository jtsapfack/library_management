<?php
$member = $_POST['member'];
$book = $_POST['book'];
$returnDate = $_POST['return_date'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Return Success</title>
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
      font-size: 15px;
      color: #333;
      margin: 8px 0;
    }

    .success {
      margin-top: 15px;
      color: green;
      font-weight: bold;
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
    <h2>Return Successful</h2>
    <p><strong>Member:</strong> <?php echo $member; ?></p>
    <p><strong>Book:</strong> <?php echo $book; ?></p>
    <p><strong>Return Date:</strong> <?php echo $returnDate; ?></p>
    <p class="success">Inventory increased successfully</p>

    <a href="return.html">Return Another Book</a>
  </div>

</body>
</html>
