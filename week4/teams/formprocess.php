<?php
    include __DIR__ . '/model/model_teams.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 
        <?php
        
        $action = filter_input(INPUT_POST, 'action');
        
        if ( $action === 'sort' ) {
           $fieldName = filter_input(INPUT_POST, 'fieldName');
             $fieldValue = filter_input(INPUT_POST, 'fieldValue');
             $teams = sortTeams ($fieldName, $fieldValue);
            var_dump ($teams);
            
        }
        if ( $action === 'search' ) {
             
             $fieldName = filter_input(INPUT_POST, 'fieldName');
             $fieldValue = filter_input(INPUT_POST, 'fieldValue');
             $teams = searchTeams ($fieldName, $fieldValue);
             var_dump ($teams);
            //echo "Search $fieldName $fieldValue";
            
        }
        
        include __DIR__ . '/includes/searchForm.php';
        include __DIR__ . '/includes/sortForm.php';
        
 
        
        ?>
    </body>
</html>
