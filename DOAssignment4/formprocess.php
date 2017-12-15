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
        <h1>Corporate Search Form</h1>
        <?php
        
        $action = filter_input(INPUT_GET, 'action');

        if ($action === 'sort') {
            echo 'Submitted Sort Form';
        }
        if ($action === 'search') {
            echo 'Submitted Search Form';
        }

        include_once './includes/form1.php';
        include_once './includes/form2.php';
        
        ?>
    </body>
</html>
