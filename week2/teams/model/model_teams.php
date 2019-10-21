<?php

    include (__DIR__ . '/db.php');
    
    function getTeams () {
        global $db;
        
        $results = [];
        $stmt = $db->prepare("SELECT id, teamName, division FROM teams ORDER BY id DESC");      
        
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
   
    $teams = getTeams();
    var_dump ($teams);
    

?>

