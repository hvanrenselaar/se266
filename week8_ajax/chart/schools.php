<?php

    include './functions/dbconnect.php';
    include './functions/colorFunctions.php';
    
    $db = dbconnect();

   
    $stmt = $db->prepare("SELECT schoolState, COUNT(*) AS schoolCount from schools
                            GROUP BY schoolstate
                            ORDER BY COUNT(*) DESC LIMIT 10");

      
    $schools = array();
    if ($stmt->execute() && $stmt->rowCount() > 0) {
        $schools = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   //echo json_encode($schools);
    
    
    $results = array();
    $results[0] = array(); // list states
    $results[1] = array (); // number of schools in each state
    $results[2] = getRandomColorArray (10); // colors
    foreach ($schools as $s) {
        array_push($results[0], $s['schoolState']);
        array_push($results[1], $s['schoolCount']);
        
        //code to be executed;
    }
     echo json_encode($results);
   
?>