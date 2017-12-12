<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
        include './dbconnect.php';
        include './functions.php';
        $results = '';
        if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO test SET dataone = :dataone, datatwo = :datatwo");
            $dataone = filter_input(INPUT_POST, 'data-one');
            $datatwo = filter_input(INPUT_POST, 'data-two');
            
            $binds = array(
                ":dataone" => $dataone,
                ":datatwo" => $datatwo
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = ' Record Added';
            }
        }
        ?>
        
<div class="form-group">
            <label for="data-one">Data One:</label>
                <input type="dataone" class="form-control" id="dataone" placeholder="Enter Data One" name="dataone">
        </div>
        <div class="form-group">
            <label for="data-two">Data One:</label>
                <input type="datatwo" class="form-control" id="datatwo" placeholder="Enter Data Two" name="datatwo">
        </div>
        
        <a href="view.php"> Go back </a>
        
    </body>
</html>

