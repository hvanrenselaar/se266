<?php
    $error_message = "";
    $num1=5;
    $num2=7;
    if (isset($_POST['calc'])) {
        $num1 = filter_input (INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT );
        if ($num1 == false) {
            $error_message .= "<li>Please make sure num1 is a number</li>";
        }
      $num2 = filter_input (INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT );
        if ($num2 == false) {
            $error_message .= "<li>Please make sure num2 is a number</li>";
        }
    }
   
    $result = $num1 + $num2;
    
?>


<!DOCTYPE html>
<html>
<head>
<title>Add Two Numbers</title>

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<h1>Add Numbers</h1>

<?php 
    if ($error_message != ""):
 ?> 
    
<div class="alert alert-danger" role="alert">
  <?php echo $error_message; ?>
</div>

<?php
    exit;
    endif;
 ?>
       
<form method="post">
    Number 1: <input type="text" id="num1" name="num1" value="<?php echo $num1;?>"><br />
    Number 2: <input type="text" id="num2" name="num2" value="<?php echo $num2;?>">
    <input type="submit" id="calc" name="calc">
    <p>These numbers added is <?php echo $result;?></p>
</form>

<table class="table table-striped" style="width:50%;">
    <tr>
        <th>Amount</th>
        <th>Interest</th>
    </tr>
    <tr>
        <td>1000</td>
        <td>10.99</td>
        
    </tr>
    <tr>
        <td>1000</td>
        <td>10.99</td>
        
    </tr>
    
</table>


</body>
</html>