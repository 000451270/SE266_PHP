<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
// define variables and set to empty values
$cartoonErr = "";
$cartoon = "";

  if (empty($_POST["cartoon"])) {
    $cartoonErr = "Please Select a Cartoon";
  } else {
    $cartoon = ($_POST["cartoon"]);
  }
  
?>

<h2>SELECT YOUR CARTOON</h2>

<form method="post" action="<?php echo ($_SERVER["PHP_SELF"]);?>">  
  Cartoon:
  <input type="radio" name="cartoon" <?php if (isset($cartoon) && $cartoon=="Mickey Mouse") echo "checked";?> value="mickey mouse">Mickey Mouse
  <input type="radio" name="cartoon" <?php if (isset($cartoon) && $cartoon=="Donald Duck") echo "checked";?> value="donald duck">Donald Duck
  <input type="radio" name="cartoon" <?php if (isset($cartoon) && $cartoon=="Goofy") echo "checked";?> value="goofy">Goofy
  <span class="error">* <?php echo $cartoonErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Cartoon Is:</h2>";

echo $cartoon;
?>

</body>
</html>






