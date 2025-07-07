<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculator</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="https://img.icons8.com/?size=100&id=9viuvNq2CgPw&format=png&color=000000" type="image/x-icon">
</head>
<body>
  
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
  <h2>Simple Calculator</h2>
    <input type="text" name="num1" placeholder="Number one">
    <select name="operator">
      <option value="add">+</option>
      <option value="subtract">-</option>
      <option value="multiply">*</option> 
      <option value="divide">/</option>
    </select>
    <input type="text" name="num2" placeholder="Number two">
    <button type="submit">Calculate</button>
  </form>
  <?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Grab data from inputs
     $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
     $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
     $operator = htmlspecialchars($_POST['operator']);
    
    //  Error handlers
    $errors = false;

    if(empty($num1) || empty($num2) || empty($operator)){
       echo "<p class='calc-error'>Fill in all fields</p>";
       $errors = true;
    }

    if(!is_numeric($num1) || !is_numeric($num2)){
      echo "<p class='calc-error'>Only write numbers!</p>";
       $errors = true;
    }

    // Calculate the numbers if no errors
    if(!$errors){
        $value;
        switch($operator){
          case 'add':
              $value = $num1 + $num2;
              break;
          case 'subtract':
              $value = $num1 - $num2;
              break;
          case 'multiply':
              $value = $num1 * $num2;
              break;
          case 'divide':
              $value = $num1 / $num2;
              break;
          default:
              echo "<p class='calc-error'>Something went HORRIBLY wrong!</p>"; 
        }
        echo "<p class='calc-result'>Result = ".$value."</p>";
      }
    
   }
   
   ?>
</body>
</html>