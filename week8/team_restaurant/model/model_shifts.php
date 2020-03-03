<?php

    include (__DIR__ . '/db.php');
    
    function getEmployees () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT employeeId, employeeName FROM restaurant_employees");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
    function getShifts () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT e.employeeId, employeeName,shiftNumber, shiftDay FROM restaurant_employees e INNER JOIN restaurant_shifts s ON e.employeeId = s.employeeId");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
    // return true if record was added; false otherwise
    function addShift ($employee_id, $shift, $day) {
        global $db;
        
        // check if this is a duplicate
        $record = [];
        $binds = array(
            ":id" => $employee_id,
            ":shift" => $shift,
            ":day" => $day
            
        );
        $stmt = $db->prepare("SELECT COUNT(*) AS countShift FROM restaurant_shifts WHERE employeeId = :id AND shiftNumber = :shift AND shiftDay =:day");
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
             $record = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         if( $record['countShift'] > 0) {
            return (false);
         }
        
        $stmt = $db->prepare("INSERT INTO restaurant_shifts SET employeeId = :id, shiftNumber = :shift, shiftDay =:day");

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return (true);
        }
        
        return (false);
    }   
    
    /*
     * 
     * employeeId, shiftNumber, shiftDay
     */
    
     $s = addShift (3, 3, 2);
    if ($s == false) echo "DID NOT ADD";
    // $shifts = getShifts();
     
      //echo json_encode ($shifts);
    /*
    function addTeam ($t, $d) {
        global $db;
        
        $stmt = $db->prepare("INSERT INTO teams SET teamName = :team, division = :division");

        $binds = array(
            ":team" => $t,
            ":division" => $d
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    
    function updateTeam ($id, $team, $division) {
        global $db;
        
        $stmt = $db->prepare("UPDATE teams SET teamName = :team, division = :division WHERE id=:id");
        $results = "";
        $binds = array(
            ":id" => $id,
            ":team" => $team,
            ":division" => $division
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Updated';
        }
        
        return ($results);
    }
    function deleteTeam ($id) {
        global $db;
        
        $results = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM teams WHERE id=:id");
        
        $binds = array(
            ":id" => $id
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Deleted';
        }
        
        return ($results);
    }
    
    function getTeam ($id) {
         global $db;
        
        $result = [];
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams WHERE id=:id");
        $binds = array(
            ":id" => $id
        );
       
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
             $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        
         }
         
         return ($result);
    }
    
  
  function searchTeams ($column, $searchValue) {
      global $db;
        
      
      $stmt = $db->prepare("SELECT * FROM test WHERE $column LIKE :search");

           
       
        $results = [];
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams WHERE $column LIKE :search");
        $search = '%'.$searchValue.'%';
        $binds = array(
              ":search" => $search
        );
        
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

         }

         return ($results);
  }
  
  
  
  function sortTeams ($column, $order) {
      
       global $db;
        
        $results = [];
        
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY $column $order");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
  }
  
  function getFieldNames () {
      $fieldNames = ['teamName', 'division'];
      
      return ($fieldNames);
      
  }
    */
 
?>

