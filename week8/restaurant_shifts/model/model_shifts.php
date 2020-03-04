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
    
     function deleteShift ($employee_id, $shift, $day) {
        global $db;
        
        // check if this is a duplicate
        
        $binds = array(
            ":id" => $employee_id,
            ":shift" => $shift,
            ":day" => $day
            
        );
        $stmt = $db->prepare("DELETE FROM restaurant_shifts WHERE employeeId = :id AND shiftNumber = :shift AND shiftDay =:day");
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
             return (true);
                        
         }
         
        
        return (false);
    }   
   
    
    
?>

