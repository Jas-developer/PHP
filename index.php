<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>

  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" method="POST">
        <input type="number" name="num01" placeholder="Number One" >
       
        <!-- SELECT -->
         <select name="operator">
          <option value="add">+</option>
          <option value="subtract">-</option>
          <option value="multiply">*</option>
          <option value="divide">/</option>
         </select>
          <input type="number" name="num02" placeholder="Number Two" >
          <button>CALCULATE</button>
  </form>
    
  <?php
  
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    //GRAB DATA
    $num01 = filter_input(INPUT_POST,"num01",  FILTER_SANITIZE_NUMBER_FLOAT);
    $num02 = filter_input(INPUT_POST,"num02", FILTER_SANITIZE_NUMBER_FLOAT,);

    $operator = htmlspecialchars($_POST["operator"]);
    

    //ERROR HANDLER
   
    $errors = false;

    if(empty($num01) || empty($num02)){
      echo "<h2>Please fill in all fields</h2>";
      $errors = true;
    }
  
  if(is_numeric($num01) && is_numeric($num02)){
    //VALIDATE NUMBERS
    if(!is_numeric($num01) || !is_numeric($num02)){
      echo "<h2>Invalid input. Please enter valid numbers.</h2>";
      $errors = true;
    }
  } else {
    echo "<h2>Invalid input. Please enter valid numbers.</h2>";
    $errors = true;
  };

  // calculate the numbers if no errors 

  if($errors){
    switch($operator){
      case "add":
        $value = $num01 + $num02;
        break;
      case "subract":
        $value = $num01 - $num02;
        break;
      case "multiply":
        $value = $num01 * $num02;
        break;
      case "divide":
        $value = $num01 / $num02;
        break;
    }
  }
  ?>
</body>
</html>