<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
        body {margin-top:50px; margin-left: 100px;}
    </style>
    <title>Wk 4 Corps Search Page</title>
</head>
<body>

<h1>Wk 4 Corps Search Page</h1>

<?php
    include './includes/form_search.php';
    include './includes/form_orderby.php';
    
    $action = filter_input(INPUT_POST, 'action');
    
    if ( $action === 'Search' ) {
        echo 'Search';
    }
    if ( $action === 'OrderBy' ) {
        echo 'Order By';
    }
?>

</body>
</html>