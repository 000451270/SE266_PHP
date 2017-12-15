<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
    </head>
    
    <body>
        <?php
        
        include_once './dbconnect.php';
        include_once './functions.php';
        
        $db = getDatabase();
        
        $corp = '';
        $incorp_dt = '';
        $email = '';
        $zipcode = '';
        $owner = '';
        $phone = '';
        
        if ( isPostRequest() ) {
            
            $id = filter_input(INPUT_POST, 'id');
            $corp = filter_input(INPUT_POST, 'corp');
            $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
            $email = filter_input(INPUT_POST, 'email');
            $zipcode = filter_input(INPUT_POST, 'zipcode');
            $owner = filter_input(INPUT_POST, 'owner');
            $phone = filter_input(INPUT_POST, 'phone');
                                   
            $stmt = $db->prepare("UPDATE corps SET  corp = :corp, incorp_dt = :incorp_dt, email = :email, zipcode = :zipcode, owner = :owner, phone = :phone WHERE id = :id");
            
            $binds = array(
                ":id" => $id,
                ":corp" => $corp,
                ":incorp_dt" => $incorp_dt,
                ":email" => $email,
                ":zipcode" => $zipcode,
                ":owner" => $owner,
                ":phone" => $phone,
            );
            
            $message = 'Update failed';
            if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
               $message = 'Update Complete';
            }

        } else {
            $id = filter_input(INPUT_GET, 'id');
        }
        
        $stmt = $db->prepare("SELECT * FROM corps where id = :id");

        $binds = array(
             ":id" => $id
         );

         $result = array();
         if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $corp = $result['corp'];
            $incorp_dt = $result['incorp_dt'];
            $email = $result['email'];
            $zipcode = $result['zipcode'];
            $owner = $result['owner'];
            $phone = $result['phone'];
            
         } else {
             header('Location: view.php');
             die('Corporation ID not found');   
         }
        ?>
        
        <p>
            <?php if ( isset($message) ) { echo $message; } ?>
        </p>
        
        <form method="post" action="#">
            
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
            <br />
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
        
        <br />
        <td><a class="btn btn-primary" href="view.php"> Update Another Friend </a></td>
        <td><a class="btn btn-primary" href="add.php"> Add New Friend </a></td>
        
    </body>
</html>