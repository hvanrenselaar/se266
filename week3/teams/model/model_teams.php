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
    
    function deleteTeams ($ids) {
         global $db;
        
        $result = "Data was not deleted";
        $stmt = $db->prepare("DELETE FROM teams WHERE id IN (:ids)");
        
        $binds = array(
            ":ids" => $ids
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->rowCount() . " row(s) deleted";
        }
        
        return ($result);
    }
    
    $r = deleteTeams ("8,9");
    
?>

