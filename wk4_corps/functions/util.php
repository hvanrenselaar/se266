<?php

    function getColumns() {
        $columns = [
          "email",
          "corp_data",
          "zipcode"
        ];


        return $columns;
    }
    
    $columns = getColumns();
    foreach ($columns as $c) {
        echo $c;
    }
?>