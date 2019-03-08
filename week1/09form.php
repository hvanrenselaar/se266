<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="test" method="post">
            <input type="text" value="20" name="myNumber">
            <input type="submit" value="Click Me" name="clickMe">
            
            
        </form>
        <?php
            var_dump ($_POST);
            $number = $_POST['myNumber'] + 15;
            if (isset ($_POST['clickMe'])) {
                for ($i=0; $i<$number; $i++)
                {
                    echo $i . "<br />";
                }

            }
        ?>
    </body>
</html>
