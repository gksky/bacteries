<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bacteria population</title>
  
 </head>
  <style>
    body {
      font-family: sans-serif;
      font-size: 24px;
    }
    h1 {
      text-align: center;
    }
    form {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px;
    }
    ul {
      margin: 0;
      padding: 4px;
    }
    ul li {
      display: inline;
      margin-right: 5px;
      padding: 3px;
    }
    input[type=number] {
      padding: 8px 8px;
      margin: 8px 0;
      width: 100px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 24px;
    }
    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 8px 16px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 24px;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }
    .red {
      display: inline-block;
      color: red;
    }
    span.red {
      width: 70px;
    }
    .green {
      display: inline-block;
      color: green;
    }
    span.green {
      width: 70px;
    }
  </style>
</head>
<body>

<?php

if (!isset($_POST['red']) || !isset($_POST['green']) || !isset($_POST['times'])) { // Checking if values is not set
  $red = 1; // Setup default values
  $green = 1;
  $times = 10;
}
else { // Set values from POST request
  $red = $_POST['red'];
  $green = $_POST['green'];
  $times = $_POST['times'];
}

?>

<h1>Bacteria population</h1>

<form action="index.php" method="post">
  <ul>
    <li>
      <label class='red' for="red">red:</label>
      <input type="number" min="0"id="red" name="red" value=<?php echo $red ?>>
    </li>
    <li>
      <label class='green' for="green">green:</label>
      <input type="number" min="0" id="green" name="green" value=<?php echo $green ?>>
    </li>
    <li>
      <label for="times">times:</label>
      <input type="number" min="1"id="times" name="times" value=<?php echo $times ?>>
    </li>
  </ul>

  <input type="submit" value="Calculate">

</form>

<?php

for ($i = 0; $i < $times; $i++) {
  $tr = bcadd(bcadd(bcadd($red, $red), bcadd($red, $red)), bcadd($green, $green)); // Adding arbitrary precision numbers
  $tg = bcadd(bcadd(bcadd($red, $red), $red), bcadd(bcadd($green, $green), bcadd($green, bcadd($green, $green)))); // Adding arbitrary precision numbers
  $red = $tr;
  $green = $tg;
}

$red = strrev(chunk_split(strrev($red), 3)); // Adding a thousands separator
$green = strrev(chunk_split(strrev($green), 3)); // Adding a thousands separator

?>

Result:<br>
<span class='red'>Red: </span><?php echo $red ?><br>
<span class='green'>Green: </span><?php echo $green ?><br>


</body>
</html>
