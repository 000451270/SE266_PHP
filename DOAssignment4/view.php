<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <br />
        
        <title>Assignment 4 Sorting</title>
    </head>
    
    <body>
        <div class="panel panel-primary">
            <?php

            include_once './functions/dbconnect.php';
            include_once './functions/functions.php';
            
            include 'includes/form1.php';

            include 'includes/form2.php';

            $db = getDatabase();
            
            getSortData();
            getSearchData();
            
            ?>
        </div>
    </body>
</html>
