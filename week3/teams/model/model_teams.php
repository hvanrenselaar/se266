<?php

    include (__DIR__ . '/db.php');
    
    function getTeams () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams");
     
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
         }
         
         return ($results);
    }
    
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
    
 
    
    
?>

