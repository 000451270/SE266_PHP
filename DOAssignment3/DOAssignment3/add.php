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
            $stmt = $db->prepare("INSERT INTO corps SET corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone");
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
            
            $binds = array(
                ":corp" => $corp,
                ":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone,
            );
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                $results = ' Corporation Added';
            }
    }
        ?>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            

            
        <div class="container">
            <h2>Corporations</h2>
            <form action="/add.php">

        <div class="form-group">
            <label for="corp">Corporation Name:</label>
                <input type="corp" class="form-control" id="corp" placeholder="Enter Corporation" name="corp">
        </div>
        <div class="form-group">
            <label for="incorp_dt">Date:</label>
                <input type="incorp_dt" class="form-control" id="incorp_dt" placeholder="Enter Date" name="incorp_dt">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
            <label for="zipcode">Zip Code:</label>
                <input type="zipcode" class="form-control" id="zipcode" placeholder="Enter Zip Code" name="zipcode">
        </div>
        <div class="form-group">
            <label for="owner">Owner:</label>
                <input type="owner" class="form-control" id="owner" placeholder="Enter Owner" name="owner">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
                <input type="phone" class="form-control" id="phone" placeholder="Enter Phone #" name="phone">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
        </form>
        </div>
            
    </body>
</html>
