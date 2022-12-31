<!DOCTYPE html>
<html>
    <?php include "pagestart.php";?>
   
<div id="list">
    <div class="Title">
    <?php   $setname = $_GET["setname"] ?? NULL;
            echo strtoupper ("<h1>" . $setname . "</h1>");
    ?>
    <!-- <form action="results.php" method="put" class="realbar" cols="50" rows="10">
    <input type="text" placeholder="Search for another set.." name="search"  required/>
    <button type="submit">Search</button>
    <button type="submit" class="searchButton"> <i class="fa fa-search"></i></button>  </form> -->

    <form action="results.php" method="put" class="realbar">
            <input type="text" placeholder="Search for another set.." class="search" name="search"  required> 
            <button type="submit" class="searchButton"> <i class="fa fa-search"></i></button>
            </form>

</div>

<div id="list2">
    <?php $value = $_GET["setid"] ?? NULL; 
    $link = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
    $connection	= mysqli_connect("mysql.itn.liu.se","lego","","lego");
    $question = "SELECT inventory.Quantity, parts.Partname, colors.Colorname, inventory.ItemID, inventory.ColorID
             FROM inventory, parts, colors
            WHERE SetID LIKE '$value' 
            AND parts.PartID = inventory.ItemID
            AND colors.ColorID = inventory.ColorID  
            AND inventory.ItemtypeID = 'P'";
 ?>
<table>
                <tr>
                    <th>Picture</th>
                    <th></th>
                    <th>Quantity</th>
                    <th>Colorname</th>
                    <th>Partname </th>
                    <th>Item ID</th>
                </tr>

                <p></p>
    <!-- /*echo "<table>\n";
echo "<tr>\n";
    echo "<th>Quantity</th>\n";
    echo "<th>File Name</th>\n";
    echo "<th>Picture</th>\n";
    echo "<th>Color</th>\n";
    echo "<th>Part name</th>\n";
echo "</tr>\n"; -->

<?php $result	= mysqli_query($connection, $question);	

while ($row = mysqli_fetch_array($result))	{
    echo "<tr>\n";
    $quantity = $row ['Quantity'];																					
    $partname = $row['Partname'];
    $color = $row['Colorname'];
    $ItemID = $row['ItemID'];
    $colorID = $row['ColorID'];


    $imagesearchquestion = "SELECT * FROM images WHERE ItemtypeID='P' AND ItemID = '$ItemID' AND ColorID = '$colorID'";
    $imagesearch = mysqli_query($connection, $imagesearchquestion);	
    $imagevector = mysqli_fetch_array($imagesearch);
  
    if($imagevector['has_jpg']){
        $endlink = "P/$colorID/$ItemID.jpg";
    }
    else if($imagevector['has_gif']){
        $endlink = "P/$colorID/$ItemID.gif";
    }
    
    $image = "<img src='$link$endlink' alt=''>";
            echo "<td>$image<td>\n";
            echo "<td>" . "x" . " " . $row['Quantity'] . "</td>\n";
            echo "<td>" . $row['Colorname'] . "</td>\n";
            echo "<td>" . $row['Partname'] . "</td>\n";
            echo "<td>" . $row['ItemID'] . "</td>\n";
            echo "</tr>\n";
    

}	//	end	while		





?>
</div>
</body>
</html>
