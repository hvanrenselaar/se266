<?php

session_start();
$_SESSION['shoe_size'] = 10.5;

echo $_SESSION['shoe_size'];

?>

<a href="page2.php">Page 2</a>
