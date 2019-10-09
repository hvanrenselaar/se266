 <?php
        
        include __DIR__ . '/model/model_teams.php';
        include __DIR__ . '/functions.php';
     
        if (isPostRequest()) {
           $team = filter_input(INPUT_POST, 'team');
           $division = filter_input(INPUT_POST, 'division');
           $result = addTeam ($team, $division);
           echo $result;
           
       }
    ?>
    

<html lang="en">
<head>
  <title>Add NFL Team</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Add New team</h1>
    
    <form action="addNewTeam.php" method="post">
        <label>Team Name</label>    <input type="text" name="team"><br />
        <label>Division</label>    <input type="text" name="division"><br />
        
        <input type="submit" name="addTeam">
    </form>
</body>
</html>