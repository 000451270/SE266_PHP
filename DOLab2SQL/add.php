<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
       
        <title></title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <title></title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        $results = '';
        if (isPostRequest()) {
            $db = getDatabase();
            $stmt = $db->prepare("INSERT INTO actors SET firstname = :firstname, lastname = :lastname,  dob = :dob, height = :height");
            $firstname = filter_input(INPUT_POST, 'firstname');
            $lastname = filter_input(INPUT_POST, 'lastname');
            $dob = filter_input(INPUT_POST, 'dob');
            $height = filter_input(INPUT_POST, 'height');
            
            $binds = array(
                ":firstname" => $firstname,
                ":lastname" => $lastname,
                ":dob" => $dob,
                ":height" => $height
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = ' Actor Added';
            }
        }
        ?>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            <!--First Name <input type="text" value="" name="firstname" />
            <br />
            Last Name <input type="text" value="" name="lastname" />
            <br />
            DOB <input type="text" value="" name="dob" />
            <br />
            Height <input type="text" value="" name="height" />-->
            
        <div class="container">
            <h2>Actors Submission Form</h2>
            <form action="/add.php">

        <div class="form-group">
            <label for="firstname">First Name:</label>
                <input type="firstname" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
                <input type="lastname" class="form-control" id="lastname" placeholder="Enter lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">DOB:</label>
                <input type="dob" class="form-control" id="dob" placeholder="Enter DOB" name="dob">
        </div>
        <div class="form-group">
            <label for="height">Height:</label>
                <input type="height" class="form-control" id="height" placeholder="Enter Height" name="height">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
            
    </body>
</html>
