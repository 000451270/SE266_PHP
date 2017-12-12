<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track validation errors
        $corpError = null;
        $incorp_dtError = null;
        $emailError = null;
        $zipcodeError = null;
        $ownerError = null;
        $phoneError = null;
         
        // keep track post values
        $corp = $_POST['corp'];
        $incorp_dt = $_POST['incorp_dt'];
        $email = $_POST['email'];
        $zipcode = $_POST['zipcode'];
        $owner = $_POST['owner'];
        $phone = $_POST['phone'];
         
        // validate input
        $valid = true;
        if (empty($corp)) {
            $corpError = 'Please a Corporation';
            $valid = false;
        }
         
        if (empty($incorp_dt)) {
            $incorp_dtError = 'Please INCorp';
            $valid = false;
        }
         
        if (empty($email)) {
            $emailError = 'Please enter Email Address';
            $valid = false;
        } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $emailError = 'Please enter a valid Email Address';
            $valid = false;
        }
        
        if (empty($zipcode)) {
            $zipcodeError = 'Please enter Zipcode';
            $valid = false;
        }
        
        if (empty($owner)) {
            $ownerError = 'Please enter Owner';
            $valid = false;
        }
        
        if (empty($phone)) {
            $phoneError = 'Please enter Phone Number';
            $valid = false;
        }
         
        // insert data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO corps (corp,incorp_dt,email,zipcode,owner,phone) values(?, ?, ?, ?, ?, ?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($corp,$incorp_dt,$email,$zipcode,$owner,$phone));
            Database::disconnect();
            header("Location: index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>New Corporation</h3>
                    </div>
             
                    <form class="form-horizontal" action="create.php" method="post">
                      <div class="control-group <?php echo !empty($corpError)?'error':'';?>">
                        <label class="control-label">Corporation</label>
                        <div class="controls">
                            <input name="corp" type="text"  placeholder="corp" value="<?php echo !empty($corp)?$corp:'';?>">
                            <?php if (!empty($corpError)): ?>
                                <span class="help-inline"><?php echo $corpError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($incorp_dtError)?'error':'';?>">
                        <label class="control-label">Incorp</label>
                        <div class="controls">
                            <input name="incorp_dt" type="text" placeholder="incorp_dt" value="<?php echo !empty($incorp_dt)?$incorp_dt:'';?>">
                            <?php if (!empty($incorp_dtError)): ?>
                                <span class="help-inline"><?php echo $incorp_dtError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($emailError)?'error':'';?>">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input name="email" type="text"  placeholder="Email" value="<?php echo !empty($email)?$email:'';?>">
                            <?php if (!empty($emailError)): ?>
                                <span class="help-inline"><?php echo $emailError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($zipcodeError)?'error':'';?>">
                        <label class="control-label">Zipcode</label>
                        <div class="controls">
                            <input name="zipcode" type="text" placeholder="zipcode" value="<?php echo !empty($zipcode)?$zipcode:'';?>">
                            <?php if (!empty($zipcodeError)): ?>
                                <span class="help-inline"><?php echo $zipcodeError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($ownerError)?'error':'';?>">
                        <label class="control-label">Owner</label>
                        <div class="controls">
                            <input name="owner" type="text" placeholder="owner" value="<?php echo !empty($owner)?$owner:'';?>">
                            <?php if (!empty($ownerError)): ?>
                                <span class="help-inline"><?php echo $ownerError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($phoneError)?'error':'';?>">
                        <label class="control-label">phone</label>
                        <div class="controls">
                            <input name="phone" type="text" placeholder="phone" value="<?php echo !empty($phone)?$phone:'';?>">
                            <?php if (!empty($phoneError)): ?>
                                <span class="help-inline"><?php echo $phoneError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Create</button>
                          <a class="btn" href="index.php">Back</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
