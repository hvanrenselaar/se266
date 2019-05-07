<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$users = array ($_POST['userName1'], $_POST['userName2']);

echo json_encode($users);

?>