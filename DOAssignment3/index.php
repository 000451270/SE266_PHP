<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
            <meta charset="utf-8">
            <link   href="css/bootstrap.min.css" rel="stylesheet">
            <script src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
 <div class="container">
            <div class="row">
                <h3>Corporations CRUD</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>corp</th>
                      <th>incorp_dt</th>
                      <th>email</th>
                      <th>zipcode</th>
                      <th>owner</th>
                      <th>phone</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM corps ORDER BY id DESC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['corp'] . '</td>';
                            echo '<td>'. $row['incorp_dt'] . '</td>';
                            echo '<td>'. $row['email'] . '</td>';
                            echo '<td>'. $row['zipcode'] . '</td>';
                            echo '<td>'. $row['owner'] . '</td>';
                            echo '<td>'. $row['phone'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                   }
                   dbconnect::disconnect();
                  ?>
                  </tbody>
            </table>
        </div>
    </div> <!-- /container -->
    </body>
</html>
