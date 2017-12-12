<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */  
function getDatabase() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassWinter2017',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );
    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
    }
    return $db;
}
        ?>
    </body>
</html>
