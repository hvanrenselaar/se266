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
            echo "Sort";
            
        }
        if ( $action === 'search' ) {
            echo 'Search';
            
        }
        
        include __DIR__ . '/includes/searchForm.php';
        include __DIR__ . '/includes/filterForm.php';
        
 
        
        ?>
    </body>
</html>
