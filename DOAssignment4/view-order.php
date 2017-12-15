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
        
        <title></title>        
    </head>
    
<div class="panel panel-primary">

    <h1 style="font-family: verdana;">RESULTS</h1>

    <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Corporation</th>
                    <th>Email</th>
                    <th>Incorp</th>
                    <th>Owner</th>
                    <th>Phone</th>
                    <th>ZipCode</th>
                </tr>
            </thead>
        <tbody>
                
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
</html>


