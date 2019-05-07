<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        ****
        <?php
        
       $config = array(
            'DB_DNS' => 'mysql:host=ict.neit.edu;port=5500;dbname=se266_123456789',
            'DB_USER' => 'se266_123456789',
            'DB_PASSWORD' => '123456789'
        );
        
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
         $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        
        $stmt = $db->prepare("SELECT * FROM test");
        
        //$phoneID = filter_input(INPUT_POST, 'phoneid');
        
        //$binds = array( ":phonetypeid" => $phoneID );
        $stmt->execute();
        
        
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
             //var_dump($results);            
             print_r($results);            
         }
        
        ?>
    </body>
</html>
