<?php

include (__DIR__ . '/model/model_shifts.php');

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);

 
  if( is_array($decoded)) {
     // echo json_encode($decoded['team_name']);
      $day = $decoded['day'];
      $id = $decoded['id'];
      $shift = $decoded['shift'];
      $action = $decoded['action'];
      if ($action == "add") {
          $results = addShift ($id, $shift, $day);
          echo json_encode ($results);
      } else if ($action == "delete") {
          $results = deleteShift ($id, $shift, $day);
          echo json_encode ($results);
      } 
      
  } else {
    // Send error back to user.
  }
}

?>