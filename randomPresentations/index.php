

<?php
    $teams = array("Terry and Robert", "James", "Evan and Andersson", "Talia, Justice and Tim", "Ian, Karissa and Ethan");
    $number_of_teams = count($teams);
     

    if (isset ($_POST['randomize'])):
?>
    <ol>
        <h2>Random Order for Presentations</h2>
        <?php 
            for ($i=0; $i<$number_of_teams; $i++):
                $t = rand(0, count($teams)-1);
        ?>
         <li><?php echo $teams[$t]; ?></li>
        <?php
            unset ($teams[$t]);
            $teams = array_values($teams);
            endfor;
        ?>
    </ol>
   
<?php
    
    else:
 ?>
<ul>
        <h2>SE 265 Teams (not random)</h2>
        <?php 
            for ($i=0; $i<$number_of_teams; $i++):
                 
        ?>

            <li><?php echo $teams[$i]; ?></li>
    
        <?php
           
            endfor;
        ?>
    </ul>
    <form method="post" action="index.php">
        <input type="submit" value="Random Presentations" name="randomize">
    </form>

 <?php endif; ?>

    
