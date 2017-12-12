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
        <style type="text/css">
    input[type="text"] { width: 40px; } 
    .red {background-color: red;}
    .blue {background-color: blue;}
    
</style>

    </head>
    <body>
        
        <?php $randnumber = rand(0,100); ?>
        <form name="test" method="post" action="DO_Lab1_Random_Grid.php">

        </form>
    
    <form action="" method="get">
        ROWS <input type="text" name="rows"> COLUMNS <input type="text" name="cols"><input type="submit" value="Generate">
    </form>
            
<tr>
   <?php
        $i = 0;
 
if(isset($_GET['rows']))
    {
        $rows=$_REQUEST['rows'];
        $cols=$_REQUEST['cols'];

        $sum = 0;
        
echo '<table border="2">';
    for($row=1;$row<=$rows;$row++)
    {
        echo '<tr>';

    for($col=1;$col<=$cols;$col++)
    {
        $randnumber = rand(0,100);
        $sum+=$randnumber;
        
        if ($randnumber % 3 == 0)
        {
            echo "<td class='red'> $randnumber </td>";
        }
        else if ($randnumber % 2 == 0) 
        {
            echo "<td class='blue'> $randnumber </td>";
        }
        else
        {
            echo "<td class=''> $randnumber </td>";
        }
    }
        echo '</tr>';
    }
echo '</table>';
 echo $sum/($cols*$rows);
    }
   
    ?>
    
</tr>
</table>
    </body>
</html>
