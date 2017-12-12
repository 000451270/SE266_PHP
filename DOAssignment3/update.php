<?php
     
    require 'database.php';
    
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    }
 
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
         
              // update data
        if ($valid) {
            $pdo = Database::connect();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE corps  set corp = ?, incorp_dt = ?, email =?, zipcode =?, owner =?, phone =? WHERE id = ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($corp,$incorp_dt,$email,$zipcode,$owner,$phone,$id));
            Database::disconnect();
            header("Location: index.php");
        }
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM corps where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $corp = $data['corp'];
        $incorp_dt = $data['incorp_dt'];
        $email = $data['email'];
        $zipcode = $data['zipcode'];
        $owner = $data['owner'];
        $phone = $data['phone'];
        Database::disconnect();
    }
?>
